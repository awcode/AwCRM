<?php namespace AwCore\Modules\TransportersIO\Providers;

use View;

class TransportersIOServiceProvider extends  \Illuminate\Support\ServiceProvider
{

	
    public function boot()
    {

        
    }

    public function register(){
 		$this->app->bind('AwCore\\Modules\\TransportersIO\\Repositories\\Transport\\TransportInterface', 'AwCore\\Modules\\TransportersIO\\Repositories\\Transport\\EloquentTransportRepository');
        $this->app->bind('AwCore\\Modules\\TransportersIO\\Repositories\\TransportLegs\\TransportLegsInterface', 'AwCore\\Modules\\TransportersIO\\Repositories\\TransportLegs\\EloquentTransportLegsRepository');
        $this->app->bind('AwCore\\Modules\\TransportersIO\\Repositories\\Cargo\\CargoInterface', 'AwCore\\Modules\\TransportersIO\\Repositories\\Cargo\\EloquentCargoRepository');
        $this->app->bind('AwCore\\Modules\\TransportersIO\\Repositories\\CargoGroups\\CargoGroupsInterface', 'AwCore\\Modules\\TransportersIO\\Repositories\\CargoGroups\\EloquentCargoGroupsRepository');
        $this->app->bind('AwCore\\Modules\\TransportersIO\\Repositories\\CargoTypes\\CargoTypesInterface', 'AwCore\\Modules\\TransportersIO\\Repositories\\CargoTypes\\EloquentCargoTypesRepository');
        $this->app->bind('AwCore\\Modules\\TransportersIO\\Repositories\\VehicleTypes\\VehicleTypesInterface', 'AwCore\\Modules\\TransportersIO\\Repositories\\VehicleTypes\\EloquentVehicleTypesRepository');
   		View::addNamespace('TransportersIOView', __DIR__."/../Views/");
   		
		if(file_exists(__DIR__.'/../routes.php')) {
			include __DIR__.'/../routes.php';
		}
		if(is_dir(__DIR__.'/Views')) {
			$this->loadViewsFrom(__DIR__.'/Views', $module);
		}
    }
    
}
