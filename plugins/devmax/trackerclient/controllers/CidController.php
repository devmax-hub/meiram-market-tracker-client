<?php

namespace Devmax\TrackerClient\Controllers;

use Devmax\TrackerClient\Models\Clients;
use Devmax\TrackerClient\Models\Links;
use Devmax\TrackerClient\Models\Message;
use Devmax\TrackerClient\Models\Sms;
use Illuminate\Routing\Controller;
use Devmax\TrackerClient\Models\RefersLinks;

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
    // Increment success_count if user enter from refer link
      $client = Clients::where('id', $clientId)->get()[0];
      $refer_links = RefersLinks::where('uid', $client->refer_id)->get()[0];
      \Log::info(['Cid controller',$clientId, $client->refer_id, $refer_links->uid]);
      // it should be once

      if( $client->refer_id == $refer_links->uid){
          // increment success count
        $refer_links->success_counts = $refer_links->success_counts + 1;
        if($refer_links->counts !=0 ) {
            // calculate rating
          $refer_links->rating = round($refer_links->success_counts / $refer_links->counts * 100, 2);
        }
        $refer_links->save();
      }
    return redirect($bizonUrl);

  }


}
