<?php

namespace App\APIs;

use App\Interfaces\NagiosInterface;

class Nagios implements NagiosInterface
{
    private $_host_status = array("0" => "up", "1" => "down", "2" => "unreachable", "9" => "pending");
    private $_service_status = array("0" => "ok", "1" => "warning", "2" => "critical", "3" => "unknown", "9" => "pending");

    public function listHosts($status)
    {
        $command = "api/v1/hosts";
        if (isset($this->_host_status[$status])) {
            $command = "api/v1/hosts?hoststatus=".$this->_host_status[$status];
        }
        $result = $this->call($command);

        return $result;
    }

    public function showHost($name)
    {
        $command = "api/v1/hosts/".$name;
        $result = $this->call($command);

        return $result;
    }

    public function listServices($status)
    {
        $command = "api/v1/services";
        if (isset($this->_service_status[$status])) {
            $command = "api/v1/services?servicestatus=".$this->_service_status[$status];
        }
        $result = $this->call($command);

        return $result;
    }

    public function showService($name, $servicedescription)
    {
        $command = "api/v1/services/".$name."?servicedescription=".$servicedescription;
        $result = $this->call($command);

        return $result;
    }

    private function call($command)
    {
        $domain = env("NAGIOS_DOMAIN");
        $url = $domain.$command;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_COOKIE, "");
        curl_setopt($ch, CURLOPT_TIMEOUT, "3");

        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
    }
}
