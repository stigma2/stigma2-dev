<?php
namespace Stigma\Nagios;
use Stigma\Nagios\UnitTester;

use Stigma\Nagios\Client ;

class ClientCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    // tests
    public function testToGenerateCommand(UnitTester $I)
    {
        $client = new Client ; 
        
        $data = [] ;
        $response = $client->generateCommand($data) ; 

        $I->assertEquals('200',$response) ;
        
    }

    public function testToRestart(UnitTester $I)
    {
        //'http://106.243.134.121:20280/nagios_dev/api/v1/nagios?command=restart' ;

        $client = new Client ; 
        
        $ret = $client->requestToRestart() ;

        $I->assertTrue(true,$ret) ;
    }
}
