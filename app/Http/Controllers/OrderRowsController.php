<?php
namespace AwCRM\Http\Controllers;

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

class OrderRowsController extends BaseController
{
	protected $layout = "layouts.popup";

	public function __construct(OrderRowsInterface $orderrows, OrdersInterface $orders, AddressInterface $address, EventInterface $event) {
		parent::__construct($event);
		$this->orderrows = $orderrows;
		$this->orders = $orders;
		$this->address = $address;
		$this->event = $event;
		$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->breadcrumbs[] = array(URL::to('order'), "Orders");
	}
	
	public function getIndex() {
    	
    }
 
    public function getView($id) {
    	$this->breadcrumbs[] = array(URL::to('orders/view/'.$id), "View");
        $cust = $this->customer->find($id);
        $contacts = $this->contact->getWhere('cust_id', '=', $id);
        
        $this->doLayout("orders.view")
                ->with("cust", $cust)
                ->with("contacts", $contacts)
                ->with("customer_events", $customer_events);
    
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
 
    public function getNew() {

    	
        $this->doLayout("orderrows.edit")
        		->with("order", $this->orders->getEmptyArr())
           		->with("orderrows", $this->orderrows->getEmptyArr());
    }
 
 	public function postEdit($id){
 		return $this->_update($id);
 	}
 	
 	public function postNew(){
 		return $this->_update();
 	}
 	
    private function _update() {
    	$arr = $this->orders->addUpdatePost();

        return Redirect::to('/orders/view/'.$arr['cust_id'])->with('message', 'Order '.(($arr['saveaction']=="update")?'Updated':'Added').'!');
    }
}
