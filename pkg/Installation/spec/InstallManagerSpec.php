<?php

namespace spec\Stigma\Installation;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Illuminate\Contracts\Foundation\Application;
use Stigma\Installation\DatabaseInstallation ;

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

    public function it_return_install_service_for_databse(Application $app,DatabaseInstallation $databaseInstallation)
    { 
        $app->make('Stigma\Installation\DatabaseInstallation')->shouldBeCalled()->willReturn($databaseInstallation) ;

        $this->getServiceForDatabase()->shouldReturnAnInstanceOf('Stigma\Installation\DatabaseInstallation');
    }

    public function it_hello()
    {
        $this->hello() ;
    }
}
