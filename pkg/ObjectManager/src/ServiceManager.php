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
        $ret = $this->repo->store($data) ; 

        return $ret ;
    }
}
