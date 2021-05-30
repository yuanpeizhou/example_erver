<?php

namespace App\Http\Requests;

use App\Exceptions\ParamsErrorException;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function withValidator($validator){
        if($validator->fails()){
            // var_dump($validator->errors()->all());exit;
            throw new ParamsErrorException( $validator->errors()->all()[0]);
        }
    }
}