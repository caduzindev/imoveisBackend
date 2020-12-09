<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateImovel extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'string',
            'status'=>'string',
            'desc'=>'min:150',
            'type'=>'string',
            'dorms'=>'numeric',
            'price'=>'numeric',
            'details'=>'min:50'
        ];
    }
}
