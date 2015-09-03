<?php

namespace App\APIs;

use App\Interfaces\NagiosInterface;

class Nagios implements NagiosInterface
{
    public function listHosts()
    {
        // request API call
        $result = array(
            array("name" => "node00", "ip" => "127.0.0.1", "status" => "OK", 
                "cpu" => "1", "memory" => "20", "network" => "4"),
            array("name" => "node01", "ip" => "127.0.0.1", "status" => "OK", 
                "cpu" => "1", "memory" => "20", "network" => "4"),
            array("name" => "node02", "ip" => "127.0.0.1", "status" => "OK", 
                "cpu" => "1", "memory" => "20", "network" => "4"),
            array("name" => "node03", "ip" => "127.0.0.1", "status" => "OK", 
                "cpu" => "1", "memory" => "20", "network" => "4"),
        );

        return $result;
    }

    public function listServices()
    {
        // request API call
        $result = array(
            array("status" => "UP", "server" => "127.0.0.1", "brick_directory" => "/export/1", 
                "space_used" => "20", "activities" => ""),
            array("status" => "UP", "server" => "127.0.0.1", "brick_directory" => "/export/2", 
                "space_used" => "29", "activities" => ""),
            array("status" => "UP", "server" => "127.0.0.1", "brick_directory" => "/export/3", 
                "space_used" => "30", "activities" => ""),
            array("status" => "UP", "server" => "127.0.0.1", "brick_directory" => "/export/4", 
                "space_used" => "31", "activities" => ""),
            array("status" => "UP", "server" => "127.0.0.1", "brick_directory" => "/export/5", 
                "space_used" => "70", "activities" => ""),
            array("status" => "UP", "server" => "127.0.0.1", "brick_directory" => "/export/6", 
                "space_used" => "71", "activities" => ""),
        );

        return $result;
    }
}
