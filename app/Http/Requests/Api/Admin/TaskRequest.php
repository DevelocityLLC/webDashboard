<?php

namespace App\Http\Requests\Api\Admin;

use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class TaskRequest extends FormRequest
{

     use ApiResponseTrait;

    public function rules()
    {
        return [

            'title'         =>'required',
            'branch_id'    => 'required|exists:branches,id' ,
             'section_ids'   => 'required|array|exists:sections,id' ,
            'user_ids'      => 'required|array|exists:users,id' ,
            'desc'          => 'required' ,
            'img'           => 'nullable|mimes:png,jpg,jpeg' ,
            'start_date'    => 'required' ,
            'end_date'      => 'required' ,

        ];
    }


    public function failedValidation(Validator $validator)
    {

        $error = $validator->errors()->toArray();

        if ( isset($error['title']) ) {
            $msg = $error['title'][0];
            $code = 422;
        } elseif ( isset($error['company_id']) ) {
            $msg = $error['company_id'][0];
            $code = 422;
        }elseif ( isset($error['section_ids']) ) {
            $msg = $error['section_ids'][0];
            $code = 422;
        }elseif ( isset($error['user_ids']) ) {
            $msg = $error['user_ids'][0];
            $code = 422;
        }elseif ( isset($error['desc']) ) {
            $msg = $error['user_ids'][0];
            $code = 422;
        }elseif ( isset($error['img']) ) {
            $msg = $error['user_ids'][0];
            $code = 422;
        }elseif ( isset($error['start_date']) ) {
            $msg = $error['user_ids'][0];
            $code = 422;
        }elseif ( isset($error['end_date']) ) {
            $msg = $error['user_ids'][0];
            $code = 422;
        }else {
            $msg = __('api.error');
            $code = 422;
        }

        throw new HttpResponseException($this->apiResponse( null , $code , $msg) );
    }

}
