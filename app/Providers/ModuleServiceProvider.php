<?php namespace AwCore\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use HTML;

use AwCore\Modules\Transportersio\Repositories\TransportLegs\TransportLegsInterface as TransportLegsInterface ;
use AwCore\Modules\Transportersio\Repositories\Cargo\CargoInterface as CargoInterface ;
use AwCore\Modules\Transportersio\Repositories\CargoTypes\CargoTypesInterface as CargoTypesInterface ;
use AwCore\Modules\Transportersio\Repositories\CargoGroups\CargoGroupsInterface as CargoGroupsInterface ;
use AwCore\Modules\Transportersio\Repositories\VehicleTypes\VehicleTypesInterface as VehicleTypesInterface ;

class Transportersio extends ServiceProvider{

	public function queueScript($name, $src){
		//[[TODO - Lots of extra functionality can be added here, for styles too]]
		global $AWCORE_LOAD_SCRIPTS;
		
		$AWCORE_LOAD_SCRIPTS[$name]['src'] = $src;
		
	}
}