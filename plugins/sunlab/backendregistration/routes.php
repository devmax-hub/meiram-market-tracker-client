<?php

use Illuminate\Support\Facades\Route;
use SunLab\BackendRegistration\Classes\RegistrationIsOpen;
use SunLab\BackendRegistration\Controllers\RegistrationController;
use Illuminate\Support\Facades\Log;

Route::group(
    [
        'prefix' => Config::get('backend.uri').'/',
        'middleware' => ['web']
    ],
    function () {
        Route::match(['get', 'post'], 'register', function () {
            return (new RegistrationController())->run('register');
        })->middleware(RegistrationIsOpen::class);
       Route::get('test', function (){
           Log::log('info', Config::get('backend.uri'));
            return 'test';
        });

        Route::get('coming-soon', function () {
            return (new RegistrationController())->run('comingSoon');
        });
    }
);
