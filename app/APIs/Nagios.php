<?php

namespace App\APIs;

use App\Interfaces\NagiosInterface;

class Nagios implements NagiosInterface
{
    public function listHosts($status)
    {
        // request API call
        $result;

        switch ($status) {
            case '0':
                $result = array(
                    array("host_name" => "node00", "ip" => "127.0.0.1", "status" => "OK", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                    array("host_name" => "node01", "ip" => "127.0.0.1", "status" => "WARNING", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                    array("host_name" => "node02", "ip" => "127.0.0.1", "status" => "UNKNOWN", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                    array("host_name" => "node03", "ip" => "127.0.0.1", "status" => "CRITICAL", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;

            case '1':
                $result = array(
                    array("host_name" => "node00", "ip" => "127.0.0.1", "status" => "OK", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;

            case '2':
                $result = array(
                    array("host_name" => "node01", "ip" => "127.0.0.1", "status" => "WARNING", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;

            case '3':
                $result = array(
                    array("host_name" => "node02", "ip" => "127.0.0.1", "status" => "UNKNOWN", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;

            case '9':
                $result = array(
                    array("host_name" => "node03", "ip" => "127.0.0.1", "status" => "CRITICAL", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;
            
            default:
                $result = array();
                break;
        }

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
            array("status" => "DOWN", "server" => "127.0.0.1", "brick_directory" => "/export/3", 
                "space_used" => "30", "activities" => ""),
            array("status" => "DOWN", "server" => "127.0.0.1", "brick_directory" => "/export/4", 
                "space_used" => "31", "activities" => ""),
            array("status" => "DOWN", "server" => "127.0.0.1", "brick_directory" => "/export/5", 
                "space_used" => "70", "activities" => ""),
            array("status" => "UP", "server" => "127.0.0.1", "brick_directory" => "/export/6", 
                "space_used" => "71", "activities" => ""),
        );

        return $result;
    }
}
