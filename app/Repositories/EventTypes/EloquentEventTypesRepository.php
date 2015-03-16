<?php
namespace Repositories\EventTypes;

use EventTypes;
use Repositories\AbstractEloquentRepository;

class EloquentEventTypesRepository extends AbstractEloquentRepository implements EventTypesInterface { 
  	/**
   	* @var Model
   	*/
  	protected $model;
 
  	/**
   	* Constructor
   	*/
  	public function __construct(EventTypes $model)
  	{
    	$this->model = $model;
  	}
  
 	public function addUpdatePost($config = false){
		$arr = $this->_addUpdatePost();
		if($config){
			$record = $this->model->find($arr['primary_key']);
			$record->event_type_config = serialize($config);
			$record->save();
		}
		return $arr;
	}
 
	public  function getCustomerIcons(){
		$types = $this->all();
		$arr = array();
		if(is_array($types) && count($types)){
			foreach($types as $k=>$v){
				$config = @unserialize($v['event_type_config']);
				if(isset($config['showcustomer']) && $config['showcustomer']){
					$arr[] = array(
						"id"=>$v['event_type_id'],
						"name"=>$v['event_type_name'],
						"icon"=>$v['event_type_icon']					
					);
				}
			}
		}
		return $arr;
	}
}
