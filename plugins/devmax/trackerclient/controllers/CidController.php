<?php

namespace Devmax\TrackerClient\Controllers;

use Devmax\TrackerClient\Models\Clients;
use Devmax\TrackerClient\Models\Links;
use Devmax\TrackerClient\Models\Message;
use Devmax\TrackerClient\Models\Sms;
use Illuminate\Routing\Controller;

class CidController extends Controller
{
  public function index($link)
  {
    $urlLink = Links::where('link', $link)->get();
    $clientId = $urlLink[0]['client_id'];
    $urlLink[0]['is_pressed'] = 1;
    $urlLink[0]->save();

    $messageId = Sms::where('client_id', $clientId)->pluck('message_id')->toArray()[0];
    $bizonUrl = Message::where('id', $messageId)->pluck('url_bizon')->toArray()[0];

    return redirect($bizonUrl);

  }


}