<?php
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentAllocation extends Eloquent  {

	use SoftDeletes;

    protected $dates = ['deleted_at'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'payment_allocation';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	protected $primaryKey = "pay_allocate_id";

	
	public $timestamps = true;
	
	
	
}
