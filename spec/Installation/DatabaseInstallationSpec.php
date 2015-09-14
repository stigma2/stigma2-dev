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
        //$databaseValidation->validate($this->data)->shouldBeCalled(); 
        $this->validate($this->data)->shouldReturn(true);
    }

    public function it_throw_exception_when_host_is_invalid()
    {
        $data = $this->data ;
        unset($data['host']);
        $this->validate($data)->shouldReturn(false); 
    }

    public function it_throw_exception_when_dbuser_is_invalid()
    { 
        $data = $this->data ;
        unset($data['dbuser']);
        $this->validate($data)->shouldReturn(false); 
    }

    public function it_throw_exception_when_password_is_invalid()
    {
        $data = $this->data ;
        unset($data['password']);
        $this->validate($data)->shouldReturn(false); 
    }

    public function it_throw_exception_when_database_is_invalid()
    {
        $data = $this->data ;
        unset($data['database']);
        $this->validate($data)->shouldReturn(false); 
    }
}
