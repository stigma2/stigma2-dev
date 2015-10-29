<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Stigma\CommandBuilder\CommandBuilder ;
use Stigma\Nagios\Client as NagiosClient ;
use Illuminate\Http\Response;

class DashboardController extends Controller { 

    protected $nagiosClient ;

    public function __construct(NagiosClient $nagiosClient)
    {
        $this->nagiosClient = $nagiosClient ;
    }

    public function index()
    {
        /*
        $client = new \crodas\InfluxPHP\Client(
            "ec2-52-192-9-222.ap-northeast-1.compute.amazonaws.com" /,
            8086 ,
            "root" ,
            "root" 
        );
         */

        //$client->getDatabases();

        return view('admin.dashboard.index') ;
    }

    public function nagiosRestart()
    {
        $ret = $this->nagiosClient->requestToRestart() ;

        if($ret){
            return new Response('success', 200);
        }else{
            return new Response('error', 400);
        }
    }
}
