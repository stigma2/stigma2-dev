<?php
namespace Stigma\Installation; 
use Stigma\Installation\Validators\DatabaseConnectionValidation ;

class DatabaseConnectionValidationTest extends \Codeception\TestCase\Test
{
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
    public function testValidateConnection()
    { 
        $data = [
            'host'=> 'localhost',
            'dbuser'=> 'homestead', 
            'password'=>'secret',
            'port'=>'3306', 
            'database'=> 'stigma'
        ];

        $dbConnectionValidation = new DatabaseConnectionValidation;
        $this->assertTrue($dbConnectionValidation->passes($data));


    } 
}
