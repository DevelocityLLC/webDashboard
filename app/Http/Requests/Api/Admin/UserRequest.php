<?php

namespace App\Http\Requests\Api\Admin;

use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class UserRequest extends FormRequest
{

     use ApiResponseTrait;

    public function rules()
    {
        if($this->method() == 'POST'){
            return [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'img' => 'required|mimes:png,jpg,jpeg' ,
                'password' => 'required' ,
                'job_title' => 'required',
                'job_desc' => 'required',
                'kpis' => 'required' ,
                'branch_id' => 'required|exists:branches,id' ,
                'section_id' => 'required|exists:sections,id'
            ];
        }else{
            return [
                'name' => 'required',
                'email' => 'required|email',
                'img' => 'nullable|mimes:png,jpg,jpeg' ,
                'password' => 'required' ,
                'job_title' => 'required',
                'job_desc' => 'required',
                'kpis' => 'required' ,
                'branch_id' => 'required|exists:branches,id' ,
                'section_id' => 'required|exists:sections,id'

            ];
        }

    }


    public function failedValidation(Validator $validator)
    {

        $error = $validator->errors()->toArray();

        if ( isset($error['name']) ) {
            $msg = $error['name'][0];
            $code = 422;
        } elseif ( isset($error['email']) ) {
            $msg = $error['email'][0];
            $code = 422;
        }elseif ( isset($error['password']) ) {
            $msg = $error['password'][0];
            $code = 422;
        }elseif ( isset($error['img']) ) {
            $msg = $error['img'][0];
            $code = 422;
        }elseif ( isset($error['job_title']) ) {
            $msg = $error['job_title'][0];
            $code = 422;
        }elseif ( isset($error['job_desc']) ) {
            $msg = $error['job_desc'][0];
            $code = 422;
        }elseif ( isset($error['kpis']) ) {
            $msg = $error['kpis'][0];
            $code = 422;
        }elseif ( isset($error['branch_id']) ) {
            $msg = $error['branch_id'][0];
            $code = 422;
        }elseif ( isset($error['section_id']) ) {
            $msg = $error['section_id'][0];
            $code = 422;
        }else {
            $msg = __('api.error');
            $code = 422;
        }


        throw new HttpResponseException($this->apiResponse( null , $code , $msg) );
    }

}
