<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImovelOrder extends FormRequest
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
            'name'=>'required|max:50',
            'email'=>'required|max:255',
            'message'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=> 'O nome é obrigatorio',
            'email.required'=> 'O e-mail e obrigatorio',
            'message.required'=> 'A mensagem de obrigatoria',
            'name.max'=> 'Nome muito grande',
            'email.max'=> 'E-mail muito grande'
        ];
    }
}
