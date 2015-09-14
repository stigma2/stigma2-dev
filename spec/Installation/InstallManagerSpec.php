<?php

namespace spec\Stigma\Installation;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InstallManagerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Stigma\Installation\InstallManager');
    }

    public function it_return_install_service_for_databse()
    { 
        $this->getServiceForDatabase()->shouldReturnAnInstanceOf('Stigma\Installation\DatabaseInstallation');
    }
}
