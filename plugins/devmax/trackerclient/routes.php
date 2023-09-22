<?php

use Devmax\TrackerClient\Controllers\CidController;
use Devmax\TrackerClient\Controllers\ClientController;
use Illuminate\Support\Facades\Response;
use Devmax\TrackerClient\Controllers\Clients;
use Illuminate\Support\Facades\Route;



use October\Rain\Exception\ValidationException;



Route::prefix('api/v1')->group(function () {
  Route::post('client', [ClientController::class, 'client']);
  // Receive data: 
  // {"name": "Maksat", 
  //   "phone": "+7 (777) 777-77-77", 
  //   "utm_track_uid": "e24c4a"
  //   }

  Route::get('get-balance', [ClientController::class, 'getBalance']);

  Route::post('send-sms', [ClientController::class, 'sendSms']);

});

Route::get('l/{link}', [CidController::class, 'index']);