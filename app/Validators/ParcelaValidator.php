<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request as HttpRequest;

class ParcelaValidator{

    public static function validate(HttpRequest $request){

        $validator = Validator::make($request->all(), 
            [
                'VR_PARCELA'=>'required|numeric'
            ]
        );

        return $validator;

    }
}