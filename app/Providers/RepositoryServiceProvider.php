<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Command;
use App\Repositories\CommandRepository;

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
        $this->app->bind('App\Repositories\CommandRepository', function()
        {
            $command = new Command();

            return new CommandRepository($command);
        });
    }
}
