<?php
namespace Repositories\Event;

use Events;
use EventTypes;
use Repositories\AbstractEloquentRepository;
use Repositories\EventTypes\EventTypesInterface as EventTypesInterface ;
use Input;


class EloquentEventRepository extends AbstractEloquentRepository implements EventInterface { 
  	/**
   	* @var Model
   	*/
  	protected $model;
 
  	/**
   	* Constructor
   	*/
	public function __construct(Events $model, EventTypesInterface $eventtypes)
	{
		parent::__construct();
		$this->model = $model;
		$this->eventtypes = $eventtypes;
	}
 
 
  	public function allTypesSelectArr(){
		$all = $this->eventtypes->all();
		$arr = array('0'=>"");

		foreach($all as $k=>$v){
			$arr[$k] = $v['event_type_name'];
		}
		return $arr;
	} 

	public function all(){
		$events = $this->_all();
		$types = $this->eventtypes->all();
        
        if(count($events)){
        	foreach($events as $k=>$v){       		
        		$key = $v['event_type_id'];
        		if(isset($types[$key])){$events[$k]['type_config'] = @unserialize($types[$key]['event_type_config']);}
        		else{$events[$k]['type_config'] = false;}
        	}
        }
		return $events;
	}

	public function find($id){
		$event = $this->_find($id);
		$types = $this->eventtypes->all();
        
        $key = $event['event_type_id'];
        if(isset($types[$key])){$event['type_config'] = @unserialize($types[$key]['event_type_config']);}
        else{$event['type_config'] = false;}
      
		return $event;
	}
	
 	public function addUpdatePost(){
		$arr = $this->_addUpdatePost();
		if($arr['saveaction']=="insert"){
			if(strtotime($arr['scheduled']) < time()){
				$record = $this->model->find($arr['primary_key']);
				$record->event_status = 1;
				$record->save();
			}
		}
		return $arr;
	}

	public function getEmptyArr(){
		$event = $this->_getEmptyArr();
		$event['type_config'] = EventTypes::getEventTypeConfig();
		return $event;
	}

	public function calendarJson(){
		$events = Events::where("scheduled", ">=", Input::get("start"))
			->where("scheduled", "<=", Input::get("end"))
			->where(function ($query) {
				$query->whereIn("event_type_id", explode(",",Input::get("show_types")))
					  ->orWhere('event_type_id', '=', '');
			})->where(function ($query) {
				$users = explode(",",Input::get("show_users"));
				foreach($users as $user){
					$query->orWhere("users", "LIKE", "~".$user."~");
				}
				$query->orWhere('users', '=', '');
			})->get();
		//dd(DB::getQueryLog());

		$arr = array();	
		foreach($events as $event){
			$arr[] = array(
				"id"=>$event->event_id,
				"title"=>$event->event_title,
				"desc"=>$event->event_desc,
				"start"=>$event->scheduled,
				"url"=>""
			);
		}	
			
		return json_encode($arr);
	}
	
	public function getByCustomer($id){
		$events = Events::where("customers", "LIKE", "~".$id."~")->get();
		$types = $this->eventtypes->all();

		$arr = array();	
		foreach($events as $event){
			$arr[] = array(
				"id"=>$event->event_id,
				"title"=>$event->event_title,
				"desc"=>$event->event_desc,
				"start"=>$event->scheduled,
				"url"=>"",
				"type_id"=>$event->event_type_id,
				"type_name"=>$types[$event->event_type_id]['event_type_name']
			);
		}
		return $arr;
	}

	public function getAlertCount($id){
		$alerts = $this->getAlerts($id);
		$cnt = 0;
		foreach(Events::alert_groups() as $group){
			if($group!= "upcoming" && isset($alerts[$group])){$cnt += count($alerts[$group]);}
		}
		return $cnt;
	}
	
	public function getAlerts($id){
		$events = Events::where("users", "LIKE", "~".$id."~")
		->where("event_status", "=", "0")->get();
		$types = $this->eventtypes->all();

		$arr = array();	
		foreach($events as $event){
			$time = strtotime($event->scheduled);
			if($time < time()){$group = "overdue";}
			elseif($time <= strtotime(date("Y-m-d 23:59:59"))){$group = "today";}
			elseif($time <= (strtotime(date("Y-m-d 23:59:59"))+(3600*24))){$group = "tomorrow";}
			else{$group = "upcoming";}
			
			$arr[$group][] = array(
				"id"=>$event->event_id,
				"title"=>$event->event_title,
				"desc"=>$event->event_desc,
				"start"=>$event->scheduled,
				"url"=>"",
				"type_id"=>$event->event_type_id,
				"type_name"=>$types[$event->event_type_id]['event_type_name']
			);
		}
		return $arr;
	}
 
}
