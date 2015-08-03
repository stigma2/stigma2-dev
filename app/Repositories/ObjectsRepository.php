<?php

namespace App\Repositories;

use App\Interfaces\ObjectsInterface;

use DB;

class ObjectsRepository implements ObjectsInterface
{
    public function lists()
    {
        //
    }

    public function save(array $array)
    {
        DB::table('objects')->insert([
            'uuid' => $array['uuid'],
            'object_type' => $array['object_type'],
            'first_name' => $array['first_name'],
            'second_name' => $array['second_name'],
            'is_active' => $array['is_active'],
        ]);
    }

    public function find($uuid)
    {
        //
    }

    public function modify($uuid)
    {
        //
    }

    public function remove($uuid)
    {
        //
    }
}
