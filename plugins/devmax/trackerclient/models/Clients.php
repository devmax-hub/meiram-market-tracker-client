<?php
namespace Devmax\TrackerClient\Models;


use Model;

/**
 * Model
 */
class Clients extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'devmax_trackerclient_clients';


    public $hasMany = [
        'sms' => [Sms::class, 'key' => 'client_id'],
    ];
    public function sms()
    {
        return $this->hasMany('Devmax\TrackerClient\Models\Sms');
    }

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

}