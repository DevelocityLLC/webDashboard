<?php

namespace App\Http\Requests\Api\Admin;

use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class ComplaintRequest extends FormRequest
{

     use ApiResponseTrait;

    public function rules()
    {
        return [
            'title' => 'required',
            'message' => 'required',
            'type' => 'required' ,
            'task_id' => 'required|exists:tasks,id' ,

        ];
    }


    public function failedValidation(Validator $validator)
    {

        $error = $validator->errors()->toArray();

        if ( isset($error['title']) ) {
            $msg = $error['title'][0];
            $code = 422;
        } elseif ( isset($error['message']) ) {
            $msg = $error['message'][0];
            $code = 422;
        }elseif ( isset($error['type']) ) {
            $msg = $error['type'][0];
            $code = 422;
        }elseif ( isset($error['task_id']) ) {
            $msg = $error['task_id'][0];
            $code = 422;
        }else {
            $msg = __('api.error');
            $code = 422;
        }


        throw new HttpResponseException($this->apiResponse( null , $code , $msg) );
    }

}
