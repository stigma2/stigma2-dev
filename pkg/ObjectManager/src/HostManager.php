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
        $ret = $this->repo->store($data) ; 

        return $ret ;
    }
}
