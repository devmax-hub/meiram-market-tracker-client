<?php namespace SunLab\BackendPreRegistration;

use Backend\Behaviors\FormController;
use Backend\Controllers\Users;
use Backend\Models\User;
use Backend\Models\UserRole;
use Illuminate\Support\Facades\Queue;
use SunLab\BackendPreRegistration\Jobs\SendPassword;
use SunLab\BackendPreRegistration\Models\AdditionalFields;
use SunLab\BackendPreRegistration\Models\Settings;
use System\Classes\PluginBase;
use System\Classes\SettingsManager;

class Plugin extends PluginBase
{
    public const PRE_REGISTERED_ROLE_CODE = 'pre-registered-member';

    public $elevated = true;

    public $require = ['SunLab.BackendRegistration'];

    public function pluginDetails()
    {
        return [
            'name'        => 'Backend PreRegistration',
            'description' => 'sunlab.backendpreregistration::lang.plugin.description',
            'author'      => 'SunLab',
            'icon'        => 'icon-users'
        ];
    }

    public function boot()
    {
        $this->extendUserModel();
        $this->extendUsersController();
    }

    public function registerSettings()
    {
        return [
            'sunlab_preregistration_settings' => [
                'label'       => 'sunlab.backendpreregistration::lang.settings.label',
                'description' => 'sunlab.backendpreregistration::lang.settings.description',
                'category'    => SettingsManager::CATEGORY_CUSTOMERS,
                'icon'        => 'icon-users',
                'class'       => Settings::class,
                'order'       => 500,
                'keywords'    => 'sunlab.backendpreregistration::lang.settings.keywords',
                'permissions' => ['sunlab.backendpreregistration.*']
            ]
        ];
    }

    public function registerPermissions()
    {
        return [
            'sunlab.backendpreregistration.manage_plugin' => [
                'tab' => 'sunlab.backendpreregistration::lang.plugin.name',
                'label' => 'sunlab.backendpreregistration::lang.permissions.manage_plugin'
            ],
            'sunlab.backendpreregistration.view_additional_fields' => [
                'tab' => 'sunlab.backendpreregistration::lang.plugin.name',
                'label' => 'sunlab.backendpreregistration::lang.permissions.view_additional_fields'
            ],
        ];
    }

    public function registerSchedule($schedule)
    {
        $settings = Settings::instance();
        $schedule->call(function () use ($settings) {
            $users = UserRole::where('code', self::PRE_REGISTERED_ROLE_CODE)->first()->users;

            foreach ($users as $user) {
                Queue::push(
                    SendPassword::class,
                    [
                        'user_id' => $user->id,
                        'role_id' => $settings->role
                    ]
                );
            }

            // Reset the plugin settings
            $settings->open_registration            = false;
            $settings->registration_open_at         = null;
            $settings->send_password_automatically  = false;
            $settings->send_password_at             = null;
            $settings->passwords_sent               = true;
            $settings->save();
        })->when(function () use ($settings) {
            return
                $settings->send_password_automatically
                &&
                !optional($settings)->passwords_sent
                &&
                $settings->send_password_at->isPast();
        });
    }

    public function registerMailTemplates()
    {
        return [
            'sunlab.backendpreregistration::mail.send-password'
        ];
    }

    protected function extendUserModel()
    {
        User::extend(function ($userModel) {
            $userModel->hasOne['sunlab_additional_fields'] = AdditionalFields::class;
        });
    }

    protected function extendUsersController()
    {
        Users::extendFormFields(function ($widget, $model, $context) {
            if ($context !== FormController::CONTEXT_UPDATE) {
                return;
            }

            $model->load('sunlab_additional_fields');
            foreach (Settings::get('additional_fields') as $field) {
                $widget->data->{"sunlab_additional_fields_{$field['name']}"} = $model->sunlab_additional_fields->data[$field['name']] ?? null;
                $widget->addTabFields(["sunlab_additional_fields_{$field['name']}" => [
                    'label' => $field['label'],
                    'disabled' => true,
                    'permissions' => ['sunlab.backendpreregistration.view_additional_fields'],
                    'tab' => 'sunlab.backendpreregistration::lang.settings.fields.additional_fields.label',
                ]]);
            }
        });
    }
}
