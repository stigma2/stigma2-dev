<?php
namespace Stigma\Installation\Services ;
use Stigma\Installation\Validators\DatabaseValidation ;
use Stigma\Installation\Contracts\ConfigFileGenerator ;

class DatabaseInstallation
{
    protected $dbValidator ;
    protected $fileGenerator ;
    protected $configurationTempFile ;

    public function __construct(DatabaseValidation $dbValidator, ConfigFileGenerator $fileGenerator)
    { 
        $this->dbValidator = $dbValidator ;
        $this->fileGenerator = $fileGenerator ;
    }
    
    public function setup(array $value)
    {
        if(! $this->validate($value)){
            return false ;
        } 

        return $this->fileGenerator->make($value) ; 
    }

    public function validate(array $value)
    { 
        return $this->dbValidator->passes($value) ; 
    } 
}
