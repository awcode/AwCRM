<?php 
namespace Repositories\Log;

use Illuminate\Support\ServiceProvider;

class LogServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Repositories\\Log\\LogInterface', 'Repositories\\Log\\EloquentLogRepository');
    }
}

