<?php 
namespace Stigma\Installation\Validators;

use Illuminate\Contracts\Validation\Factory ; 

class DatabaseValidation
{
    protected $validatorFactory ;
    protected $rules = [
        'dbuser' => 'required',
        'database' => 'required',
        'host' => 'required',
        'password' => 'required',
        'port' => 'required'
    ];

    public function __construct(Factory $validatorFactory)
    {
        $this->validatorFactory = $validatorFactory ;
    }

    public function passes(array $data)
    { 
        $validator = $this->validatorFactory->make($data,$this->rules);
        return ! $validator->fails() ;
    }
}
