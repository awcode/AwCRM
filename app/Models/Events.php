<?php
use Illuminate\Database\Eloquent\SoftDeletes;

class Events extends Eloquent  {

	use SoftDeletes;

    protected $dates = ['deleted_at'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'events';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	protected $primaryKey = "event_id";

	
	public $timestamps = true;
	
	
	public static function alert_groups(){
		return array("overdue", "today", "tomorrow", "upcoming");
	}
}
