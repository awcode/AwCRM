<?php
namespace AwCRM\Modules\TransportersIO\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class CargoGroups extends Eloquent  {

	use SoftDeletes;

    protected $dates = ['deleted_at'];
    
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cargo_groups';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	protected $primaryKey = "cargo_group_id";

	
	public $timestamps = true;
	
	
	
}
