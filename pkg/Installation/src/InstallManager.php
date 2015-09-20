<?php

namespace Stigma\Installation;

use Illuminate\Contracts\Foundation\Application;

class InstallManager
{
    protected $app ; 

    public function __construct(Application $app)
    {
        $this->app = $app ;
    }

    public function getDatabaseInstallation()
    {
        return $this->app->make('Stigma\Installation\Services\DatabaseInstallation');
    }

    public function getNagiosInstallation()
    {
        return $this->app->make('Stigma\Installation\Services\NagiosInstallation');
    }

}
