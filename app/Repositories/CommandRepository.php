<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;

/**
 * Command repository.
 */
class CommandRepository implements RepositoryInterface
{
    public function lists()
    {
        return array(
                array("command_name" => "command 1", "command_line" => "check_ping"),
                array("command_name" => "command 2", "command_line" => "check_ping"),
                array("command_name" => "command 3", "command_line" => "check_ping"),
                array("command_name" => "command 4", "command_line" => "check_ping"),
                array("command_name" => "command 5", "command_line" => "check_ping"),
                array("command_name" => "command 6", "command_line" => "check_ping"),
            );
    }

    public function save()
    {
        //
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
