<?php 
namespace Repositories\Contact;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Repositories\\Contact\\ContactInterface', 'Repositories\\Contact\\EloquentContactRepository');
    }
}

