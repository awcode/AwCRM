<?php
namespace AwCRM\Http\Controllers;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Routing\Controller; 
use Auth;
use URL;
use View;
use Validator;


use Repositories\Event\EventInterface as EventInterface ;

class BaseController extends Controller {

	public $title;
	public $breadcrumbs = array();
	public $menu = "main";
	public $alert_count;
	
	public function __construct(EventInterface $event) {
		if($event && Auth::check()) {
			$this->event = $event;
			$this->alert_count = $this->event->getAlertCount(Auth::user()->id);
		}
    	$this->title = str_replace(array("Controller", "AwCRM"), "", get_class($this));
    	$this->breadcrumbs[] = array(URL::to('/'), "Home");
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
			
			$this->layout = View::make($this->layout)
				->with("alert_count", $this->alert_count);
		}
		
	}
	
	protected function doLayout($content){
		
		$this->layout->breadcrumbs = View::make("layouts.breadcrumbs")
				->with("breadcrumbs", $this->breadcrumbs);
		
		$this->layout->menu = View::make("layouts.".$this->menu."menu");
		
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


	/**
	 * Handle calls to missing methods on the controller.
	 *
	 * @param  array   $parameters
	 * @return mixed
	 *
	 * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
	 */
	public function missingMethod($parameters = array())
	{
		throw new NotFoundHttpException("Controller method not found.");
	}

}
