<?php
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'country';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	protected $primaryKey = "iso_code2";
	public $timestamps = true;

}
