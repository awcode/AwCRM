<?php
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Eloquent  {

	use SoftDeletes;

    protected $dates = ['deleted_at'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'address';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	protected $primaryKey = "address_id";
	public $timestamps = true;
}
