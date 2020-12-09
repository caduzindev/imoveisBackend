<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addEmployee extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|string',
            'email'=>'email',
            'password'=>'required|string',
            'image'=>'required|mimetypes:image/jpeg,image/png|dimensions:min_width=300,min_height:300'
        ];
    }
}
