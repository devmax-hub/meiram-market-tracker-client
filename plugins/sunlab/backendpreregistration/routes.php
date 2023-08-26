<?php

use Illuminate\Support\Facades\Route;
use SunLab\BackendPreRegistration\Controllers\PreRegistrationController;

Route::group(
    [
        'prefix' => Config::get('cms.backendUri').'/',
        'middleware' => ['web']
    ],
    function () {
        Route::match(['get', 'post'], 'preregister', function () {
            return (new PreRegistrationController())->run('preregister');
        });

        Route::get('preregistration-coming-soon', function () {
            return (new PreRegistrationController())->run('comingSoon');
        });

        Route::get('thank-you', function () {
            return (new PreRegistrationController())->run('thankYou');
        });
    }
);
