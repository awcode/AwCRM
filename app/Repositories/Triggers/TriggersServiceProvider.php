<?php 
namespace Repositories\Triggers;

use Illuminate\Support\ServiceProvider;

class TriggersServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Repositories\\Triggers\\TriggersInterface', 'Repositories\\Triggers\\EloquentTriggersRepository');
    }
}

