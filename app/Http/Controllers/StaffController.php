<?php
namespace AwCore\Http\Controllers;

use Repositories\User\UserInterface as UserInterface ;
use URL;
use Validator;
use Input;
use Redirect;

class StaffController extends BaseController {
    protected $layout = "layouts.main";

	public function __construct(UserInterface $user) {
		parent::__construct();
		$this->user = $user;
		$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->beforeFilter('auth', array('only'=>array('getDashboard')));
    	$this->breadcrumbs[] = array(URL::to('staff'), "Staff");
	}
	
	public function getIndex(){
		$users = $this->user->all();
		$staff_list_view  = $this->modulesFilterHTML("", "staffListView");
		
		$this->doLayout('staff.list')
                ->with("users", $users)
                ->with("staff_list_view", $staff_list_view);
	}

	public function getView($id){
		$staff = $this->user->find($id);
		$staff_single_view  = $this->modulesFilterHTML("", "staffSingleView", $staff);
		
		$this->doLayout('staff.view')
                ->with("staff", $staff)
                ->with("staff_single_view", $staff_view);
	}

	public function getNew() {
		$staff_new_view  = $this->modulesFilterHTML("", "staffNewView");

		$this->doLayout('staff.edit')
        		->with("staff", $this->user->getEmptyArr())
                ->with("staff_new_view", $staff_new_view);
        
	}
	
	public function getEdit($id) {
		$staff = $this->user->find($id);
		$staff_edit_view  = $this->modulesFilterHTML("", "staffEditView", $staff);
		
		$this->doLayout('staff.edit')
        		->with("staff", $staff)
                ->with("staff_edit_view", $staff_edit_view);
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
 	
 	public function _update($id=0) {
		$this->modulesAction("staffEditValidate");
		$rules = $this->user->getRules();
		if(!$id){
			$rules['password']='required|between:6,22|confirmed';
			$rules['password_confirmation']='required|between:6,22';
		}
		$validator = Validator::make(Input::all(), $rules);
 
		if ($validator->passes()) {
			if($id){
		   		$this->user->updateUser($id);
		   	}else{
		   		$this->user->addUser();
		   	}
			$this->modulesAction("staffEditSave", $this->user);
		 
			return Redirect::to('/staff')->with('message', 'Thanks for registering!');
		} else {
		    return Redirect::to('/staff')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}  
	}
	
}
?>
