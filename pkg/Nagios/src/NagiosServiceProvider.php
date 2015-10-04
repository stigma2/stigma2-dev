<?php
namespace Stigma\Nagios ;

use Illuminate\Support\ServiceProvider ;

class NagiosServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->app->bind('Stigma\Nagios\Client' ,function(){
            $baseUri = config('nagios.host') ;
            //dd($baseUri) ;
            //$port = config('nagios.port') ;
            return new \Stigma\Nagios\Client($baseUri) ;
        });
    }
}
