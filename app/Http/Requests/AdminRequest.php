<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
       if($this->method() == 'POST'){
            return [
                'name' => 'required' ,
                'job_title' => 'required' ,
                'email' => 'required|email|unique:admins,email' ,
                'password' => 'required' ,
                'img' => 'nullable|mimes:png,jpg,jpeg' ,
            ];
       }else{
        return [
            'name' => 'required' ,
            'job_title' => 'required' ,
            'email' => 'required|email' ,
            'password' => 'required' ,
            'img' => 'nullable|mimes:png,jpg,jpeg' ,
        ];
       }
    }
}
