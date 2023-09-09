<?php



namespace Devmax\TrackerClient\Controllers;

include_once "smsc_api.php";

use Devmax\TrackerClient\Models\Clients;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class ClientController extends Controller
{
  public function client(Request $request)
  {
    $data = $request->all();


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
}