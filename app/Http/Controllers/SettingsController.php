<?php
namespace AwCRM\Http\Controllers;

use Repositories\EventTypes\EventTypesInterface as EventTypesInterface ;
use Repositories\Event\EventInterface as EventInterface ;
use Repositories\ConfigSettings\ConfigSettingsInterface as ConfigSettingsInterface ;
use URL;
use EventTypes;
use Redirect;


class SettingsController extends BaseController {
    protected $layout = "layouts.main";

	public function __construct(EventTypesInterface $eventtypes, EventInterface $event, ConfigSettingsInterface $config) {
		parent::__construct($event);
		$this->eventtypes = $eventtypes;
		$this->event = $event;
		$this->config = $config;
		$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->beforeFilter('auth', array('only'=>array('getDashboard')));
    	$this->menu = "settings";
    	$this->breadcrumbs[] = array(URL::to('/settings'), "Settings");
	}
	
	public function getIndex(){
		$config = $this->config->getFlatKeyValues();
		$this->doLayout('settings.general')
				->with("config", $config);
	}

	public function postIndex(){
		$this->doLayout('settings.general');
		
    	$arr = $this->config->saveKeyValues();
        
        return Redirect::to('/settings')->with('message', 'Settings '.(($arr['saveaction']=="update")?'Updated':'added').'!');
	}

	public function getEventtypes(){
		$eventtypes = $this->eventtypes->all();
		$this->doLayout('settings.eventtypes')
				->with("eventtypes", $eventtypes);
	}

	public function getNeweventtype(){
		$this->doLayout('settings.editeventtypes')
				->with("eventtype", $this->eventtypes->getEmptyArr())
				->with("eventtypeconfig", EventTypes::getEventTypeConfig() );
	}

	public function getEditeventtype($id){
		$eventtype = $this->eventtypes->find($id);
		
		$this->doLayout('settings.editeventtypes')
				->with("eventtype", $eventtype)
				->with("eventtypeconfig", EventTypes::getEventTypeConfig(@unserialize($eventtype['event_type_config'])) );
	}

 	public function postEditeventtype($id){
 		return $this->_updateEventtype($id);
 	}
 	
 	public function postNeweventtype(){
 		return $this->_updateEventtype();
 	}
	
	private function _updateEventtype() {
		$config = EventTypes::getEventTypeConfig($_POST);
    	$arr = $this->eventtypes->addUpdatePost($config);
        
        return Redirect::to('/settings/eventtypes')->with('message', 'Event Type '.(($arr['saveaction']=="update")?'Updated':'added').'!');
    }
    
    
}
?>
