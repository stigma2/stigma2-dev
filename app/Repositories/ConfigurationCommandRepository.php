<?php

namespace App\Repositories;

use App\Interfaces\ConfigurationCommandInterface;

use DB;

/**
 * Command repository.
 */
class ConfigurationCommandRepository implements ConfigurationCommandInterface
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
            'command_line' => $array['command_line']
        ]);

        // $this->command->object_uuid = $array['object_uuid'];
        // $this->command->command_line = $array['command_line'];
        
        // $this->command->save();
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
