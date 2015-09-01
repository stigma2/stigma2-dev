<?php

namespace App\Repositories;

use App\Interfaces\HostDetailsInterface;

use DB;

class HostDetailsRepository implements HostDetailsInterface
{
    public function lists()
    {
        //
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
        DB::table('host_details')->where('host_fk', '=', $uuid)->delete();
    }

    public function removeAll()
    {
        DB::table('host_details')->delete();
    }
}
