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

    public function nagios()
    {
        return view('admin.configuration.nagios') ;
    }

    public function nagiosUpdate(Request $req)
    {
        try { 

            $data = $req->only('host') ; 

            $nagiosInstallation->setup($data)  ;

            //return redirect()->route('installation::grafana.view') ;
        }catch (InvalidParameterException $e) { 
            //return back()->withInput() ;
        } 
    }

}
