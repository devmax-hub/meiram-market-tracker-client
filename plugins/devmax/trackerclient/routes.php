<?php

use Devmax\TrackerClient\Controllers\ClientController;
use Illuminate\Support\Facades\Response;
use Devmax\TrackerClient\Controllers\Clients;
use Illuminate\Support\Facades\Route;



use October\Rain\Exception\ValidationException;



Route::prefix('api/v1')->group(function () {
  Route::post('client', [ClientController::class, 'client']);

  Route::get('/exception', function () {
    throw new ValidationException([
      'something' => 'wrong',
      'mode' => 'error',
    ]);
  });
});