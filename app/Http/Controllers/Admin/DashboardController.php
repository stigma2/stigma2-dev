<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Stigma\CommandBuilder\CommandBuilder ;
use Stigma\Nagios\Client as NagiosClient ;
use Illuminate\Http\Response; 
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException ; 
use Stigma\Installation\InstallManager;
use Stigma\Installation\Validators\DatabaseConnectionValidation ;
use Stigma\Provision\Repositories\ProvisionedServerRepository;

class DashboardController extends Controller { 

    protected $nagiosClient ;
    protected $httpClient ;
    protected $provisionedServerRepo ;
    protected $installManager ;

    public function __construct(NagiosClient $nagiosClient, ProvisionedServerRepository $provisionedServerRepo, InstallManager $installManager)
    {
        $this->nagiosClient = $nagiosClient ;
        $this->provisionedServerRepo = $provisionedServerRepo ;
        $this->installManager = $installManager ;

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

        $parsedData = parse_url(config('influxdb.host')) ; 

        
        if(config('influxdb.username')  != 'root'){
            $response->influxdb = false; 
        }else if(config('influxdb.password') != 'root'){
            $response->influxdb = false; 
        }else if($parsedData['port'] != 8086){
            $response->influxdb = false; 
        }else if(config('influxdb.database') != 'stigma'){
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
        if (! $this->installManager->verifyToBeInstalled()) {
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
