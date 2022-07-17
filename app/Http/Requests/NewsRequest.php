<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' =>'required',
            'desc' =>'required',
            'img' =>'nullable',
            'type_id' =>'required',
            'branch_id' =>'required',
        ];
    }
}
