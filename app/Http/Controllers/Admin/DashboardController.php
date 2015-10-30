<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Stigma\CommandBuilder\CommandBuilder ;
use Stigma\Nagios\Client as NagiosClient ;
use Illuminate\Http\Response; 
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException ; 
use Stigma\Installation\Validators\DatabaseConnectionValidation ;

class DashboardController extends Controller { 

    protected $nagiosClient ;
    protected $httpClient ;

    public function __construct(NagiosClient $nagiosClient)
    {
        $this->nagiosClient = $nagiosClient ;

        $client = new HttpClient ;
        $this->httpClient = $client ; 
    }

    public function refresh()
    {
        try {
            $this->httpClient->get('http://ec2-54-152-85-142.compute-1.amazonaws.com/nagios-dev/') ;
        } catch (\Exception $e){
            echo "nagios" ; 
        }

        try {
            $this->httpClient->get('http://ec2-54-152-85-142.compute-1.amazonaws.com:8086') ;
        } catch (\Exception $e){
            echo "influxdb" ; 
        }

        try {
            $this->httpClient->get('http://ec2-54-152-85-142.compute-1.amazonaws.com:3000') ;
        } catch (\Exception $e){
            echo "grafana" ; 
        } 

        $dbValidation = new DatabaseConnectionValidation ;

        $data = array();
        $data['host'] = config('database.connections.mysql.host') ;
        $data['password'] = config('database.connections.mysql.password') ;
        $data['dbuser'] = config('database.connections.mysql.username') ;
        $data['database'] = config('database.connections.mysql.database') ;

        try {
            $ret = $dbValidation->passes($data) ;
        }catch (\Exception $e){
            echo "database" ; 
        }
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
