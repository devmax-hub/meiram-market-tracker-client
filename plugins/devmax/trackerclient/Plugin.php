<?php
namespace Devmax\TrackerClient;

use Backend;
use Config;
use Event;
use Illuminate\Support\Facades\App;
use System\Classes\PluginBase;
use Illuminate\Support\Facades\Log;

/**
 * Plugin class
 */
class Plugin extends PluginBase
{
    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        if ($this->app->runningInBackend()) {
            $this->applyAssets();
        }
        Event::listen('backend.menu.extendItems', function($manager) {
            $manager->removeMainMenuItem('October.Backend','dashboard');
            $manager->removeMainMenuItem('October.Editor','editor');
            $manager->removeMainMenuItem('October.Media','media');

            if(!\BackendAuth::getUser()->id == 1){
                $manager->removeMainMenuItem('Rainlab.Builder', 'builder');
            }
        });
    }

    /**
     * onStart method, called right before the request route.
     */


    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
    }

    /**
     * registerSettings used by the backend.
     */
    public function registerSettings()
    {

    }


    protected function applyAssets()
    {
        Event::listen('backend.page.beforeDisplay', function ($controller, $action, $params) {
            $controller->addCss('/plugins/devmax/trackerclient/assets/css/style.css', 'Devmax.TrackerClient');
            $controller->addJs('/plugins/devmax/trackerclient/assets/js/script.js', 'Devmax.TrackerClient');
        });
    }


}