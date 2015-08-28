<?php

namespace App\Repositories;

use App\Interfaces\HostsInterface;

use DB;

class HostsRepository implements HostsInterface
{
    public function lists()
    {
        return DB::table("hosts")
            ->join("objects", "hosts.object_uuid", "=", "objects.uuid")
            ->select("objects.uuid", "hosts.description", "objects.first_name as host_name")
            ->orderBy("hosts.created_at", "desc")
            ->get();
    }

    public function save(array $array)
    {
        DB::table('hosts')->insert([
            'object_uuid' => $array['object_uuid'],
            'description' => $array['description'],
        ]);
    }

    public function find($uuid)
    {
        $hostDetail = DB::table("hosts")
                ->join("objects", "hosts.object_uuid", "=", "objects.uuid")
                ->join("host_details", "hosts.object_uuid", "=", "host_details.host_fk")
                ->select("host_details.key", "host_details.value")
                ->where("hosts.id", "=", $id)
                ->orderBy("host_details.id", "asc")
                ->get();
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
        DB::table('hosts')->delete();
    }
}
