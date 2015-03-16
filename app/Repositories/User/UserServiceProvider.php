<?php 
namespace Repositories\User;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Repositories\\User\\UserInterface', 'Repositories\\User\\EloquentUserRepository');
    }
}

