<?php namespace Devmax\TrackerClient\Models;

use Model;

/**
 * Model
 */
class Refers extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;
    use \October\Rain\Database\Traits\Sortable;

    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'devmax_trackerclient_refers';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

}
