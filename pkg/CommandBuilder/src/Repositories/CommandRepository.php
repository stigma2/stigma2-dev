<?php
namespace Stigma\CommandBuilder\Repositories ;
use Stigma\Database\Repository\IlluminateRepository ;

class CommandRepository extends IlluminateRepository
{
    protected $model = 'Stigma\CommandBuilder\Models\Command' ;
}
