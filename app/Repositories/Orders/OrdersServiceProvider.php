<?php 
namespace Repositories\Orders;

use Illuminate\Support\ServiceProvider;

class OrdersServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Repositories\\Orders\\OrdersInterface', 'Repositories\\Orders\\EloquentOrdersRepository');
    }
}

