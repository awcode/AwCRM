<?php
namespace Repositories\Orders;

use Orders;
use OrderRows;
use Input;
use Repositories\AbstractEloquentRepository;
use Repositories\Customer\CustomerInterface as CustomerInterface ;
use Repositories\OrderRows\OrderRowsInterface as OrderRowsInterface ;
use Repositories\Contact\ContactInterface as ContactInterface ;

class EloquentOrdersRepository extends AbstractEloquentRepository implements OrdersInterface { 
	/**
	* @var Model
	*/
	protected $model;
	protected $price;
	protected $vat;
 
	/**
	* Constructor
	*/
	public function __construct(Orders $model, OrderRows $orderrowsmodel, OrderRowsInterface $orderrows, CustomerInterface $customer, ContactInterface $contact)
	{
		parent::__construct();
		$this->model = $model;
		$this->customer = $customer;
		$this->orderrows = $orderrows;
		$this->orderrowsmodel = $orderrowsmodel;
	}
	
	public function addNewOrder(){
		$cust = $this->customer->addUpdatePost();
		
		$order = new $this->model;
		$order->cust_id = $cust['cust_id'];
		$order->save();
		
		$this->processAllRows($order->order_id);
		
		$order->order_value = $this->price;
		$order->save();
		
		return array('order_id'=>$order['order_id']);
	}
	
	public function processAllRows($order_id){
		if(Input::get('new_row') && is_array(Input::get('new_row')) && count(Input::get('new_row'))){
			foreach(Input::get('new_row') as $row){
				$arr = array('order_id'=>$order_id);
				if(Input::get('new_row_price_'.$row)){$arr['order_row_price'] = Input::get('new_row_price_'.$row);}
				if(Input::get('new_row_title_'.$row)){$arr['order_row_object']['title'] = Input::get('new_row_title_'.$row);}
				$arr['order_row_object'] = @serialize($arr['order_row_object']);
				$this->price += $this->saveOrderRow($arr);
			}
		}
	}
	
}
