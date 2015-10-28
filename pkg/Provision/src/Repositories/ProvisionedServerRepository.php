<?php
namespace Stigma\Provision\Repositories ;
use Stigma\Database\Repository\IlluminateRepository ;

class ProvisionedServerRepository extends IlluminateRepository
{
    protected $model = 'Stigma\Provision\Models\ProvisionedServer' ;
}
