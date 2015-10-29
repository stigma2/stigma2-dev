<?php
namespace Stigma\Provision;
use Stigma\Provision\UnitTester;
use Stigma\Provision\ProvisionManager ;

class ProvisionManagerCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

   
    public function testToProvision(UnitTester $I)
    {
        $provisionManager = \App::make('Stigma\Provision\ProvisionManager') ;

        $apikey = 'AKIAJAMWCMCCNYWUGDIQ' ;
        $secret = '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' ; 
        $region = 'ap-northeast-1' ;

        $provisionManager->provisionNagiosEnv(compact('apikey', 'secret' , 'region')) ;
    }
    

    public function testToSetup(UnitTester $I)
    { 
        $provisionManager = \App::make('Stigma\Provision\ProvisionManager') ;
        $data = array(
            'apikey' => '123' , 
            'secret' => 'secret'
        );

        $provisionManager->setup($data) ;

        $I->assertFileExists(config_path().'/provisioning.php') ; 
    }
}
