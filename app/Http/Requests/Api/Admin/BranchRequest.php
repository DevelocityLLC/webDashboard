<?php

namespace App\Http\Requests\Api\Admin;

use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class BranchRequest extends FormRequest
{

     use ApiResponseTrait;

    public function rules()
    {
       if($this->method() == 'POST'){
        return [
            'name' => 'required',
            'lat' => 'nullable',
            'lng' => 'nullable' ,
            'location' => 'nullable',
            'img' => 'required' ,

        ];
       }else{
        return [
            'name' => 'required',
            'lat' => 'nullable',
            'lng' => 'nullable' ,
            'location' => 'nullable',
            'img' => 'nullable' ,

        ];
       }
    }


    public function failedValidation(Validator $validator)
    {

        $error = $validator->errors()->toArray();

        if ( isset($error['name']) ) {
            $msg = $error['name'][0];
            $code = 422;
        }elseif ( isset($error['lat']) ) {
            $msg = $error['lat'][0];
            $code = 422;
        }elseif ( isset($error['lng']) ) {
            $msg = $error['lng'][0];
            $code = 422;
        }elseif ( isset($error['location']) ) {
            $msg = $error['location'][0];
            $code = 422;
        }elseif ( isset($error['img']) ) {
            $msg = $error['img'][0];
            $code = 422;
        }else {
            $msg = __('api.error');
            $code = 422;
        }


        throw new HttpResponseException($this->apiResponse( null , $code , $msg) );
    }

}
