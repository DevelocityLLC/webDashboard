<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'email' => 'required|email|unique:users,email' ,
                'img' => 'required|mimes:png,jpg,jpeg' ,
                'password' => 'required' ,
                'job_title' => 'required' ,
                'job_desc' => 'required' ,
                'kpis' => 'required' ,
                'branch_id' => 'required' ,
                'section_id' => 'required' ,
            ];
       }else{
        return [
            'name' => 'required' ,
            'email' => 'required|email' ,
            'img' => 'nullable|mimes:png,jpg,jpeg' ,
            'password' => 'nullable' ,
            'job_title' => 'required' ,
            'job_desc' => 'required' ,
            'kpis' => 'required' ,
            'branch_id' => 'required' ,
            'section_id' => 'required' ,
        ];
       }
    }
}
