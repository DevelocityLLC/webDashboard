<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
       if ($this->method() == 'POST') {

        return [
            'name' => 'required' ,
            'img' => 'required|mimes:png,jpg,jpeg' ,
            'lat' => 'nullable' ,
            'lng' => 'nullable' ,
            'location' => 'nullable' ,
        ];

       }else{
        return [
            'name' => 'required' ,
            'img' => 'nullable|mimes:png,jpg,jpeg' ,
            'lat' => 'nullable' ,
            'lng' => 'nullable' ,
            'location' => 'nullable' ,
        ];
       }
    }
}
