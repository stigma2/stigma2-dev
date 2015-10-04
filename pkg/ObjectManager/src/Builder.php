<?php
namespace Stigma\ObjectManager ;

use Stigma\ObjectManager\HostManager ;
use Stigma\ObjectManager\ServiceManager ;
use Stigma\CommandBuilder\CommandBuilder ;

class Builder
{
    protected $hostManager ;
    protected $serviceManager ;
    protected $commandBuilder ;

    public function __construct(HostManager $hostManager , ServiceManager $serviceManager, CommandBuilder $commandBuilder)
    { 
        $this->hostManager = $hostManager ;
        $this->serviceManager = $serviceManager ;
        $this->commandBuilder = $commandBuilder ;
    }

    public function buildForhost()
    {
        $hostCollection = $this->hostManager->getAllItems() ;

        $payload = [] ;

        foreach($hostCollection as $host)
        {
            $data = new \stdClass ;
            $data = json_decode($host->data) ;
            $details  = (array) $data ; 
            $newDetails = [] ;

            $fields = config('host_tmpl') ; 

            foreach($fields as $key => $field) {
                if(array_key_exists($key,$details)){ 
                    $newDetails[$key] = $details[$key] ;
                }
            }

            if($host->command_id > 0){ // 커맨가 존재할 경우
                $command = $this->commandBuilder->find($host->command_id)  ;
                $newDetails['check_command'] = $command->command_name.$host->command_argument ;
            } 

            if($host->is_template == 'Y'){ //템플릿으로 사용할 경우
                $newDetails['name'] = $host->host_name ;
                $newDetails['register'] = 0 ;
            }

            if($host->template_ids != ''){ //템플릿 상속을 사용 할 경우
                $templateIds = explode(',',$host->template_ids) ; 
                $templates = [] ;

                foreach($templateIds as $templateId){
                    $templateHost = $this->hostManager->find($templateId) ; 
                    if($templateHost->getKey() > 0){
                        $templates[] = $templateHost->host_name ;
                    }
                }

                $newDetails['use'] = implode(',', $templates) ;

            }
            
            $data->details = $newDetails ;
            $data->host_name = $host->host_name ;
            $data->is_template = $host->is_template ;

            $payload[] = $data ; 
        }

        return $payload ;
    } 


    public function buildForService()
    {
        $hostCollection = $this->hostManager->getAllItems() ;

        $fields = config('service_tmpl') ; 
        $payload = [] ; 

        foreach($hostCollection as $host){
            if($host->service_ids != ''){
                $serviceIds = explode(',',$host->service_ids) ; 
                foreach($serviceIds  as $serviceId){
                    $service = $this->serviceManager->find($serviceId)  ;
                    $jsonData = json_decode($service->data) ;
                    $arrayData = (array)$jsonData ;
                    $newDetails = array() ;

                    foreach($fields as $key => $field) {
                        if(array_key_exists($key,$arrayData)){ 
                            $newDetails[$key] = $arrayData[$key] ;
                        }
                    } 

                    $newDetails['service_description'] = $service->service_name ;
                    $newDetails['host_name'] = $host->host_name ;

                    $serviceObj = new \stdClass ;
                    $serviceObj->service_name = $service->service_name ;
                    $serviceObj->is_template = $service->is_template ;
                    $serviceObj->details = $newDetails ;

                    $payload[] = $serviceObj ;
                }
            }
        }

        return $payload ;
    }
}
