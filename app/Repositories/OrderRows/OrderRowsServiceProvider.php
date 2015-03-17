<?php 
namespace Repositories\OrderRows;

use Illuminate\Support\ServiceProvider;

class OrderRowsServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Repositories\\OrderRows\\OrderRowsInterface', 'Repositories\\OrderRows\\EloquentOrderRowsRepository');
    }
}

