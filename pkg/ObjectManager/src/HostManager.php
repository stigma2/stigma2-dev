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

    private function filterData($data)
    {
        $storedData = [] ;

        $storedData['host_name'] = $data['host_name']   ;
        $storedData['template_name'] = $data['host_name']   ;
        $storedData['is_template'] = $data['is_template']   ;
        $storedData['is_immutable'] = $data['is_immutable']   ;
        $storedData['template_ids'] = $data['template_ids']   ;
        $storedData['service_ids'] = $data['service_ids']   ; 
        $storedData['command_id'] = array_key_exists('command_id', $data) ? $data['command_id'] : ''  ;
        $storedData['command_argument'] = array_key_exists('command_argument', $data) ? $data['command_argument'] : ''  ; 
        $storedData['address'] = array_key_exists('address', $data) ? $data['address'] : ''   ;
        $storedData['alias'] = $data['host_name']   ; 
        $storedData['data'] = json_encode($data) ; 


        return $storedData ;
    }

    public function register($data)
    { 
        $storedData = $this->filterData($data) ;
        $ret = $this->repo->store($storedData) ; 

        return $ret ;
    }

    public function update($id,$data)
    {

        $storedData = $this->filterData($data) ;
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
