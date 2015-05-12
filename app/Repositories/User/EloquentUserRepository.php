<?php
namespace Repositories\User;

use User;
use Input;
use Hash;
use Request;
use Repositories\AbstractEloquentRepository;

class EloquentUserRepository extends AbstractEloquentRepository implements UserInterface { 
  	/**
   	* @var Model
   	*/
  	protected $model;
 
  	/**
   	* Constructor
   	*/
  	public function __construct(User $model)
  	{
		parent::__construct();
    	$this->model = $model;
  	}
 
  	public function addUser(){
 		$user = new $this->model;
		$user->firstname = Input::get('firstname');
		$user->lastname = Input::get('lastname');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->save();
		
		return $user->user_id;
  	}
  	
  	public function updateUser($id){
  		$user = $this->model->find($id);
		$user->firstname = Input::get('firstname');
		$user->lastname = Input::get('lastname');
		$user->email = Input::get('email');
		if(Input::get('password') != ""){$user->password = Hash::make(Input::get('password'));}
		$user->save();
		
		return $user->user_id;
  	}
  
  	public function recordLogin($id){
  		$user = $this->model->find($id);
  		$user->lastlogin_date = date("Y-m-d H:i:s");
  		$user->lastlogin_ip = Request::getClientIp();  	
  		$user->save();	
  	}
	
	public function allUserSelectArr(){
		$all = $this->all();
		$arr = array('0'=>"No Staff Assigned");

		foreach($all as $k=>$v){
			$arr[$k] = $v['firstname']." ".$v['lastname'];
		}
		return $arr;
	}
 
}
