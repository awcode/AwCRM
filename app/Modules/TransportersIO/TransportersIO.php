<?php namespace AwCore\Modules\TransportersIO;

use Illuminate\Support\ServiceProvider;
use View;

use AwCore\Modules\TransportersIO\Repositories\Transport\TransportInterface as TransportInterface ;
use AwCore\Modules\TransportersIO\Repositories\TransportLegs\TransportLegsInterface as TransportLegsInterface ;
use AwCore\Modules\TransportersIO\Repositories\Cargo\CargoInterface as CargoInterface ;
use AwCore\Modules\TransportersIO\Repositories\CargoTypes\CargoTypesInterface as CargoTypesInterface ;
use AwCore\Modules\TransportersIO\Repositories\CargoGroups\CargoGroupsInterface as CargoGroupsInterface ;
use AwCore\Modules\TransportersIO\Repositories\VehicleTypes\VehicleTypesInterface as VehicleTypesInterface ;

class TransportersIO extends ServiceProvider{

	
	public function __construct(TransportInterface $transport, TransportLegsInterface $transportlegs, CargoInterface $cargo, CargoTypesInterface $cargo_types, CargoGroupsInterface $cargo_groups, VehicleTypesInterface $vehicle_types){
		
		$this->transport = $transport;//$transport;
        $this->transportlegs = $transportlegs;
        $this->cargo = $cargo;
        $this->cargo_types = $cargo_types;
        $this->cargo_groups = $cargo_groups;
        $this->vehicle_types = $vehicle_types;
		
		$this->filters = array(
			"addOrderRowButtons"=>"addOrderRowButton",
			"setProductName"=>"setProductName"
		);
	
	}
	
	public function register(){
	
	}
	
    
    

    
    function prepareRow($arr){
   
    	$obj = @unserialize($arr['order_row_object']);
    	$transport_id = $obj['transport_id'];
    	$transport = $this->transport->find($transport_id);
    	$transport_legs = $this->transportlegs->getWhere("transport_id", "=", $transport_id);
    	if(is_array($transport_legs) && count($transport_legs)){
    		foreach($transport_legs as $leg){
    			$arr['title'] = date("d M Y H:i", strtotime($leg['transport_leg_start_time']))." ".$leg['transport_leg_start']." to ".$leg['transport_leg_end'];
    		}
    	}
    	
    	return $arr;
    }
    
    public function addOrderRowButton($html){
    	$html .= View::make("TransportersIOView::orderrowbuttons");;
    	
    	return $html;
    }
    
    public function setProductName($html){
    	return "Transporters";
    }
}
