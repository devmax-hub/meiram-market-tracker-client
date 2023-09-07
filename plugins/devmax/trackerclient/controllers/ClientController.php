<?php

namespace Devmax\TrackerClient\Controllers;

use Devmax\TrackerClient\Models\Clients;
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
}