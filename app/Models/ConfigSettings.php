<?php
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfigSettings extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'config';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	protected $primaryKey = "config_id";

	
	public $timestamps = false;
	
	
	
}
