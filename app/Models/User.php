<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Eloquent implements AuthenticatableContract, CanResetPasswordContract {

	use SoftDeletes;

    protected $dates = ['deleted_at'];
    
	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	public $timestamps = true;
	
	public function rules()
	{
		return [
			'firstname'=>'required|alpha|min:2',
			'lastname'=>'required|alpha|min:2',
			'email'=>'required|email|unique:users,id,'.Request::get('id')
		];
	}	

}
