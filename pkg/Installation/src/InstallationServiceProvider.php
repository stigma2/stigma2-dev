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
        $this->app->bind('Stigma\Installation\Generators\DatabaseFileGenerator', function(){
            return new \Stigma\Installation\Generators\DatabaseFileGenerator(
                __DIR__.'/tmpl/database.php', 
                config_path().'/database.php') ;
        }) ;

        $this->app->bind('Stigma\Installation\Services\DatabaseInstallation',function(){
            return new \Stigma\Installation\Services\DatabaseInstallation(
                \App::make('Stigma\Installation\Validators\DatabaseValidation'),
                \App::make('Stigma\Installation\Generators\DatabaseFileGenerator') 
            );
        });
    }
}
