<?php
use Illuminate\Database\Eloquent\SoftDeletes;

class EventTypes extends Eloquent  {

	use SoftDeletes;

    protected $dates = ['deleted_at'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'eventtypes';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	protected $primaryKey = "event_type_id";

	
	public $timestamps = true;
	
	public static function getEventTypeConfig($data = false){
    	$arr = array(
    		'pastfuture'=>0,
    		'nodeadline'=>0,
    		'noduration'=>0,
    		'showcustomer'=>0
    	);
    	if($data){
    		if(is_array($data) && count($data)){
    			foreach($data as $k=>$v){
    				$k = str_replace("event_type_config_", "", $k);
    				if(isset($arr[$k])){$arr[$k] = $v;}
    			}
    		}
    	}
    	return $arr;
    }
	
}
