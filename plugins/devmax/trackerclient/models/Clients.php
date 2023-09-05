<?php
namespace Devmax\TrackerClient\Models;

use Devmax\TrackerClient\Models\Sms;
use Model;

/**
 * Model
 */
class Clients extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;
    use \October\Rain\Database\Traits\SimpleTree;

    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'devmax_trackerclient_clients';


    public $hasMany = [
        'children' => [Sms::class, 'key' => 'parent_id'],
    ];
    public function getAllSms()
    {
        return $this->hasMany('Devmax\TrackerClient\Models\Sms');

    }
    public function sms()
    {
        return $this->hasMany(Sms::class)->orderBy('created_at', 'desc');
    }

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

}