<?php 
namespace Repositories\ConfigSettings;

use Illuminate\Support\ServiceProvider;

class ConfigSettingsServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Repositories\\ConfigSettings\\ConfigSettingsInterface', 'Repositories\\ConfigSettings\\EloquentConfigSettingsRepository');
    }
}

