<?php
namespace AwCRM\Http\Controllers;

use Repositories\Address\AddressInterface as AddressInterface ;
use Repositories\Event\EventInterface as EventInterface ;

class CustomerAddressController extends AddressController
{
	protected $layout = "layouts.main";

	public function __construct(AddressInterface $address, EventInterface $event) {
		parent::__construct($address, $event);
		$this->address = $address;
		$this->event = $event;
		$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->beforeFilter('auth', array('only'=>array('getDashboard')));
	}
	    
    
}
