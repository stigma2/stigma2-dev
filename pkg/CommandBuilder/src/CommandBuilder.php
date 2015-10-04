<?php
namespace Stigma\CommandBuilder ;
use Stigma\CommandBuilder\Models\Command ;
use Stigma\CommandBuilder\Repositories\CommandRepository ;

class CommandBuilder
{
    protected $repository ;

    public function __construct(CommandRepository $commandRepository)
    {
        $this->repository = $commandRepository ;
    }

    public function make($data)
    { 
        return $this->repository->store($data) ;
    } 

    public function update($id,$data)
    { 
        return $this->repository->update($id,$data) ;
    } 


    public function delete($id)
    { 
        return $this->repository->delete($id) ;
    } 

    public function find($id)
    { 
        return $this->repository->find($id) ;
    } 

    public function getRepository()
    {
        return $this->repository ;
    }

    public function getAll()
    {
        return $this->repository->getAll() ;
    }

    public function pluck($key,$valueKey)
    {
        $commandList = $this->getAll() ;

        $arr = [] ;

        foreach($commandList as $command)
        { 
            $arr[$command->{$key}] = $command->{$valueKey} ;
        } 

        return $arr ;
    }
}
