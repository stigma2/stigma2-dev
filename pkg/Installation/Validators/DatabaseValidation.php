<?php 
namespace Stigma\Installation\Validators;

use Illuminate\Contracts\Validation\Factory ; 

class DatabaseValidation
{
    protected $validatorFactory ;
    protected $rules = [
            'dbuser' => 'required'
       ] ;

    public function __construct(Factory $validatorFactory)
    {
        $this->validatorFactory = $validatorFactory ;
    }
    public function validate(array $data)
    { 
        $this->validatorFactory->make($data,$this->rules);
        return false ;
    }
}
