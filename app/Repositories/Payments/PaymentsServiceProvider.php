<?php 
namespace Repositories\Payments;

use Illuminate\Support\ServiceProvider;

class PaymentsServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Repositories\\Payments\\PaymentsInterface', 'Repositories\\Payments\\EloquentPaymentsRepository');
    }
}

