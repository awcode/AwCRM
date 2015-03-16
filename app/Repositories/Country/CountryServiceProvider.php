<?php 
namespace Repositories\Country;

use Illuminate\Support\ServiceProvider;

class CountryServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Repositories\\Country\\CountryInterface', 'Repositories\\Country\\EloquentCountryRepository');
    }
}

