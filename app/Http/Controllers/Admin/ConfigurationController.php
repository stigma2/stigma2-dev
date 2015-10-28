<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Stigma\CommandBuilder\CommandBuilder ;
use Stigma\Nagios\Client as NagiosClient ;
use Illuminate\Http\Response;
use Stigma\Installation\InstallManager;
use Stigma\Provision\ProvisionManager;
use Stigma\Provision\Repositories\ProvisionedServerRepository;

class ConfigurationController extends Controller { 

    protected $installManager ;
    protected $provisionedServerRepo ;
    
    public function __construct(InstallManager $installManager,ProvisionManager $provisionManager, ProvisionedServerRepository $provisionedServerRepo)
    {
        $this->installManager = $installManager ;
        $this->provisionManager = $provisionManager ;
        $this->provisionedServerRepo = $provisionedServerRepo ;
    }

    public function provisioning(Request $req)
    { 
        $config = array() ;
        if(file_exists((config_path().'/provisioning.php'))){
            $config = config('provisioning') ;
        } else {
            $config['apikey'] = '' ; 
            $config['secret'] = '' ; 
        }

        $serverList = $this->provisionedServerRepo->getAll() ;

        return view('admin.configuration.provisioning',compact('config','serverList')) ;
    }

    public function provisioningRequest()
    { 
        $data = config('provisioning') ;
        $this->provisionManager->provisionNagiosEnv($data)  ;
    }

    public function provisioningUpdate(Request $req)
    { 
        try { 

            $data = $req->only('apikey','secret') ; 

            $this->provisionManager->setup($data)  ;

            return redirect()->route('admin.configuration.provisioning') ;
        }catch (InvalidParameterException $e) { 
            //return back()->withInput() ;
        } 
    }



    public function system()
    {
        if(! $this->installManager->verifyToBeInstalled()){

            $nagiosInstallation = $this->installManager->getNagiosInstallation() ;
            $nagiosInstallation->setup(array('host'=>'localhost'))  ;

            $grafanaInstallation = $this->installManager->getGrafanaInstallation() ;
            $grafanaInstallation->setup(array(
                'host'=>'localhost',
                'username'=> 'stigma' , 
                'password'=> 'stigma' , 
            ));

            $influxdbInstallation = $this->installManager->getInfluxdbInstallation() ;
            $influxdbInstallation->setup(array(
                'host'=>'localhost',
                'database'=> 'stigma' , 
                'username'=> 'stigma' , 
                'password'=> 'stigma' , 
            ));
        }


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

            return redirect()->route('admin.configuration.system') ;
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

            return redirect()->route('admin.configuration.system') ;
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

            return redirect()->route('admin.configuration.system') ;
        }catch (InvalidParameterException $e) { 
            //return back()->withInput() ;
        } 
    }

}
