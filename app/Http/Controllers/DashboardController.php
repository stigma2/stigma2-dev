<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Interfaces\NagiosInterface;

class DashboardController extends Controller
{
    private $nagiosAPI;

    /**
     * Set the dependencies.
     *
     * @param NagiosInterface $nagiosAPI
     * @return void
     */
    public function __construct(NagiosInterface $nagiosAPI)
    {
        $this->nagiosAPI = $nagiosAPI;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show($dashboard)
    {
        $str = "GRAFANA_DASHBOARD_".$dashboard;
        $result = env("GRAFANA_DOMAIN").env($str);

        return response()->json($result);
    }

    /**
     * Display a nagios system status.
     *
     * @return \Illuminate\Http\Response
     */
    public function systemstatus()
    {
        $result = $this->nagiosAPI->getSystemStatus();

        return $result;
    }

    /**
     * Display a host status.
     *
     * @return \Illuminate\Http\Response
     */
    public function hoststatus()
    {
        $result = $this->nagiosAPI->getHostStatus();

        return $result;
    }

    /**
     * Display a service status.
     *
     * @return \Illuminate\Http\Response
     */
    public function servicestatus()
    {
        $result = $this->nagiosAPI->getServiceStatus();

        return $result;
    }

    /**
     * Display a event log.
     *
     * @return \Illuminate\Http\Response
     */
    public function eventlog()
    {
        $result = $this->nagiosAPI->getEventLog();

        return $result;
    }
}
