<?php namespace Devmax\TrackerClient\Models;

use Model;

/**
 * Model
 */
class RefersLinks extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;
    public $suger = 'meyram';
    public $_uid = null;


    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'devmax_trackerclient__refer_links';

    /**
     * @var array rules for validation.
     */
    public $rules = [
        'url'=>[
            'required',
            'url'
        ],
    ];
    public $customMessages = [
        'url.required' => 'Поле URL обязательно для заполнения',
        'url.url' => 'Поле URL должно быть валидным URL адресом',
        'url.min' => 'Поле URL должно быть не менее 10 символов',
        'url.max' => 'Поле URL должно быть не более 255 символов',
    ];
    /***
     * set Atrribute for uid
     */
    public function setModUrlAttribute($value){
        // check if url has already uid then don't generate new one
        if (strpos($value, 'utm_track_uid') !== false) {
            $this->attributes['mod_url'] = $value;
            return;
        }
        $this->attributes['mod_url'] = $this->url.'&utm_track_uid='.$this->generateUid();

    }
    public function setUidAttribute($value){
        if($value){
            $this->attributes['uid'] = $value;
        }else{
            $this->attributes['uid'] = $this->generateUid();
        }
    }

    /**
     * generate from timestamp uid
     */
    public function generateUid(){
        $time = time();
        $uid = md5($time.$this->suger);
        // return only 6 symbols
        return substr($uid, 0, 6);
    }

}
