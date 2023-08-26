<?php namespace SunLab\BackendPreRegistration\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\Backend;
use Backend\Facades\BackendAuth;
use Backend\Models\User;
use Backend\Models\UserRole;
use October\Rain\Exception\ValidationException;
use October\Rain\Support\Facades\Flash;
use October\Rain\Support\Facades\Str;
use October\Rain\Support\Facades\Validator;
use SunLab\BackendPreRegistration\Models\AdditionalFields;
use SunLab\BackendPreRegistration\Models\Settings;
use SunLab\BackendPreRegistration\Plugin;
use SunLab\BackendRegistration\Models\Settings as RegistrationSettings;

class PreRegistrationController extends Controller
{
    protected $settings;
    protected $publicActions = ['preregister', 'comingSoon', 'thankYou'];

    public function __construct()
    {
        parent::__construct();
        $this->layout = 'auth';
        $this->settings = Settings::instance();
    }

    public function preregister()
    {
        $registrationSettings = RegistrationSettings::instance();
        if ($registrationSettings->open_registration
            &&
            (blank($registrationSettings->registration_open_at) || $registrationSettings->registration_open_at->isPast())
        ) {
            return Backend::redirect('register');
        }

        $this->bodyClass .= ' pre-register';
        if (!$this->settings->open_registration
            ||
            optional($this->settings->registration_open_at)->isFuture()
        ) {
            if (blank($this->settings->registration_open_at)) {
                return Backend::redirect('backend/auth');
            }

            return Backend::redirect('preregistration-coming-soon');
        }

        $this->vars = (array) $this->settings->attributes;
        $this->setResponseHeader('Cache-Control', 'no-cache, no-store, must-revalidate');

        try {
            if (post('postback')) {
                return $this->preregister_onSubmit();
            }

            $this->bodyClass .= ' preload';
        } catch (\Exception $ex) {
            Flash::error($ex->getMessage());
        }
    }

    public function preregister_onSubmit()
    {
        $rules = ['email' => 'required|between:6,255|email|unique:backend_users'];

        foreach ($this->settings->additional_fields as $field) {
            if ($field['required']) {
                $rules["sunlab_additional_fields.{$field['name']}"] = $field['type'] === 'checkbox' ? 'accepted' : 'required';
            }
        }

        $validator = Validator::make(post(), $rules);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $password = Str::random();
        /** @var User $user */
        $user = BackendAuth::register([
            'login' => Str::random(),
            'email' => post('email'),
            'password' => $password,
            'password_confirmation' => $password
        ]);

        $role = UserRole::where(['code' => Plugin::PRE_REGISTERED_ROLE_CODE])->firstOrFail();
        $user->role = $role;
        $user->save();

        $additionalFields = new AdditionalFields;
        $additionalFields->data = post('sunlab_additional_fields');
        $additionalFields->user = $user;
        $additionalFields->save();

        return Backend::redirect('thank-you');
    }

    public function thankYou()
    {
        $this->vars['settings'] = $this->settings;
    }

    public function comingSoon()
    {
        $this->vars['openingDate'] = $this->settings->registration_open_at;
    }
}
