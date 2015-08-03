<?php

namespace App\Repositories;

use App\Interfaces\CommandsInterface;

use DB;

class CommandsRepository implements CommandsInterface
{
    public function lists()
    {
        return DB::table("commands")
            ->join("objects", "commands.object_uuid", "=", "objects.uuid")
            ->select("commands.id", "objects.first_name as command_name", "commands.command_line")
            ->orderBy("commands.created_at", "desc")
            ->get();
    }

    public function save(array $array)
    {
        DB::table('commands')->insert([
            'object_uuid' => $array['object_uuid'],
            'command_line' => $array['command_line'],
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
