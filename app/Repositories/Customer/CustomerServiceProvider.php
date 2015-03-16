<?php 
namespace Repositories\Customer;

use Illuminate\Support\ServiceProvider;

class CustomerServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Repositories\\Customer\\CustomerInterface', 'Repositories\\Customer\\EloquentCustomerRepository');
    }
}

