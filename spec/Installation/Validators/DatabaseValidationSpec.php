<?php

namespace spec\Stigma\Installation\Validators;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Illuminate\Contracts\Validation\Factory ; 

class DatabaseValidationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Stigma\Installation\Validators\DatabaseValidation');
    }

    public function let(Factory $factory)
    {
        $this->beConstructedWith($factory) ;
    }

    public function it_throw_exception_when_dbuser_is_invalid(Factory $factory)
    {
        $data = array(
            'host' => 'localhost',
            'password' => 'secret', 
            'database' => 'homestead',
            'port' => '3306'
        ); 

        $factory->make($data,['dbuser' => 'required'])->shouldBeCalled();

        $this->validate($data)->shouldReturn(false); 
    }
}
