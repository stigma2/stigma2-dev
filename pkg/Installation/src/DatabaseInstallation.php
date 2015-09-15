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

    public function validate(array $value)
    { 
        return $this->dbValidator->validate($value) ;

        if(!array_key_exists('host',$value) || $value['host'] === ''){
            return false;
        }else if(!array_key_exists('dbuser',$value) || $value['dbuser'] === ''){
            return false;
        }else if(!array_key_exists('password',$value) || $value['password'] === ''){
            return false;
        }else if(!array_key_exists('database',$value) || $value['database'] === ''){
            return false;
        }

        return true ;
    }
}
