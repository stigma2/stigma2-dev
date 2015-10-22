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

    // tests
    public function tryToTest(UnitTester $I)
    {
        $provisionManager = new ProvisionManager() ;

        $key = 'AKIAJAMWCMCCNYWUGDIQ' ;
        $secret = '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' ; 
        $region = 'ap-northeast-1' ;

        $provisionManager->provisionNagiosEnv(compact('key', 'secret' , 'region')) ;
    }
}
