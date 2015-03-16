<?php



class Contact extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contact';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	protected $primaryKey = "contact_id";
	public $timestamps = true;

}
