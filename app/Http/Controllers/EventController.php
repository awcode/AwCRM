<?php
namespace AwCore\Http\Controllers;

use Repositories\Event\EventInterface as EventInterface ;
use Repositories\EventTypes\EventTypesInterface as EventTypesInterface ;
use Repositories\User\UserInterface as UserInterface ;
use View;

class EventController extends BaseController
{
	protected $layout = "layouts.main";

	public function __construct(EventInterface $event, EventTypesInterface $eventtypes, UserInterface $user) {
		parent::__construct($event);
		$this->event = $event;
		$this->eventtypes = $eventtypes;
		$this->user = $user;
		$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->beforeFilter('auth', array('only'=>array('getDashboard')));
	}
	
	public function getIndex(){
		$eventtypedd = $this->event->allTypesSelectArr();
		$eventtypes = $this->eventtypes->all();
		$allstaff = $this->user->all();
		
        $this->doLayout("event.main")
        		->with("eventtypedd", $eventtypedd)
        		->with("eventtypes", $eventtypes)
        		->with("allstaff", $allstaff);
    }

	public function getAlerts(){
        $alerts = $this->event->getAlerts(Auth::user()->id);
        $alert_groups = Events::alert_groups();
        
        $this->doLayout("event.alerts")
        		->with("alerts", $alerts)
        		->with("alert_groups", $alert_groups);
    }

	public function getMessages(){
        $this->doLayout("event.messages");
    }
 
    public function getEdit($id) {
        $event = $this->event->find($id);
		$eventtypedd = $this->event->allTypesSelectArr();
		$eventtypes = $this->eventtypes->all();
		$allstaff = $this->user->all();
		$return_url = $_SERVER['HTTP_REFERER'];
        
        $this->doLayout("event.edit")
        		->with("event", $event)
        		->with("eventtypedd", $eventtypedd)
        		->with("eventtypes", $eventtypes)
        		->with("allstaff", $allstaff)
        		->with("sel_staff", explode("~", $event['users']))
        		->with("scheduled_date", date("m/d/Y H:i", strtotime($event['scheduled'])))
        		->with("return_url", $return_url);
        
        $this->title = "Edit ".$event['event_title'];
    }
    
    public function getPopupedit($id){
    	$this->layout = View::make("layouts.popup");
    	$this->getEdit($id);
    }
 
    public function getDelete($id) {
       	$record = $this->event->find($id);
        $record->delete();
        return Redirect::to('/event')->with('message', 'Event deleted!');
    }
 
    public function getNew($arr=array(), $return_url="") {
    	$data = explode("-", $arr);
    	$event = $this->event->getEmptyArr();	
		$eventtypedd = $this->event->allTypesSelectArr();
		$eventtypes = $this->eventtypes->all();
		$allstaff = $this->user->all();
		$scheduled_date = "";
    	if(isset($data[0]) && is_numeric($data[0])){
    		$type_id = $data[0];
    		$type = $this->eventtypes->find($type_id);
    		$event['event_type_id'] = $type['event_type_id'];
    		$event['type_config'] = @unserialize($type['event_type_config']);
    		if(isset($event['type_config']['pastfuture']) && ($event['type_config']['pastfuture'] == 1) ){
    			$scheduled_date = date("m/d/Y H:i");
    		}
    	}
    	if(isset($data[1]) && is_numeric($data[1])){
    		$cust_id = $data[1];
    		$event['customers'] = "~".$cust_id."~";
    	}

        $this->doLayout("event.edit")
        		->with("event", $event)
        		->with("eventtypedd", $eventtypedd)
        		->with("eventtypes", $eventtypes)
        		->with("allstaff", $allstaff)
        		->with("sel_staff", array(Auth::user()->id))
        		->with("scheduled_date", $scheduled_date)
        		->with("return_url", $return_url);
        
        $this->title = "Add ".$event['event_title'];
    }
    public function getPopupnew($type_id=false){
    	$this->layout = View::make("layouts.popup");
    	$this->getNew($type_id, $_SERVER['HTTP_REFERER']);
    }
 
 	public function postEdit($id){
 		return $this->_update($id);
 	}
 	
 	public function postNew(){
 		return $this->_update();
 	}
 	
    private function _update() {
    	$arr = $this->event->addUpdatePost();
    	if(Input::get("return_url")){$return = Input::get("return_url");}
    	else{$return = '/event';}
        return Redirect::to($return)->with('message', 'Event '.(($arr['saveaction']=="update")?'Updated':'added').'!');
    }
    
    public function getCalendarjson(){
    	header("Content-Type: text/json");
    	echo $this->event->calendarJson();
    	die();
    }
}
