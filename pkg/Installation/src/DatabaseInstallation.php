<?php
namespace Stigma\Installation ;
use Stigma\Installation\Validators\DatabaseValidation ;

class DatabaseInstallation
{
    protected $dbValidator ;

    public function __construct(DatabaseValidation $dbValidator)
    {
        $this->dbValidator = $dbValidator ;
    }

    public function passes(array $value)
    { 
        return $this->dbValidator->passes($value) ; 
    } 
}
