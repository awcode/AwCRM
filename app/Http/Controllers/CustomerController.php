<?php
namespace AwCRM\Http\Controllers;

use Repositories\Customer\CustomerInterface as CustomerInterface ;
use Repositories\Contact\ContactInterface as ContactInterface ;
use Repositories\User\UserInterface as UserInterface ;
use Repositories\Address\AddressInterface as AddressInterface ;
use Repositories\Event\EventInterface as EventInterface ;
use Repositories\EventTypes\EventTypesInterface as EventTypesInterface ;
use Repositories\Orders\OrdersInterface as OrdersInterface ;
use URL;
use Validator;
use Input;
use Redirect;

class CustomerController extends BaseController
{
	protected $layout = "layouts.main";

	public function __construct(CustomerInterface $customer, ContactInterface $contact, UserInterface $user , AddressInterface $address, EventTypesInterface $eventtypes, EventInterface $event, OrdersInterface $orders) {
		parent::__construct($event);
		$this->customer = $customer;
		$this->contact = $contact;
		$this->user = $user;
		$this->address = $address;
		$this->eventtypes = $eventtypes;
		$this->event = $event;
		$this->orders = $orders;
		$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->beforeFilter('auth', array('only'=>array('getDashboard')));
    	$this->breadcrumbs[] = array(URL::to('customer'), "Customers");
	}
	
	public function getIndex() {
    	$this->breadcrumbs[] = array(URL::to('customer'), "All");
        $custs = $this->customer->all();
        
        $this->doLayout("customer.list")
                ->with("custs", $custs);
    }
 
    public function getView($id) {
    	$this->breadcrumbs[] = array(URL::to('customer/view/'.$id), "View");
        $cust = $this->customer->find($id);
        $contacts = $this->contact->getWhere('cust_id', '=', $id);
        $addresses = $this->address->getWhere('cust_id', '=', $id);
        $eventtype_icons = $this->eventtypes->getCustomerIcons();
        $customer_events = $this->event->getByCustomer($id);
        $orders = $this->orders->getWhere("cust_id", "=", $id);
        
        $this->doLayout("customer.view")
                ->with("cust", $cust)
                ->with("addresses", $addresses)
                ->with("contacts", $contacts)
                ->with("eventtype_icons", $eventtype_icons)
                ->with("orders", $orders)
                ->with("customer_events", $customer_events);
    
    	$this->title = $cust['company_name'];
    }
    
    public function getEdit($id) {
    	$this->breadcrumbs[] = array(URL::to('customer/edit/'.$id), "Edit");
        $cust = $this->customer->find($id);
        $allstaff = $this->user->allUserSelectArr();
        
        $this->doLayout("customer.edit")
                ->with("cust", $cust)
                ->with("allstaff", $allstaff);
        
        $this->title = "Edit ".$cust['company_name'];
    }
 
    public function getDelete($id) {
        $this->customer->delete($id);
        return Redirect::to('/customer')->with('message', 'Customer deleted!');
    }
 
    public function getNew() {
    	$this->breadcrumbs[] = array(URL::to('customer/new'), "New");
    	$allstaff = $this->user->allUserSelectArr();
    	
        $this->doLayout("customer.edit")
        		->with("cust", $this->customer->getEmptyArr())
                ->with("allstaff", $allstaff);
    }
 
 	public function postEdit($id){
 		return $this->_update($id);
 	}
 	
 	public function postNew(){
 		return $this->_update();
 	}
 	
    private function _update() {
    	$arr = $this->customer->addUpdatePost();

        return Redirect::to('/customer/view/'.$arr['cust_id'])->with('message', 'Customer '.(($arr['saveaction']=="update")?'Updated':'added').'!');
    }
}
