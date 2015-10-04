<?php
namespace Stigma\CommandBuilder;
use Stigma\CommandBuilder\UnitTester;
use Stigma\CommandBuilder\CommandBuilder ;
use Stigma\CommandBuilder\Repositories\CommandRepository ;

class CommandBuilderCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    // tests
    public function testToMakeCommand(UnitTester $I)
    {
        $data = [
            'command_name' => 'hello' ,
            'command_line' => 'command_line'
            ];

        $I->wantTo('make a command') ;
        $commandBuilder = \App::make('Stigma\CommandBuilder\CommandBuilder') ;
        $ret = $commandBuilder->make($data) ;

        $I->assertEquals($data['command_name'],$ret->command_name) ;
        $I->assertEquals($data['command_line'],$ret->command_line) ; 
        $I->seeRecord('commands',array(
            'command_name' => $data['command_name'], 'command_line' => $data['command_line']
        ));
    }
}
