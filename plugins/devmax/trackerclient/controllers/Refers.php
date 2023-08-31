<?php namespace Devmax\TrackerClient\Controllers;

use Backend;
use BackendMenu;
use Backend\Classes\Controller;

class Refers extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = [
        'devmax.trackerclient.leads'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Devmax.TrackerClient', 'main-menu-users-master');
    }

}
