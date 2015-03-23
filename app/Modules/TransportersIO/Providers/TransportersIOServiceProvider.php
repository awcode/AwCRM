<?php namespace AwCRM\Modules\TransportersIO\Providers;

use View;

class TransportersIOServiceProvider extends  \Illuminate\Support\ServiceProvider
{

	
    public function boot()
    {

        
    }

    public function register(){
 		$this->app->bind('AwCRM\\Modules\\TransportersIO\\Repositories\\Transport\\TransportInterface', 'AwCRM\\Modules\\TransportersIO\\Repositories\\Transport\\EloquentTransportRepository');
        $this->app->bind('AwCRM\\Modules\\TransportersIO\\Repositories\\TransportLegs\\TransportLegsInterface', 'AwCRM\\Modules\\TransportersIO\\Repositories\\TransportLegs\\EloquentTransportLegsRepository');
        $this->app->bind('AwCRM\\Modules\\TransportersIO\\Repositories\\Cargo\\CargoInterface', 'AwCRM\\Modules\\TransportersIO\\Repositories\\Cargo\\EloquentCargoRepository');
        $this->app->bind('AwCRM\\Modules\\TransportersIO\\Repositories\\CargoGroups\\CargoGroupsInterface', 'AwCRM\\Modules\\TransportersIO\\Repositories\\CargoGroups\\EloquentCargoGroupsRepository');
        $this->app->bind('AwCRM\\Modules\\TransportersIO\\Repositories\\CargoTypes\\CargoTypesInterface', 'AwCRM\\Modules\\TransportersIO\\Repositories\\CargoTypes\\EloquentCargoTypesRepository');
        $this->app->bind('AwCRM\\Modules\\TransportersIO\\Repositories\\VehicleTypes\\VehicleTypesInterface', 'AwCRM\\Modules\\TransportersIO\\Repositories\\VehicleTypes\\EloquentVehicleTypesRepository');
   		View::addNamespace('TransportersIOView', __DIR__."/../Views/");
   		
		if(file_exists(__DIR__.'/../routes.php')) {
			include __DIR__.'/../routes.php';
		}
		if(is_dir(__DIR__.'/Views')) {
			$this->loadViewsFrom(__DIR__.'/Views', $module);
		}
    }
    
}
