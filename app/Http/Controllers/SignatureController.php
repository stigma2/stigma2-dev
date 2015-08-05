<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// use App\Http\Requests;
// use App\Http\Controllers\Controller;

// use Shlee\Signature\Signature;

// class SignatureController extends Controller
// {
//     private $signature;

//     function __construct(Signature $signature)
//     {
//         $this->signature = $signature;
//     }

//     /**
//      * Description.
//      *
//      * @return Response
//      */
//     public function verify(Request $request)
//     {
//         $input = $request->all();
//         $result = $this->signature->execute($input);
//         dd($result);
//     }
// }
