<?php namespace Devmax\TrackerClient\Controllers;

use Backend;
use BackendMenu;
use Backend\Classes\Controller;

class RefersLinks extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = [
        'devmax.trackerclient.refers'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Devmax.TrackerClient', 'main-main-dx-trackerclient-referal');
    }

    /**
     *  Display only those records that are attached to current user
     */
    public function listExtendQuery($query){
        \Log::info(['listExtendQuery',  $this->user->id]);
        // all records if that  not deleted
        $query->where('user_id', $this->user->id)->where('deleted_at', null);

    }

}
