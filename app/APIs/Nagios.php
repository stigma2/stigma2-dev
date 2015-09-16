<?php

namespace App\APIs;

use App\Interfaces\NagiosInterface;

class Nagios implements NagiosInterface
{
    public function listHosts($status)
    {
        $username = env("NAGIOS_USERNAME");
        $password = env("NAGIOS_PASSWORD");

        $domain = env("NAGIOS_DOMAIN");
        $command = "/nagios/cgi-bin/objectjson.cgi?query=host";
        $url = $domain.$command;

        $port = "9090";
        $timeout = "3";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_PORT, $port);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_COOKIE, "");
        curl_setopt($ch, CURLOPT_USERPWD, $username.":".$password);
        // curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750");
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        $data = curl_exec($ch);

        $curl_errno = curl_errno($ch);
        $curl_error = curl_error($ch);

        return $data;



        // $result;

        // switch ($status) {
        //     case '0':
        //         $result = array(
        //             array("host_name" => "node00", "ip" => "127.0.0.1", "status" => "Up", 
        //                 "cpu" => "1", "memory" => "20", "network" => "4"),
        //         );
        //         break;

        //     case '1':
        //         $result = array(
        //             array("host_name" => "node01", "ip" => "127.0.0.1", "status" => "Down", 
        //                 "cpu" => "1", "memory" => "20", "network" => "4"),
        //         );
        //         break;

        //     case '2':
        //         $result = array(
        //             array("host_name" => "node02", "ip" => "127.0.0.1", "status" => "Unreachable", 
        //                 "cpu" => "1", "memory" => "20", "network" => "4"),
        //         );
        //         break;

        //     case '9':
        //         $result = array(
        //             array("host_name" => "node03", "ip" => "127.0.0.1", "status" => "Pending", 
        //                 "cpu" => "1", "memory" => "20", "network" => "4"),
        //         );
        //         break;
            
        //     default:
        //         $result = array(
        //             array("host_name" => "node00", "ip" => "127.0.0.1", "status" => "Up", 
        //                 "cpu" => "1", "memory" => "20", "network" => "4"),
        //             array("host_name" => "node01", "ip" => "127.0.0.1", "status" => "Down", 
        //                 "cpu" => "1", "memory" => "20", "network" => "4"),
        //             array("host_name" => "node02", "ip" => "127.0.0.1", "status" => "Unreachable", 
        //                 "cpu" => "1", "memory" => "20", "network" => "4"),
        //             array("host_name" => "node03", "ip" => "127.0.0.1", "status" => "Pending", 
        //                 "cpu" => "1", "memory" => "20", "network" => "4"),
        //         );
        //         break;
        // }

        // return $result;
    }

    public function showHost($host_name)
    {
        $result = array(
            "Host Name" => $host_name,
            "Host Status" => "UP (for 69d 14h 26m 21s)",
            "Status Information" => "PING OK - Packet loss = 0%, RTA = 0.35 ms",
            "Performance Data" => "rta=0.355000ms;3000.000000;5000.000000;0.000000 pl=0%;80;100;0",
            "Current Attempt" => "1/10  (HARD state)",
            "Last Check Time" => "09-07-2015 16:27:04",
            "Check Type" => "ACTIVE",
            "Check Latency / Duration" => "0.000 / 4.004 seconds",
            "Next Scheduled Active Check" => "09-07-2015 16:32:08",
            "Last State Change" => "06-30-2015 02:03:42",
            "Last Notification" => "N/A (notification 0)",
            "Is This Host Flapping?" => "NO (0.00% state change)",
            "In Scheduled Downtime?" => "NO",
            "Last Update" => "09-07-2015 16:29:59  ( 0d 0h 0m 4s ago)",
        );

        return $result;
    }

    public function listServices($status)
    {
        // request API call
        $result = array();

        switch ($status) {
            case '0':
                $result = array(
                    array("host_name" => "node00", "service_name" => "Ping", "ip" => "127.0.0.1", "status" => "OK", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;

            case '1':
                $result = array(
                    array("host_name" => "node01", "service_name" => "Ping", "ip" => "127.0.0.1", "status" => "Warning", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;

            case '2':
                $result = array(
                    array("host_name" => "node02", "service_name" => "Ping", "ip" => "127.0.0.1", "status" => "Unknown", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;

            case '3':
                $result = array(
                    array("host_name" => "node03", "service_name" => "Ping", "ip" => "127.0.0.1", "status" => "Critical", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;

            case '9':
                $result = array(
                    array("host_name" => "node04", "service_name" => "Ping", "ip" => "127.0.0.1", "status" => "Pending", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;
            
            default:
                $result = array(
                    array("host_name" => "node00", "service_name" => "Ping", "ip" => "127.0.0.1", "status" => "OK", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                    array("host_name" => "node01", "service_name" => "Ping", "ip" => "127.0.0.1", "status" => "Warning", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                    array("host_name" => "node02", "service_name" => "Ping", "ip" => "127.0.0.1", "status" => "Unknown", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                    array("host_name" => "node03", "service_name" => "Ping", "ip" => "127.0.0.1", "status" => "Critical", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                    array("host_name" => "node04", "service_name" => "Ping", "ip" => "127.0.0.1", "status" => "Pending", 
                        "cpu" => "1", "memory" => "20", "network" => "4"),
                );
                break;
        }

        return $result;
    }

    public function showService($host_name)
    {
        $result = array(
            "Host Name" => $host_name,
            "Current Status" => "OK (for 70d 12h 0m 21s)",
            "Status Information" => "PING OK - Packet loss = 0%, RTA = 0.35 ms",
            "Performance Data" => "rta=0.355000ms;3000.000000;5000.000000;0.000000 pl=0%;80;100;0",
            "Current Attempt" => "1/3  (HARD state)",
            "Last Check Time" => "09-08-2015 16:27:04",
            "Check Type" => "ACTIVE",
            "Check Latency / Duration" => "0.000 / 4.004 seconds",
            "Next Scheduled Check" => "09-07-2015 16:32:08",
            "Last State Change" => "06-30-2015 02:03:42",
            "Last Notification" => "N/A (notification 0)",
            "Is This Service Flapping?" => "NO (0.00% state change)",
            "In Scheduled Downtime?" => "NO",
            "Last Update" => "09-07-2015 16:29:59  ( 0d 0h 0m 4s ago)",
        );

        return $result;
    }
}
