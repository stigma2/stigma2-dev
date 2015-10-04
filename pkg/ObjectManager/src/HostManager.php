<?php
namespace Stigma\ObjectManager ;

use Stigma\ObjectManager\Contracts\ObjectManager ;
use Stigma\ObjectManager\Repositories\HostRepository ;

class HostManager implements ObjectManager
{ 
    protected $repo ;

    public function __construct(HostRepository $repo)
    {
        $this->repo = $repo ;
    }

    public function register($data)
    { 
        $storedData = [] ;

        $storedData['host_name'] = $data['host_name']   ;
        $storedData['template_name'] = $data['host_name']   ;
        $storedData['is_template'] = $data['is_template']   ;
        $storedData['template_ids'] = $data['template_ids']   ;
        $storedData['service_ids'] = $data['service_ids']   ;
        $storedData['alias'] = $data['host_name']   ; 
        $storedData['data'] = json_encode($data) ; 

        $ret = $this->repo->store($storedData) ; 

        return $ret ;
    }

    public function update($id,$data)
    {
        $storedData = [] ;

        $storedData['host_name'] = $data['host_name']   ;
        $storedData['template_name'] = $data['host_name']   ;
        $storedData['is_template'] = $data['is_template']   ; 
        $storedData['template_ids'] = $data['template_ids']   ;
        $storedData['service_ids'] = $data['service_ids']   ;
        $storedData['alias'] = $data['host_name']   ; 
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
}
