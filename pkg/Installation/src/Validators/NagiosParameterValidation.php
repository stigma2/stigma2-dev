<?php
namespace Stigma\Installation\Validators;

use Illuminate\Contracts\Validation\Factory ; 
use Stigma\Installation\Contracts\ValidationInterface ;
use Stigma\Installation\Exceptions\InvalidParameterException ;

class NagiosParameterValidation implements ValidationInterface
{ 
    protected $validatorFactory ;
    protected $rules = [
        'host' => 'required',
        'port' => 'required'
    ];

    public function __construct(Factory $validatorFactory)
    {
        $this->validatorFactory = $validatorFactory ;
    }

    public function passes($data)
    { 
        $validator = $this->validatorFactory->make($data,$this->rules);
        if($validator->fails()) {
            throw new InvalidParameterException;
        }

        return true;
    }

}
