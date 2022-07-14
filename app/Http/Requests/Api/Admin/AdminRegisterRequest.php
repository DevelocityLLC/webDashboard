<?php

namespace App\Http\Requests\Api\Admin;

use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class AdminRegisterRequest extends FormRequest
{

     use ApiResponseTrait;

     public function rules()
    {
        return [
            'name' => 'required',
            'job_title' => 'required' ,
            'email' => 'required|email|unique:admins,email',
            'password' => 'required' ,
            'img' => 'nullable|mimes:png,jpg,jpeg',
        ];
    }


    public function failedValidation(Validator $validator)
    {

        $error = $validator->errors()->toArray();

        if ( isset($error['name']) ) {
            $msg = $error['name'][0];
            $code = 422;
        } elseif ( isset($error['job_title']) ) {
            $msg = $error['job_title'][0];
            $code = 422;
        }elseif ( isset($error['email']) ) {
            $msg = $error['email'][0];
            $code = 422;
        }elseif ( isset($error['password']) ) {
            $msg = $error['password'][0];
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
