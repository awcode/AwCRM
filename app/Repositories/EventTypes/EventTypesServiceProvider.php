<?php 
namespace Repositories\EventTypes;

use Illuminate\Support\ServiceProvider;

class EventTypesServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Repositories\\EventTypes\\EventTypesInterface', 'Repositories\\EventTypes\\EloquentEventTypesRepository');
    }
}

