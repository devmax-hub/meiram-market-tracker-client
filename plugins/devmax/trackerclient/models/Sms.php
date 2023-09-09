<?php
namespace Devmax\TrackerClient\Models;

use Devmax\TrackerClient\Models\Clients;
use Model;

/**
 * Model
 */
class Sms extends Model
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
    public $table = 'devmax_trackerclient_sms';


    public $belongsTo = [
        'parent' => [Clients::class, 'key' => 'id'],
    ];

    public function client()
    {
        return $this->belongsTo('Devmax\TrackerClient\Models\Client');
    }

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

}