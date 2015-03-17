<?php
use Illuminate\Database\Eloquent\SoftDeletes;

class Payments extends Eloquent  {

	use SoftDeletes;

    protected $dates = ['deleted_at'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'payments';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	protected $primaryKey = "pay_id";

	
	public $timestamps = true;
	
	
	
}
