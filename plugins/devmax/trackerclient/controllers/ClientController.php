<?php


namespace Devmax\TrackerClient\Controllers;

include_once "smsc_api.php";

use Devmax\TrackerClient\Models\Clients;
use Devmax\TrackerClient\Models\RefersLinks;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ClientController extends Controller
{
    public function client(Request $request)
    {
        $data = file_get_contents('php://input');
        if(!$data) return ;
        $data = json_decode($data, true);
        \Log::info(['client data', $data]);
        // check first phone number in table clients if exists then +1 once in one day
        $client = new Clients;
        $client_phone = $client->where('phone', $data['phone'])->first();
        \Log::info(['client phone', $data['phone']]);
        $refer_links = new RefersLinks;
        // if utm_track_uid has exists in table refers_links then +1 to refers_links.count
        $refer_link = $refer_links->where('uid', $data['utm_track_uid'])->first();
        if(!$refer_link) return response()->json(['message' => 'This utm_track_uid not found'], 200);
        if (!$client_phone) {
            $client->name = $data['name'];
            $client->phone = $data['phone'];
            $client->refer_id = $data['utm_track_uid'];
            $client->save();
        } elseif ($client_phone->created_at->format('Y-m-d') == date('Y-m-d')) {
            return response()->json(['message' => 'This phone registered today'], 200);
        }

        $time = date("Y-m-d H:i:s");

        \Log::info([$time, $data['phone'], $refer_link->id, $refer_link->uid, $refer_link->counts]);
        // if phone number different from phone number in table clients then +1 to refers.count
        $client_phone = $client->where('phone', $data['phone'])->first();
        if ($refer_link->uid == $client_phone->refer_id) {
            $refer_link->counts = $refer_link->counts + 1;
            $refer_link->save();
        }

        return response()->json(['message' => 'Successfully created'], 201);
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


    public function sendSms(Request $request)
    {
        $data = $request->all();
        $phone = $data['phone'];
        $text = $data['message'];
        $sender = "Meyram";


        try {
            // return response()->json(['tel' => $phone, 'text' => $text, $sender], 200);
            $result = send_sms($phone, $text, 0, 0, 0, 0, $sender);
            return response()->json(['result' => $result], 200);
        } catch (Exception $e) {
            echo "Ошибка: " . $e->getMessage() . "\n";
        }
    }
}
