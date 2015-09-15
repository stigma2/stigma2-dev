<?php

namespace spec\Stigma\Installation;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Stigma\Installation\Validators\DatabaseValidation ;

class DatabaseInstallationSpec extends ObjectBehavior
{
    protected $data = array(
        'host' => 'localhost',
        'dbuser' => 'homestead', 
        'password' => 'secret', 
        'database' => 'homestead',
        'port' => '3306'
    );

    function it_is_initializable()
    {
        $this->shouldHaveType('Stigma\Installation\DatabaseInstallation');
    }

    public function let(DatabaseValidation $databaseValidation)
    {
        $this->beConstructedWith($databaseValidation);
    }

    public function it_validate_values(DatabaseValidation $databaseValidation)
    { 
        $databaseValidation->passes($this->data)->shouldBeCalled()->willReturn(true); 
        $this->validate($this->data)->shouldReturn(true);
    }

    public function it_throw_exception_when_parameters_are_invalid(DatabaseValidation $databaseValidation)
    {
        $data = $this->data ;
        unset($data['host']);
        $databaseValidation->passes($data)->shouldBeCalled()->willReturn(false); 
        $this->validate($data)->shouldReturn(false); 

        $data = $this->data ;
        unset($data['dbuser']);
        $databaseValidation->passes($data)->shouldBeCalled()->willReturn(false); 
        $this->validate($data)->shouldReturn(false); 

        $data = $this->data ;
        unset($data['password']);
        $databaseValidation->passes($data)->shouldBeCalled()->willReturn(false); 
        $this->validate($data)->shouldReturn(false); 

        $data = $this->data ;
        unset($data['database']);
        $databaseValidation->passes($data)->shouldBeCalled()->willReturn(false); 
        $this->validate($data)->shouldReturn(false); 
    }
}
