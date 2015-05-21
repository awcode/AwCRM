<?php
namespace AwCore\Http\Controllers;

use Repositories\User\UserInterface as UserInterface ;
use URL;
use Validator;
use Input;
use Redirect;

class UserController extends BaseController {
    protected $layout = "layouts.main";

	public function __construct(UserInterface $user) {
		parent::__construct();
		$this->user = $user;
		$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->beforeFilter('auth', array('only'=>array('getDashboard')));
    	$this->breadcrumbs[] = array(URL::to('user'), "Users");
	}
	
	public function getIndex(){
		$users = $this->user->all();
		$user_list_view  = $this->modulesFilterHTML("", "userListView", $users);
		
		$this->doLayout('user.list')
                ->with("users", $users)
                ->with("user_list_view", $user_list_view);
	}

	public function getView($id){
		$staff = $this->user->find($id);
		$user_single_view  = $this->modulesFilterHTML("", "userSingleView", $staff);
		
		$this->doLayout('user.view')
                ->with("user", $user)
                ->with("user_single_view", $user_single_view);
	}

	public function getNew() {
		$user_new_view  = $this->modulesFilterHTML("", "userNewView");

		$this->doLayout('user.edit')
        		->with("user", $this->user->getEmptyArr())
                ->with("user_edit_view", $user_new_view);
        
	}
	
	public function getEdit($id) {
		$user = $this->user->find($id);
		$user_edit_view  = $this->modulesFilterHTML("", "userEditView", $staff);
		
		$this->doLayout('user.edit')
        		->with("user", $user)
                ->with("user_edit_view", $user_edit_view);
	}
	
	public function getDelete($id) {
        $this->user->delete($id);
        return Redirect::to('/user')->with('message', 'User deleted!');
    }
    
 	public function postNew(){
 		return $this->_update();
 	}

	public function postEdit($id){
 		return $this->_update($id);
 	}
 	
 	public function _update($id=0) {
		$this->modulesAction("userEditValidate");
		$rules = $this->user->rules();
		if(!$id){
			$rules['password']='required|between:6,22|confirmed';
			$rules['password_confirmation']='required|between:6,22';
		}
		$validator = Validator::make(Input::all(), $rules);
 
		if ($validator->passes()) {
			if($id){
		   		$this->user->updateUser($id);
		   	}else{
		   		$id = $this->user->addUser();
		   	}
			$this->modulesAction("userEditSave", $this->user->getModel()->find($id));
		 
			return Redirect::to('/user')->with('message', 'Thanks for registering!');
		} else {
			print_r( $validator->errors()->all());die();
		    return Redirect::to('/user')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}  
	}
	
}
?>
