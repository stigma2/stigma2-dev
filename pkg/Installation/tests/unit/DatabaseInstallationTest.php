<?php
namespace Stigma\Installation;


class DatabaseInstallationTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
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
        $data = [
            'host'=> 'localhost',
            'dbuser'=> 'homestead', 
            'password'=>'secret',
            'port'=>'3306', 
            'database'=> 'stigma'
        ];

        $installManager = \App::make('Stigma\Installation\InstallManager');
        $databaseInstallation = $installManager->getDatabaseInstallation() ;

        $this->assertTrue($databaseInstallation->setup($data)) ;

        $tmpData = $data ;
        unset($tmpData['host']);
        $this->assertFalse($databaseInstallation->setup($tmpData)) ;

        $tmpData = $data ;
        unset($tmpData['dbuser']);
        $this->assertFalse($databaseInstallation->setup($tmpData)) ;

        $tmpData = $data ;
        unset($tmpData['port']);
        $this->assertFalse($databaseInstallation->setup($tmpData)) ;

        $tmpData = $data ;
        unset($tmpData['password']);
        $this->assertFalse($databaseInstallation->setup($tmpData)) ;

        $tmpData = $data ;
        unset($tmpData['database']);
        $this->assertFalse($databaseInstallation->setup($tmpData)) ;
    }

    public function testGenereationConfiguration()
    {   
        $installManager = \App::make('Stigma\Installation\InstallManager');
        $databaseInstallation = $installManager->getDatabaseInstallation() ;

        $data = [
            'host'=> 'localhost',
            'dbuser'=> 'homestead', 
            'password'=>'secret',
            'port'=>'3306', 
            'database'=> 'stigma'
        ];
        $this->setup($data) ;
    }
}
