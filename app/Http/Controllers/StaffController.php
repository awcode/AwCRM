<?php
namespace AwCore\Http\Controllers;

use Repositories\User\UserInterface as UserInterface ;
use Repositories\Event\EventInterface as EventInterface ;
use URL;
use Validator;
use Input;
use Redirect;

class StaffController extends BaseController {
    protected $layout = "layouts.main";

	public function __construct(UserInterface $user, EventInterface $event) {
		parent::__construct($event);
		$this->user = $user;
		$this->event = $event;
		$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->beforeFilter('auth', array('only'=>array('getDashboard')));
    	$this->breadcrumbs[] = array(URL::to('staff'), "Staff");
	}
	
	public function getIndex(){
		$users = $this->user->all();
		$this->doLayout('staff.list')
                ->with("users", $users);
	}

	public function getView($id){
		$staff = $this->user->find($id);
		$this->doLayout('staff.view')
                ->with("staff", $staff);
	}

	public function getNew() {
		$this->doLayout('staff.edit')
        		->with("staff", $this->user->getEmptyArr());
        
	}
	
	public function getEdit($id) {
		$staff = $this->user->find($id);
		
		$this->doLayout('staff.edit')
        		->with("staff", $staff);
	}
	
	public function getDelete($id) {
        $this->staff->delete($id);
        return Redirect::to('/customer')->with('message', 'Customer deleted!');
    }
    
 	public function postNew(){
 		return $this->_update();
 	}

	public function postEdit($id){
 		return $this->_update($id);
 	}
 	
 	public function _update() {
       	$validator = Validator::make(Input::all(), $this->user->getRules());
 
		if ($validator->passes()) {
		   	$this->user->addUser();
		 
			return Redirect::to('/staff')->with('message', 'Thanks for registering!');
		} else {
		    return Redirect::to('/staff')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}  
	}
	
}
?>
