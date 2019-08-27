<?php

namespace AnthonyLajusticia\Expirable;

use AnthonyLajusticia\Expirable\Macros\BlueprintMacros;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class ExpirableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Merge default config
        $this->mergeConfigFrom(
            __DIR__.'/../config/expirable.php', 'expirable'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config
        $this->publishes([
            __DIR__.'/../config/expirable.php' => config_path('expirable.php'),
        ], 'config');

        // Register macros
        Blueprint::mixin(new BlueprintMacros);
    }
}
