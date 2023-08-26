<?php namespace SunLab\BackendPreRegistration\Jobs;

use Backend\Models\User;
use Illuminate\Support\Facades\Mail;
use October\Rain\Support\Facades\Str;

class SendPassword
{
    public function fire($job, $data)
    {
        $password = Str::random();
        $user = User::findOrFail($data['user_id']);

        $user->role = $data['role_id'];

        Mail::send(
            'sunlab.backendpreregistration::mail.send-password',
            ['login' => $user->login, 'password' => $password],
            function ($message) use ($user) {
                $message->to($user->email, $user->email);
            }
        );

        $user->save([
            'password' => $password,
            'password_confirmation' => $password
        ]);

        $job->delete();
    }
}
