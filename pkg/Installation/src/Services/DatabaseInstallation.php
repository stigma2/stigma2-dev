<?php
namespace Stigma\Installation\Services ;
use Stigma\Installation\Validators\DatabaseValidation ;
use Stigma\Installation\Contracts\ConfigFileGenerator ;

class DatabaseInstallation
{
    protected $validators  ;
    protected $fileGenerator ;
    protected $configurationTempFile ;

    public function __construct($validators = array(), ConfigFileGenerator $fileGenerator)
    { 
        $this->validators = $validators ;
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
        foreach($this->validators as $validation) { 
            if(!$validation->passes($value)) {
                return false; // or throw exception
            }
        }
        return true ;
    }
}
