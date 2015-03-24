<?php namespace AwCore\Modules\Orders\Providers;

use View;

class OrdersServiceProvider extends  \Illuminate\Support\ServiceProvider
{

	
    public function boot()
    {

        
    }

    public function register(){
 		$this->app->bind('AwCore\\Modules\\Orders\\Repositories\\Orders\\OrdersInterface', 'AwCore\\Modules\\Orders\\Repositories\\Orders\\EloquentOrdersRepository');
 		$this->app->bind('AwCore\\Modules\\Orders\\Repositories\\OrderRows\\OrderRowsInterface', 'AwCore\\Modules\\Orders\\Repositories\\OrderRows\\EloquentOrderRowsRepository');
   		View::addNamespace('OrdersView', __DIR__."/../Views/");
   		View::addNamespace('OrderRowsView', __DIR__."/../Views/OrderRows/");
   		
		if(file_exists(__DIR__.'/../routes.php')) {
			include __DIR__.'/../routes.php';
		}
		if(is_dir(__DIR__.'/../Views')) {
			//$this->loadViewsFrom(__DIR__.'/../Views', $module);
		}
    }
    
}
