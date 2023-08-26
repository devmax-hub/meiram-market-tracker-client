<?php namespace SunLab\BackendPreRegistration\Models;

use Backend\Models\User;
use October\Rain\Database\Model;

class AdditionalFields extends Model
{
    public $table = 'sunlab_backendpreregistration_additional_fields';
    protected $fillable = ['data'];
    protected $jsonable = ['data'];
    public $timestamps = false;
    public $belongsTo = ['user' => User::class];
}
