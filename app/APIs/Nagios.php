<?php

namespace App\APIs;

use App\Interfaces\NagiosInterface;

class Nagios implements NagiosInterface
{
    private $_host_status = array("0" => "up", "1" => "down", "2" => "unreachable", "9" => "pending");
    private $_service_status = array("0" => "ok", "1" => "warning", "2" => "critical", "3" => "unknown", "9" => "pending");

    public function listHosts($status)
    {
        $command = "/nagios_dev/api/listHosts";
        // $command = "/nagios/cgi-bin/statusjson.cgi?query=hostlist&details=true";
        if (isset($this->_host_status[$status])) {
            // $command = "/nagios/cgi-bin/statusjson.cgi?query=hostlist&details=true&hoststatus=".$this->_host_status[$status];
            $command = "/nagios_dev/api/listHosts?hoststatus=".$this->_host_status[$status];
        }
        $result = $this->call($command);

        return $result;
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
        $command = "/nagios/cgi-bin/statusjson.cgi?query=servicelist&details=true";
        // $command = "/nagios_dev/api/listServices";
        if (isset($this->_service_status[$status])) {
            $command = "/nagios/cgi-bin/statusjson.cgi?query=servicelist&details=true&servicestatus=".$this->_service_status[$status];
            // $command = "/nagios_dev/api/listServices?servicestatus=".$this->_service_status[$status];
        }
        $result = $this->call($command);

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

    private function call($command)
    {
        $username = env("NAGIOS_USERNAME");
        $password = env("NAGIOS_PASSWORD");

        $domain = env("NAGIOS_DOMAIN");
        $url = $domain.$command;

        $port = env("NAGIOS_PORT");
        $timeout = env("NAGIOS_TIMEOUT");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_PORT, $port);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_COOKIE, "");
        curl_setopt($ch, CURLOPT_USERPWD, $username.":".$password);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);

        $curl_errno = curl_errno($ch);
        $curl_error = curl_error($ch);

        return $result;
    }
}
