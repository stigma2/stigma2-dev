<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Stigma\CommandBuilder\CommandBuilder ;
use Stigma\Nagios\Client as NagiosClient ;
use Illuminate\Http\Response;
use Stigma\Installation\InstallManager;

class ConfigurationController extends Controller { 

    protected $installManager ;
    
    public function __construct(InstallManager $installManager)
    {
        $this->installManager = $installManager ;
    }

    public function provisioning()
    {
        $nagios = array(
            'host' => '' 
        );

        $grafana = array(
            'host' => '' ,
            'username' => '' ,
            'password' => '' 
        );

        $influxdb = array(
            'host' => '' ,
            'database' => '' ,
            'username' => '' ,
            'password' => '' 
        );

        $nagios = array_merge($nagios, (config('nagios'))) ;
        $grafana = array_merge($grafana,  (config('grafana'))) ;
        $influxdb = array_merge($influxdb, (config('influxdb'))) ;

        return view('admin.configuration.provisioning') ;
    }


    public function system()
    {
        $nagios = array(
            'host' => '' 
        );

        $grafana = array(
            'host' => '' ,
            'username' => '' ,
            'password' => '' 
        );

        $influxdb = array(
            'host' => '' ,
            'database' => '' ,
            'username' => '' ,
            'password' => '' 
        );

        $nagios = array_merge($nagios, (config('nagios'))) ;
        $grafana = array_merge($grafana,  (config('grafana'))) ;
        $influxdb = array_merge($influxdb, (config('influxdb'))) ;

        return view('admin.configuration.nagios',compact('nagios','grafana','influxdb')) ;
    }

    public function nagiosUpdate(Request $req)
    {
        try { 

            $data = $req->only('host') ; 

            $nagiosInstallation = $this->installManager->getNagiosInstallation() ;
            $nagiosInstallation->setup($data)  ;

            return redirect()->route('admin.configuration.nagios') ;
        }catch (InvalidParameterException $e) { 
            //return back()->withInput() ;
        } 
    }

    public function influxdbUpdate(Request $req)
    {
        try { 

            $data = $req->only('host','password','username','database') ; 

            $influxdbInstallation = $this->installManager->getInfluxdbInstallation() ;
            $influxdbInstallation->setup($data)  ;

            return redirect()->route('admin.configuration.nagios') ;
        }catch (InvalidParameterException $e) { 
            //return back()->withInput() ;
        } 
    }

    public function grafanaUpdate(Request $req)
    {
        try { 

            $data = $req->only('host','password','username') ; 

            $grafanaInstallation = $this->installManager->getGrafanaInstallation() ;
            $grafanaInstallation->setup($data)  ;

            return redirect()->route('admin.configuration.nagios') ;
        }catch (InvalidParameterException $e) { 
            //return back()->withInput() ;
        } 
    }

}
