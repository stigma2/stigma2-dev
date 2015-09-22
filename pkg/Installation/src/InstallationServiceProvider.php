<?php
namespace Stigma\Installation ;

use Illuminate\Support\ServiceProvider;
use Stigma\Installation\Validators\DatabaseValidation ;
use Stigma\Installation\Generators\DatabaseFileGenerator ;

class InstallationServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->registerDatabaseInstallation();
        $this->registerNagiosInstallation(); 
    }

    private function registerNagiosInstallation()
    {
        $this->app->bind('Stigma\Installation\Generators\NagiosFileGenerator', function(){
            return new \Stigma\Installation\Generators\NagiosFileGenerator(
                __DIR__.'/tmpl/nagios.php', 
                config_path().'/nagios.php') ;
        }) ;


        $this->app->bind('Stigma\Installation\Services\NagiosInstallation',function(){
            return new \Stigma\Installation\Services\NagiosInstallation(
                [
                    \App::make('Stigma\Installation\Validators\NagiosParameterValidation'), 
                ],
                \App::make('Stigma\Installation\Generators\NagiosFileGenerator') 
            );
        });

    }

    private function registerDatabaseInstallation()
    {
        $this->app->bind('Stigma\Installation\Generators\DatabaseFileGenerator', function(){
            return new \Stigma\Installation\Generators\DatabaseFileGenerator(
                __DIR__.'/tmpl/database.php', 
                config_path().'/database.php') ;
        }) ;

        $this->app->bind('Stigma\Installation\Services\DatabaseInstallation',function(){
            return new \Stigma\Installation\Services\DatabaseInstallation(
                [
                    \App::make('Stigma\Installation\Validators\DatabaseValidation'), 
                    \App::make('Stigma\Installation\Validators\DatabaseConnectionValidation')
                ],
                \App::make('Stigma\Installation\Generators\DatabaseFileGenerator') 
            );
        });

    }
}
