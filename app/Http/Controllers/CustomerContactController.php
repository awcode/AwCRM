<?php
namespace AwCRM\Http\Controllers;

use Repositories\Contact\ContactInterface as ContactInterface ;
use Repositories\Event\EventInterface as EventInterface ;

class CustomerContactController extends ContactController
{
	protected $layout = "layouts.main";

	public function __construct(ContactInterface $contact, EventInterface $event) { 
		parent::__construct($contact, $event);
		$this->contact = $contact;
		$this->event = $event;
		$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->beforeFilter('auth', array('only'=>array('getDashboard')));
	}
	
	
}
