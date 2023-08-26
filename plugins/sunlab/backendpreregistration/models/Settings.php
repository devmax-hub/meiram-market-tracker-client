<?php namespace SunLab\BackendPreRegistration\Models;

use Backend\Models\UserRole;
use October\Rain\Database\Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];
    public $settingsCode = 'sunlab_preregistration_settings';
    public $settingsFields = 'fields.yaml';
    public function initSettingsData()
    {
        $this->passwords_sent = false;
    }

    use \October\Rain\Database\Traits\Validation;
    public $rules = [
        'registration_open_at' => 'nullable|date|after:now',
        'send_password_automatically' => 'boolean',
        'send_password_at' => 'required_if:send_password_automatically,1|nullable|after:now|after:registration_open_at',
        'additional_fields.*.name' => 'required',
        'additional_fields.*.label' => 'required',
        'additional_fields.*.type' => 'required',
        'additional_fields.*.attributes.*.name' => 'required',
        'role' => 'required|exists:backend_user_roles,id'
    ];

    protected $jsonable = ['additional_fields'];

    protected $dates = ['registration_open_at', 'send_password_at'];

    public function getRoleOptions()
    {
        return UserRole::select(['name', 'id'])->get()->pluck('name', 'id');
    }

    public function beforeSave()
    {
        if ($this->getSettingsValue('send_password_automatically')) {
            $this->setSettingsValue('passwords_sent', false);
        }

        parent::beforeModelSave();
    }
}
