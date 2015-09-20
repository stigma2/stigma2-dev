<?php
namespace Stigma\Installation;


class NagiosInstallationTest extends \Codeception\TestCase\Test
{
    use \Codeception\Specify;
    /**
     * @var \Stigma\Installation\UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testValidation()
    { 
        /*
        $installManager = \App::make('Stigma\Installation\InstallManager');
        $nagiosInstallation = $installManager->getNagiosInstallation() ; 

        $data = [
            'host' => 'localhost' , 
            'port' => '80', 
            'user' => 'nagios',
            'password' => 'password' 
        ];

        $this->specify("required paramters are valid",function() use($data, $nagiosInstallation){ 
            $this->assertTrue($this->setup($data)) ;
        });*/
    }
}
