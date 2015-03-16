<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Eloquent implements AuthenticatableContract, CanResetPasswordContract {

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
	
	public $rules = array(
	'main'=>  array(
		'firstname'=>'required|alpha|min:2',
		'lastname'=>'required|alpha|min:2',
		'email'=>'required|email|unique:users',
		'password'=>'required|between:6,22|confirmed',
		'password_confirmation'=>'required|between:6,22'
    ));

	public $timestamps = true;
}
