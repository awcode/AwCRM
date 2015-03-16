<?php


class Customer extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'customer';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	protected $primaryKey = "cust_id";
	public $timestamps = true;
	

}
