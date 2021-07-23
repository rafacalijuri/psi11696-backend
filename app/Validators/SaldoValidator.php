<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request as HttpRequest;

class SaldoValidator{

    public static function validate(HttpRequest $request){

        $validator = Validator::make($request->all(), 
            [
                'VR_SALDO'=>'required|numeric'
            ]
        );

        return $validator;

    }
}