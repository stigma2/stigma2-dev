<?php 
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

        $installManager = App::make('Stigma\Installation\InstallManager');
        $databaseInstallation = $installManager->getDatabaseInstallation() ;

        $this->specify("required parameters are valid",function() use($databaseInstallation, $data){
            $this->assertTrue($databaseInstallation->setup($data)) ;
        }); 

        $this->specify("when host field is invalid",function() use($databaseInstallation, $data){
            $tmpData = $data ;
            unset($tmpData['host']);
            $this->assertFalse($databaseInstallation->setup($tmpData)) ;
        }); 
    }
}
