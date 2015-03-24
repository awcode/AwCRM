<?php namespace AwCore\Modules\Orders;

use Illuminate\Support\ServiceProvider;
use View;

use AwCore\Modules\Orders\Repositories\Orders\OrdersInterface as OrdersInterface ;
use AwCore\Modules\Orders\Repositories\OrderRows\OrderRowsInterface as OrderRowsInterface ;

class Orders extends ServiceProvider{

	
	public function __construct(OrdersInterface $orders, OrderRowsInterface $order_rows){
		
		$this->orders = $orders;
        $this->order_rows = $order_rows;
		
		$this->filters = array(
			//"addOrderRowButtons"=>"addOrderRowButton"
		);
	
	}
	
	public function register(){
	
	}
	
    
    

    
    function prepareRow($arr){
   
    	
    	return $arr;
    }
    
    public function addOrderRowButton($html){
    	//$html .= View::make("OrdersView::orderrowbuttons");;
    	
    	return $html;
    }
    
   
}
