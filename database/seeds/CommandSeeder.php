<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CommandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $commandBuilder = App::make('Stigma\CommandBuilder\CommandBuilder') ; 

        $data = [
            'command_name' => '123' ,
            'command_line'=> '567'
           ] ; 

        $commandBuilder->make($data); 
    }
}
