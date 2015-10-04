<?php
namespace Stigma\Nagios ; 
use GuzzleHttp\Client as HttpClient;

class Client
{
    protected $httpClient ;
    protected $baseUri ;
    protected $port ;

    public function __construct($baseUri)
    { 
        //'http://106.243.134.121:20280/nagios_dev/'
        
        $this->baseUri = $baseUri ;
        $this->httpClient = new HttpClient([
            'base_uri' => $this->baseUri
        ]);
        //$this->httpClient->setPort($port) ;
    }

    public function generateCommand($data)
    {
        $data1 = new \stdClass ;
        $data1->command_name = 'ping' ;
        $data1->details = array(
            'command_name' => 'ping',
            'command_line' => '!$host'
        ) ;

        $data2 = new \stdClass ;
        $data2->command_name = 'ping2' ;
        $data2->details = array(
            'command_name' => 'ping2',
            'command_line' => '!$host'
        ) ; 

        $arr = [$data1, $data2] ;

        $uri = 'api/v1/commands' ;

        (json_encode($arr)) ; 

        try{

            $response = $this->httpClient->post($uri, [ 
                'form_params'=> [
                    'payload'=>json_encode($arr)  
                    ]
                ]  
            ); 
            return $response->getStatusCode();
        }catch(\Exception $e){
            echo((string)$e->getResponse()->getBody()) ;
        } 

    }

    public function requestToRestart()
    {
        $uri = 'api/v1/nagios' ;

        $response = $this->httpClient->get($uri, [
            'query' => [ 'command'=> 'restart']
        ]); 

        if($response->getStatusCode() == '200'){
            return true ;
        }

        return false ;
    }
}
