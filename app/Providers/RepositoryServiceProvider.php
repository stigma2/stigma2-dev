<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommandRepository();
    }

    /**
     * Register the Command repository.
     *
     * @return void
     */
    private function registerCommandRepository()
    {
        // $repository = 'App\Repositories\CommandRepository';
 
        // $this->app->bind('App\Interfaces\RepositoryInterface', $repository);

        // $this->app->bind('App\Interfaces\RepositoryInterface', function()
        // {
        //     return new CommandRepository();
        // });
    }
}
