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
    
    public function setup(array $value)
    {
        if(! $this->validate($value)){
            return false ;
        }

        return true ;
    }

    public function validate(array $value)
    { 
        return $this->dbValidator->passes($value) ; 
    } 
}
