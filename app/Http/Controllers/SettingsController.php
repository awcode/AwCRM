<?php
namespace AwCore\Http\Controllers;

use Repositories\ConfigSettings\ConfigSettingsInterface as ConfigSettingsInterface ;
use URL;
use EventTypes;
use Redirect;


class SettingsController extends BaseController {
    protected $layout = "layouts.main";

	public function __construct( ConfigSettingsInterface $config) {
		parent::__construct();
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

    
    
}
?>
