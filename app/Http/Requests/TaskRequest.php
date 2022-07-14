<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required' ,
            'desc' => 'nullable' ,
            'img' => 'nullable' ,
            'message' => 'nullable' ,
            'start_date' => 'required' ,
            'end_date' => 'required' ,
            'user_id' => 'required' ,
            'branch_id' => 'required' ,
            'section_id' => 'required' ,
        ];
    }
}
