<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class HostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $hostManager = App::make('Stigma\ObjectManager\HostManager') ;


        $data = [
            'command_name' => 'notify-host-by-email',
        ];

        $hostManager->register($data);


    }
}
