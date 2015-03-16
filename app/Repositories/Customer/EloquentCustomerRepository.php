<?php
namespace Repositories\Customer;

use Customer;
use Auth;
use Repositories\AbstractEloquentRepository;
use Repositories\User\UserInterface as UserInterface ;

class EloquentCustomerRepository extends AbstractEloquentRepository implements CustomerInterface { 
	/**
	* @var Model
	*/
  	protected $model;
 
  	/**
	* Constructor
	*/
  	public function __construct(Customer $model, UserInterface $user)
  	{
    	$this->model = $model;
    	$this->user = $user;
  	}
 
 	public function addUpdatePost(){
		$arr = $this->_addUpdatePost();
		if($arr['saveaction']=="insert"){
			$record = $this->model->find($arr['primary_key']);
			$record->staff_added = Auth::user()->id;
			$record->staff_assigned = Auth::user()->id;
			$record->save();
		}
		return $arr;
	}
	
	public function all(){
		$custs = $this->_all();
		$allstaff = $this->user->all();
        
        if(count($custs)){
        	foreach($custs as $k=>$v){
        		$key = $v['staff_assigned'];
        		if(isset($allstaff[$key])){$custs[$k]['staff_name'] = $allstaff[$key]['firstname']." ".$allstaff[$key]['lastname'];}
        		else{$custs[$k]['staff_name'] = "Unassigned";}
        		
        		$key = $v['staff_added'];
        		if(isset($allstaff[$key])){$custs[$k]['staff_added_name'] = $allstaff[$key]['firstname']." ".$allstaff[$key]['lastname'];}
        		else{$custs[$k]['staff_added_name'] = "Unassigned";}
        	}
        }
		return $custs;
	}

	public function find($id){
		$cust = $this->_find($id);
		$allstaff = $this->user->all();
        
        $key = $cust['staff_assigned'];
        if(isset($allstaff[$key])){$cust['staff_name'] = $allstaff[$key]['firstname']." ".$allstaff[$key]['lastname'];}
        else{$cust['staff_name'] = "Unassigned";}
        
        $key = $cust['staff_added'];
        if(isset($allstaff[$key])){$cust['staff_added_name'] = $allstaff[$key]['firstname']." ".$allstaff[$key]['lastname'];}
        else{$cust['staff_added_name'] = "Unassigned";}
      
		return $cust;
	}

}
