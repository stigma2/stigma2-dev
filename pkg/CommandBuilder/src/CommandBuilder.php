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
}
