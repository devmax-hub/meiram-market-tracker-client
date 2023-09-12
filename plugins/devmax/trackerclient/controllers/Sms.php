<?php
namespace Devmax\TrackerClient\Controllers;

include_once "smsc_api.php";


use Backend;
use BackendMenu;
use Backend\Classes\Controller;
use Exception;

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



    public function getBalance()
    {
        try {
            $balance = get_balance();
            return response()->json(['balance' => $balance], 200);
        } catch (Exception $e) {
            echo "Ошибка: " . $e->getMessage() . "\n";
        }


    }




}