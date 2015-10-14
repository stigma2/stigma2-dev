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
        $command = "api/v1/services/".$name."?servicedescription=".urlencode($servicedescription);
        $result = $this->call($command);

        return $result;
    }

    public function getSystemStatus()
    {
        $command = "api/v1/nagios?command=status";
        $result = $this->call($command, TRUE);

        return $result;
    }

    public function getHostStatus()
    {
        $command = "api/v1/statistic/host";
        $result = $this->call($command);

        return $result;
    }

    public function getServiceStatus()
    {
        $command = "api/v1/statistic/service";
        $result = $this->call($command);

        return $result;
    }

    public function getEvent($type, $starttime, $endtime)
    {
        $command = "api/v1/statistic/log?type=".$type."&starttime=".$starttime."&endtime=".$endtime;
        $result = $this->call($command);

        return $result;
    }

    private function call($command, $code = null)
    {
        $domain = config('nagios.host');
        $url = $domain.$command;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_COOKIE, "");
        curl_setopt($ch, CURLOPT_TIMEOUT, "3");

        $result = curl_exec($ch);

        if ($code) {
            return curl_getinfo($ch, CURLINFO_HTTP_CODE);
        }
        curl_close($ch);
        
        return $result;
    }
}
