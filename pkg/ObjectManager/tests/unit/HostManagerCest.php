<?php
namespace Stigma\ObjectManager;
use Stigma\ObjectManager\UnitTester;

class HostManagerCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    // tests
    public function testToRegister(UnitTester $I)
    {
        $data = [
            'host_name' => 'localhost' , 
            'description' => 'localhost-desc' ,
            'template_name' => 'localhost_tmpl' , 
            'alias' => 'localhost_alias' ,
            'is_template' => 'N' ,
            'address' => '127.0.0.1' ,
            'data' => '' 
            ];

        $hostManager = \App::make('Stigma\ObjectManager\HostManager') ;
        $ret = $hostManager->register($data) ;

        $I->assertEquals($data['host_name'] , $ret->host_name) ;
        $I->assertEquals($data['description'] , $ret->description) ;
        $I->assertEquals($data['template_name'] , $ret->template_name) ;
        $I->assertEquals($data['alias'] , $ret->alias) ;
        $I->assertEquals($data['address'] , $ret->address) ;
        $I->assertEquals($data['is_template'] , $ret->is_template) ;
        $I->assertEquals($data['data'] , $ret->data) ;

        $I->seeRecord('hosts',array('host_name' => $data['host_name'])) ;
    }
}
