<?php 
namespace Repositories\Address;

use Illuminate\Support\ServiceProvider;

class AddressServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Repositories\\Address\\AddressInterface', 'Repositories\\Address\\EloquentAddressRepository');
    }
}

