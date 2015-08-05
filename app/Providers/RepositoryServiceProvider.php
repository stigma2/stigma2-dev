<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    private $repositories = array(
        'App\Interfaces\ObjectsInterface' => 'App\Repositories\ObjectsRepository',
        'App\Interfaces\CommandsInterface' => 'App\Repositories\CommandsRepository',
        'App\Interfaces\HostsInterface' => 'App\Repositories\HostsRepository',
        'App\Interfaces\HostDetailsInterface' => 'App\Repositories\HostDetailsRepository',
    );

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $repository) {
            $this->registerRepository($interface, $repository);
        }
    }

    /**
     * Register the repositories.
     *
     * @return void
     */
    private function registerRepository($interface, $repository)
    {
        $this->app->bind($interface, $repository);
    }
}
