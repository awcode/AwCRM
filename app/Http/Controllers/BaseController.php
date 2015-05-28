<?php
namespace AwCore\Http\Controllers;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Routing\Controller; 
use Auth;
use URL;
use App;
use View;
use Validator;
use HTML;
use Module;


class BaseController extends Controller {

	public $title;
	public $breadcrumbs = array();
	public $menu = "main";
	public $alert_count;
	
	protected $modules;
	protected $filters;
	protected $actions;
	
	public function __construct() {
    	$this->title = str_replace(array("Controllers\\", "Controllers", "Controller", "\Modules\\", "AwCore", "\Http\\", "'"), "", get_class($this));
    	$this->breadcrumbs[] = array(URL::to('/'), "Home");
    	
		$modules = Module::enabled();
		if(is_array($modules) && count($modules)){
			foreach($modules as $module){
				$slug = $module['slug'];
				$path = "\AwCore\Modules\\".ucfirst($slug)."\\".ucfirst($slug)."";
				$this->title = str_replace(ucfirst($slug)."\\", "", $this->title);
				$this->modules[$slug] = App::make($path);
				if(isset($this->modules[$slug]->filters) && is_array($this->modules[$slug]->filters) && count($this->modules[$slug]->filters)){
					foreach($this->modules[$slug]->filters as $filter=>$method){
						$this->filters[$filter][] = array("module"=>$slug, "method"=>$method);
					}
				}
				if(isset($this->modules[$slug]->actions) && is_array($this->modules[$slug]->actions) && count($this->modules[$slug]->actions)){
					foreach($this->modules[$slug]->actions as $action=>$method){
						$this->actions[$action][] = array("module"=>$slug, "method"=>$method);
					}
				}
			}
		}
	}


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		
		if ( ! is_null($this->layout))
		{
			$headMenu = $this->modulesFilterHTML("","getMenu_head");
			$scripts = $this->modulesLoadScripts();
			$headSection = $this->modulesFilterHTML($scripts,"getHeadSection");
			
			$this->layout = View::make($this->layout)
				->with("alert_count", $this->alert_count)
				->with("product_name", $this->modulesFilterHTML("AwCore","setProductName"))
				->with("headSection", $headSection)
				->with("headMenu", $headMenu);
		}
		
	}
	
	public function doLayout($content, $path=false){
		return $this->_doLayout($content, $path);
	}
	
	protected function _doLayout($content, $path=false){
		
		$this->layout->breadcrumbs = View::make("layouts.breadcrumbs")
				->with("breadcrumbs", $this->breadcrumbs);
		
		if($this->menu == "main"){
			$default_menu = '<li class="dropdown">
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-user"></i>
								<span class="hidden-xs">Users</span>
							</a>
							<ul class="dropdown-menu">
								<li>'.HTML::link('user', 'View Users').'</li>
								<li>'.HTML::link('user/new', 'Add User').'</li>
							</ul>
						</li>';
		}else{
			$default_menu = '';
		}
		$menucontent = $this->modulesFilterHTML($default_menu,"getMenu_".$this->menu);
		
		
		$this->layout->menu = View::make("layouts.".$this->menu."menu")
				->with("menuContent", $menucontent);
		
		if($path){
			

			return $this->layout->content = View::make($path."::$content");
		}
		return $this->layout->content = View::make($content);	
	}


	/**
	 * Execute an action on the controller.
	 *
	 * @param  string  $method
	 * @param  array   $parameters
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function callAction($method, $parameters)
	{
		$this->setupLayout();

		$response = call_user_func_array(array($this, $method), $parameters);

		// If no response is returned from the controller action and a layout is being
		// used we will assume we want to just return the layout view as any nested
		// views were probably bound on this view during this controller actions.
		if (is_null($response) && ! is_null($this->layout))
		{
			$response = $this->layout;
		}
		
		View::share('title', $this->title);
		
		return $response;
	}

	protected function modulesFilterHTML($html, $filter, $options=null){
		if(isset($this->filters[$filter]) && is_array($this->filters[$filter]) && count($this->filters[$filter])){
			foreach($this->filters[$filter] as $filter_arr){
				if(method_exists($this->modules[$filter_arr['module']], $filter_arr['method'])){
					$html = $this->modules[$filter_arr['module']]->$filter_arr['method']($html, $options);
				}
			}
		}
		return $html;
	}

	protected function modulesAction($action, $options=null){
		$response = array("cnt"=>0);
		if(isset($this->actions[$action]) && is_array($this->actions[$action]) && count($this->actions[$action])){
			foreach($this->actions[$action] as $action_arr){
				if(method_exists($this->modules[$action_arr['module']], $action_arr['method'])){
					$this->modules[$action_arr['module']]->$action_arr['method']($response, $options);
				}
			}
		}
		return $response;
	}
	
	public function queueScript($name, $src){
		//[[TODO - Lots of extra functionality can be added here, for styles too]]
		global $AWCORE_LOAD_SCRIPTS;
		
		$AWCORE_LOAD_SCRIPTS[$name]['src'] = $src;
		
	}
	
	protected function modulesLoadScripts(){
		global $AWCORE_LOAD_SCRIPTS;
		$html = "";
		if(is_array($AWCORE_LOAD_SCRIPTS) && count($AWCORE_LOAD_SCRIPTS)){
			foreach($AWCORE_LOAD_SCRIPTS as $script){
				$html .= "<script type='text/javascript' src='".$script['src']."'></script>";
			}
		}
		return $html;
	}
	

}
