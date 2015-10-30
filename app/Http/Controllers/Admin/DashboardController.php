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
use Stigma\Provision\Repositories\ProvisionedServerRepository;

class DashboardController extends Controller { 

    protected $nagiosClient ;
    protected $httpClient ;
    protected $provisionedServerRepo ;

    public function __construct(NagiosClient $nagiosClient,  
        ProvisionedServerRepository $provisionedServerRepo)
    {
        $this->nagiosClient = $nagiosClient ;
        $this->provisionedServerRepo = $provisionedServerRepo ;

        $client = new HttpClient ;
        $this->httpClient = $client ; 
    }

    public function refresh()
    {
        $response = new \stdClass ;
        $response->nagios = true; 
        $response->grafana = true; 
        $response->influxdb = true; 
        $response->database = true; 

        try {
            $this->httpClient->get(config('nagios.host'), [
                'timeout' => 4
            ]) ;
        } catch (\Exception $e){
            $response->nagios = false; 
        }

        try {
            $client = new \crodas\InfluxPHP\Client(
                "ec2-52-91-46-34.compute-1.amazonaws.com" /*default*/,
                8086 /* default */,
                config('influxdb.username') /* by default */,
                config('influxdb.password')  /* by default */
            );
            //$this->httpClient->get('http://ec2-54-152-85-142.compute-1.amazonaws.com:8086') ;
        } catch (\Exception $e){
            $response->influxdb = false; 
        }

        try { 
            $this->httpClient->get(config('grafana.host'), [
                'timeout' => 4
            ]) ;
        } catch (\Exception $e){
            $response->grafana = false; 
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
            $response->database = false; 
        }

        echo json_encode($response) ;
    }

    public function index()
    {
        $serverList = $this->provisionedServerRepo->getAll() ;
        /*
        $client = new \crodas\InfluxPHP\Client(
            "ec2-52-192-9-222.ap-northeast-1.compute.amazonaws.com" /,
            8086 ,
            "root" ,
            "root" 
        );
         */

        //$client->getDatabases();

        return view('admin.dashboard.index', compact('serverList')) ;
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
