<?php

namespace App\Http\Requests\Api\admin;

use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class RequirementRequest extends FormRequest
{

     use ApiResponseTrait;

    public function rules()
    {
        return [
            'name' => 'required' ,
            'price' => 'required|numeric' ,
            'task_id' => 'required|exists:tasks,id' ,
            'admin_id' => 'required|exists:admins,id' ,
        ];
    }


    public function failedValidation(Validator $validator)
    {

        $error = $validator->errors()->toArray();

        if ( isset($error['name']) ) {
            $msg = $error['name'][0];
            $code = 422;
        }elseif ( isset($error['price']) ) {
            $msg = $error['price'][0];
            $code = 424;
        }elseif ( isset($error['task_id']) ) {
            $msg = $error['task_id'][0];
            $code = 424;
        }elseif ( isset($error['admin_id']) ) {
            $msg = $error['admin_id'][0];
            $code = 424;
        }else {
            $msg = __('api.error');
            $code = 422;
        }


        throw new HttpResponseException($this->apiResponse( null , $code , $msg) );
    }

}
