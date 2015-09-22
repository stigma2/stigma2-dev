<?php

namespace spec\Stigma\Installation;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Illuminate\Contracts\Foundation\Application;
use Stigma\Installation\Services\DatabaseInstallation ;
use Stigma\Installation\Services\NagiosInstallation ;

class InstallManagerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Stigma\Installation\InstallManager');
    }

    public function let(Application $app)
    {
        $this->beConstructedWith($app) ;
    }

    public function it_return_databaseInstallation(Application $app,DatabaseInstallation $databaseInstallation)
    { 
        $app->make('Stigma\Installation\Services\DatabaseInstallation')->shouldBeCalled()->willReturn($databaseInstallation) ;

        $this->getDatabaseInstallation()->shouldReturnAnInstanceOf('Stigma\Installation\Services\DatabaseInstallation');
    } 

    public function it_return_nagiosInstallation(Application $app,NagiosInstallation $nagiosInstallation)
    { 
        $app->make('Stigma\Installation\Services\NagiosInstallation')->shouldBeCalled()->willReturn($nagiosInstallation) ;

        $this->getNagiosInstallation()->shouldReturnAnInstanceOf('Stigma\Installation\Services\NagiosInstallation');
    }
}
