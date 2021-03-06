<?php
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Eloquent {

	use SoftDeletes;

    protected $dates = ['deleted_at'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'category';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	protected $primaryKey = "cat_id";
	public $timestamps = true;
}
