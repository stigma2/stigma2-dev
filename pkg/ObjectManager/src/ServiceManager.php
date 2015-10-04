<?php
namespace Stigma\ObjectManager ;

use Stigma\ObjectManager\Contracts\ObjectManager ;
use Stigma\ObjectManager\Repositories\ServiceRepository ;

class ServiceManager implements ObjectManager
{ 
    protected $repo ;

    public function __construct(ServiceRepository $repo)
    {
        $this->repo = $repo ;
    }

    public function register($data)
    { 
        $storedData = [] ;

        $storedData['service_name'] = $data['service_name']   ;
        $storedData['service_description'] =  $data['service_name']     ;
        $storedData['is_template'] = $data['is_template']   ;
        $storedData['template_ids'] = $data['template_ids']   ;
        $storedData['data'] = json_encode($data) ; 

        $ret = $this->repo->store($storedData) ; 

        return $ret ;
    }

    public function update($id,$data)
    {
        $storedData = [] ;

        $storedData['service_name'] = $data['service_name']   ;
        $storedData['service_description'] =  $data['service_name']     ;
        $storedData['is_template'] = $data['is_template']   ;
        $storedData['template_ids'] = $data['template_ids']   ;
        $storedData['data'] = json_encode($data) ; 

        $ret = $this->repo->update($id,$storedData) ;

        return $ret ; 
    }

    public function getAllItems()
    { 
        return $this->repo->getAll() ;
    }

    public function getAllTemplates()
    {
        $ret = $this->repo->getAll()->filter(function($item){
            if($item->is_template == 'Y'){
                return $item ;
            }
        }) ;

        return $ret ;
    }

    public function find($id)
    {
        return $this->repo->find($id) ;
    }

    public function delete($id)
    {
        return $this->repo->delete($id) ;
    }
}
