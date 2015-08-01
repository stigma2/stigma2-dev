<?php

namespace Shlee\Signature;

use Illuminate\Support\ServiceProvider;

use Shlee\Signature\Signature;

class SignatureServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->singleton('Shlee\Signature\Signature', function ($app) {
        //     return new Signature();
        // });
    }
}
