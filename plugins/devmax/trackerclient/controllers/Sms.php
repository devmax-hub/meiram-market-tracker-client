<?php
namespace Devmax\TrackerClient\Controllers;

include_once "smsc_api.php";


use Backend;
use BackendMenu;
use Backend\Classes\Controller;
use Devmax\TrackerClient\Models\Clients;
use Devmax\TrackerClient\Models\Links;
use Exception;
use Flash;
use Illuminate\Http\Request;

class Sms extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = [
        'devmax.trackerclient.refers'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Devmax.TrackerClient', 'main-menu-slave', 'sms');
    }

    public function onHandleAction()
    {
        $action = post('action');
        $selectedIds = post('selectedIds');

        if (!empty($selectedIds)) {
            $sentIds = [];
            foreach ($selectedIds as $clientId) {
                $smsArray = \Devmax\TrackerClient\Models\Sms::whereIn('id', $selectedIds)->with('message', 'client')->get();
                $responseArray = [];


                $sender = "Meyram";

                foreach ($smsArray as $sms) {
                    $link = $this->generateLink($sms->client_id);
                    $text = $sms->message ? $sms->message->text . " силтеме: " . $link : "";
                    $phone = $sms->client->phone;

                    $result = send_sms($phone, $text, 0, 0, 0, 0, $sender);

                    try {
                        $result = send_sms($phone, $text, 0, 0, 0, 0, $sender);
                        $responseArray[] = ['result' => $result];
                    } catch (Exception $e) {
                        echo "Ошибка: " . $e->getMessage() . "\n";
                    }
                }

                return response()->json(['responseArray' => $responseArray], 200);
            }

            if (!empty($sentIds)) {
                Flash::success('SMS успешно отправлены клиентам с ID: ' . implode(', ', $sentIds));
            } else {
                Flash::warning('SMS не были отправлены ни одному клиенту.');
            }
        } else {
            Flash::warning('Не выбраны клиенты для отправки SMS.');
        }
        return $this->listRefresh();
    }


    public function generateLink($id)
    {
        $time = time();
        $uid_link = substr(md5($time . 'meyram'), 0, 6);
        $attempt = 1;
        $url = 'https://meyram-app.kz/l/';

        do {
            $link = Links::where('link', $uid_link)->first();
            if (!$link) {
                $newLink = new Links;
                $newLink->client_id = $id;
                $newLink->link = $uid_link;
                $newLink->save();
                break;
            }

            $uid_link = substr(md5($time . 'meyram'), 0, 6);
            $attempt++;

            if ($attempt > 20) {
                $uid_link = substr(md5($time . 'meyram'), 4, 6);
            }
        }
        while (true);
        return $url . $uid_link;
    }
}