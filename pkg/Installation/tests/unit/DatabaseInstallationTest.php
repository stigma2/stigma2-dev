<?php
namespace Stigma\Installation;


class DatabaseInstallationTest extends \Codeception\TestCase\Test
{
    use \Codeception\Specify;
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

        $this->specify("required parameters are valid",function() use($databaseInstallation, $data){
            $this->assertTrue($databaseInstallation->setup($data)) ;
        }); 

        $this->specify("when host field is invalid",function() use($databaseInstallation, $data){
            $tmpData = $data ;
            unset($tmpData['host']);
            $this->assertFalse($databaseInstallation->setup($tmpData)) ;
        }); 

        $this->specify("when dbuser field is invalid",function() use($databaseInstallation, $data){
            $tmpData = $data ;
            unset($tmpData['dbuser']);
            $this->assertFalse($databaseInstallation->setup($tmpData)) ;
        }); 

        $this->specify("when port field is invalid",function() use($databaseInstallation, $data){
            $tmpData = $data ;
            unset($tmpData['port']);
            $this->assertFalse($databaseInstallation->setup($tmpData)) ;
        }); 

        $this->specify("when password field is invalid",function() use($databaseInstallation, $data){
            $tmpData = $data ;
            unset($tmpData['password']);
            $this->assertFalse($databaseInstallation->setup($tmpData)) ;
        }); 

        $this->specify("when database field is invalid",function() use($databaseInstallation, $data){
            $tmpData = $data ;
            unset($tmpData['database']);
            $this->assertFalse($databaseInstallation->setup($tmpData)) ;
        }); 

    }
}
