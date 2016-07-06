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
            $url = config('nagios.host').'/nagios';
            $this->httpClient->get($url, [
                'auth' => [config('nagios.username'), config('nagios.password')],
                'timeout' => 4
            ]) ;
        } catch (\Exception $e){
            $response->nagios = false; 
        }

        try { 
            #curl -G 'http://influxdb:8086/db/stigma/series?u=root&p=root' --data-urlencode "q=select * from // limit 1"
            #$url = 'http://'.config('influxdb.host').':'.config('influxdb.port').'/db/'.config('influxdb.database').'/series'
            #       .'?u='.config('influxdb.username').'&p='.config('influxdb.password').'&q=select%20*%20from%20%2F%2F%20limit%201';
            $url = 'http://'.config('influxdb.host').':'.config('influxdb.port').'/ping';
            $this->httpClient->get($url, [
                'timeout' => 4
            ]) ;
        } catch (\Exception $e){
            $response->influxdb = false; 
        } 

        try { 
            #curl http://admin:admin@localhost:3000/api/org
            $url = 'http://'.config('grafana.username').':'.config('grafana.password').'@'.config('grafana.host').':'.config('grafana.port').'/api/org';
            $this->httpClient->get($url, [
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
            $nagiosInstallation->setup(array(
                'host'=>'nagios', 
                'port'=>'8080',
                'username'=> 'nagiosadmin' , 
                'password'=> 'qwe123' , 
            ))  ;

            $grafanaInstallation = $this->installManager->getGrafanaInstallation() ;
            $grafanaInstallation->setup(array(
                'host'=>'grafana',
                'port'=>'3000',
                'username'=> 'admin' , 
                'password'=> 'admin' , 
            ));

            $influxdbInstallation = $this->installManager->getInfluxdbInstallation() ;
            $influxdbInstallation->setup(array(
                'host'=>'influxdb',
                'port'=>'8086',
                'database'=> 'stigma' , 
                'username'=> 'root' , 
                'password'=> 'root' , 
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
