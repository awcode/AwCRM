<?php 
namespace Repositories\Event;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Repositories\\Event\\EventInterface', 'Repositories\\Event\\EloquentEventRepository');
    }
}

