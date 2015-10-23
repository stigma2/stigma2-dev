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
        $nagios = (config('nagios')) ;
        return view('admin.configuration.nagios',compact('nagios')) ;
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

}
