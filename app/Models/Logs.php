<?php
use Illuminate\Database\Eloquent\SoftDeletes;

class Logs extends Eloquent  {

	use SoftDeletes;

    protected $dates = ['deleted_at'];
    
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'logs';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	protected $primaryKey = "log_id";

	
	public $timestamps = true;
	
	
	
}
