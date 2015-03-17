<?php 
namespace Repositories\PaymentAllocation;

use Illuminate\Support\ServiceProvider;

class PaymentAllocationServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Repositories\\PaymentAllocation\\PaymentAllocationInterface', 'Repositories\\PaymentAllocation\\EloquentPaymentAllocationRepository');
    }
}

