<?php

namespace App\Repositories;

use App\Interfaces\HostDetailsInterface;

use DB;

class HostDetailsRepository implements HostDetailsInterface
{
    public function lists()
    {
        return array(
                array("host_name" => "host 1"),
                array("host_name" => "host 2"),
                array("host_name" => "host 3"),
                array("host_name" => "host 4"),
                array("host_name" => "host 5"),
                array("host_name" => "host 6"),
            );
    }

    public function save(array $array)
    {
        DB::table('host_details')->insert([
            'host_fk' => $array['host_fk'],
            'key' => $array['key'],
            'value' => $array['value'],
        ]);
    }

    public function find($uuid)
    {
        //
    }

    public function update(array $array, $uuid)
    {
        //
    }

    public function remove($uuid)
    {
        //
    }

    public function removeAll()
    {
        DB::table('host_details')->delete();
    }
}
