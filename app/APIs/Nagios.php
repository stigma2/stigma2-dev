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
                    array("host_name" => "node00", "ip" => "127.0.0.1", "status" => "Up", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;

            case '1':
                $result = array(
                    array("host_name" => "node01", "ip" => "127.0.0.1", "status" => "Down", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;

            case '2':
                $result = array(
                    array("host_name" => "node02", "ip" => "127.0.0.1", "status" => "Unreachable", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;

            case '9':
                $result = array(
                    array("host_name" => "node03", "ip" => "127.0.0.1", "status" => "Pending", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;
            
            default:
                $result = array(
                    array("host_name" => "node00", "ip" => "127.0.0.1", "status" => "Up", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                    array("host_name" => "node01", "ip" => "127.0.0.1", "status" => "Down", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                    array("host_name" => "node02", "ip" => "127.0.0.1", "status" => "Unreachable", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                    array("host_name" => "node03", "ip" => "127.0.0.1", "status" => "Pending", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;
        }

        return $result;
    }

    public function listServices($status)
    {
        // request API call
        $result = array();

        switch ($status) {
            case '0':
                $result = array(
                    array("host_name" => "node00", "ip" => "127.0.0.1", "status" => "OK", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;

            case '1':
                $result = array(
                    array("host_name" => "node01", "ip" => "127.0.0.1", "status" => "Warning", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;

            case '2':
                $result = array(
                    array("host_name" => "node02", "ip" => "127.0.0.1", "status" => "Unknown", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;

            case '3':
                $result = array(
                    array("host_name" => "node03", "ip" => "127.0.0.1", "status" => "Critical", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;

            case '9':
                $result = array(
                    array("host_name" => "node04", "ip" => "127.0.0.1", "status" => "Pending", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;
            
            default:
                $result = array(
                    array("host_name" => "node00", "ip" => "127.0.0.1", "status" => "OK", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                    array("host_name" => "node01", "ip" => "127.0.0.1", "status" => "Warning", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                    array("host_name" => "node02", "ip" => "127.0.0.1", "status" => "Unknown", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                    array("host_name" => "node03", "ip" => "127.0.0.1", "status" => "Critical", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                    array("host_name" => "node04", "ip" => "127.0.0.1", "status" => "Pending", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;
        }

        return $result;
    }
}
