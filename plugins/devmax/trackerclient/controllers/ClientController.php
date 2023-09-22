<?php



namespace Devmax\TrackerClient\Controllers;

include_once "smsc_api.php";

use Devmax\TrackerClient\Models\Clients;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Log;


class ClientController extends Controller
{
  public function client(Request $request)
  {

    $data = $request->all();
    // return response()->json(['data' => "$data"], 200);

    $client = new Clients;
    $client->name = $data['name'];
    $client->phone = $data['phone'];
    $client->refer_id = $data['utm_track_uid'];
    $client->save();

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