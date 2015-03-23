<?php
namespace AwCore\Http\Controllers;

use Repositories\Customer\CustomerInterface as CustomerInterface ;
use Repositories\Contact\ContactInterface as ContactInterface ;
use Repositories\User\UserInterface as UserInterface ;
use Repositories\Address\AddressInterface as AddressInterface ;
use Repositories\Event\EventInterface as EventInterface ;
use Repositories\Orders\OrdersInterface as OrdersInterface ;
use Repositories\OrderRows\OrderRowsInterface as OrderRowsInterface ;
use URL;
use Validator;
use Input;
use Redirect;

class OrderController extends BaseController
{
	protected $layout = "layouts.main";

	public function __construct(OrdersInterface $orders, OrderRowsInterface $orderrows, CustomerInterface $customer, ContactInterface $contact, UserInterface $user , AddressInterface $address, EventInterface $event) {
		parent::__construct($event);
		$this->orders = $orders;
		$this->orderrows = $orderrows;
		$this->customer = $customer;
		$this->contact = $contact;
		$this->user = $user;
		$this->address = $address;
		$this->event = $event;
		$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->breadcrumbs[] = array(URL::to('order'), "Orders");
    	
	}
	
	public function getIndex() {
    	$this->breadcrumbs[] = array(URL::to('order'), "All");
        $orders = $this->orders->all();
        
        $this->doLayout("orders.list")
                ->with("orders", $orders);
    }
 
    public function getView($id) {
    	$this->breadcrumbs[] = array(URL::to('orders/view/'.$id), "View");
    	$order = $this->orders->find($id);
    	$orderrows = $this->orderrows->prepareRows($id);
        $cust = $this->customer->find($order['cust_id']);
        $contacts = $this->contact->getWhere('cust_id', '=', $order['cust_id']);
        $buttons = $this->modulesFilterHTML("", "addOrderRowButtons");
        
        
        $this->doLayout("orders.view")
        		->with("order", $order)
        		->with("orderrows", $orderrows)
                ->with("cust", $cust)
                ->with("contacts", $contacts)
                ->with("buttons", $buttons);
    
    	$this->title = $cust['company_name'];
    }
    
    public function getEdit($id) {
    	$this->breadcrumbs[] = array(URL::to('orders/edit/'.$id), "Edit");
        $cust = $this->customer->find($id);
        $allstaff = $this->user->allUserSelectArr();
        $order = $this->orders->find($id);
        
        $this->doLayout("orders.edit")
                ->with("cust", $cust)
                ->with("order", $order)
                ->with("allstaff", $allstaff);
        
        $this->title = "Edit ".$cust['company_name'];
    }
 
    public function getDelete($id) {
        $this->customer->delete($id);
        return Redirect::to('/orders')->with('message', 'Customer deleted!');
    }
 
    public function getNew($cust_id=false) {
    	$this->breadcrumbs[] = array(URL::to('orders/new'), "New");
    	$allstaff = $this->user->allUserSelectArr();
    	if($cust_id){
    		$contacts = $this->contact->getWhere('cust_id', '=', $cust_id);
        	$cust = $this->customer->find($cust_id);
    	}else{
    		$contacts = array();
       		$cust = $this->customer->getEmptyArr();
    	}
    	
        $this->doLayout("orders.view")
        		->with("order", $this->orders->getEmptyArr())
        		->with("orderrows", $this->orderrows->getEmptyArr())
        		->with("cust", $cust)
                ->with("allstaff", $allstaff)
                ->with("contacts", $contacts);
    }
 
 	public function postEdit($id){
 		return $this->_update($id);
 	}
 	
 	public function postNew(){
 		$arr =  $this->orders->addNewOrder();
 		return Redirect::to('/orders/view/'.$arr['order_id'])->with('message', 'Order Added!');
 	}
 	
    private function _update() {
    	$arr = $this->orders->addUpdatePost();

        return Redirect::to('/orders/view/'.$arr['cust_id'])->with('message', 'Order '.(($arr['saveaction']=="update")?'Updated':'Added').'!');
    }
}
