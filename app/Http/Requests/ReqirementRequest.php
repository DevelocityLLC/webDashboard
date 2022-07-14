<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReqirementRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required' ,
            'price' => 'required' ,
            'task_id' => 'required' ,
            'admin_id' => 'required' ,
        ];
    }
}
