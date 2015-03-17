<?php
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderRows extends Eloquent  {

	use SoftDeletes;

    protected $dates = ['deleted_at'];
    
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'order_rows';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	protected $primaryKey = "order_row_id";

	
	public $timestamps = true;
	
	
	
}
