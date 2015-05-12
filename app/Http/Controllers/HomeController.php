<?php
namespace AwCore\Http\Controllers;

use Repositories\User\UserInterface as UserInterface ;
use Auth;
Use Input;
use Redirect;
use Url;

class HomeController extends BaseController {
    protected $layout = "layouts.main";

	public function __construct(UserInterface $user) {
		parent::__construct();
		$this->user = $user;
		$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->beforeFilter('auth', array('only'=>array('getDashboard')));
	}
	
	public function getIndex(){
		if(!Auth::check()){
			$this->doLayout('home.login');
		}else{
			$this->breadcrumbs[] = array(URL::to('/'), "Dashboard");
			$dashboard_header  = $this->modulesFilterHTML("", "dashboardHeader");
			$dashboard_content = $this->modulesFilterHTML("", "dashboardContent");
			$dashboard_footer = $this->modulesFilterHTML("", "dashboardFooter");
			$this->doLayout('home.dashboard')
				->with('dashboard_header', $dashboard_header)
				->with('dashboard_content', $dashboard_content)
				->with('dashboard_footer', $dashboard_footer);
		}
	}

	
	public function getLogout() {
		Auth::logout();
		return Redirect::to('/')->with('message', 'You are now logged out!');
	}
	
	public function postSignin() {
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
			$this->user->recordLogin(Auth::user()->id);
			return Redirect::to('/')->with('message', 'You are now logged in!');
		} else {
			return Redirect::to('/')
				->with('message', 'Your username/password combination was incorrect')
				->withInput();
		}  
	}
}
?>
