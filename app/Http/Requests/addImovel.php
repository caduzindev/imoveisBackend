<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addImovel extends FormRequest
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
            'title'=>'required|string',
            'status'=>'required|string',
            'desc'=>'required|min:150',
            'type'=>'required|string',
            'dorms'=>'required|numeric',
            'price'=>'required|numeric',
            'details'=>'required|min:50',
            'cep'=>'required|regex:"^\d{5}-\d{3}$"',
            'city'=>'required|string',
            'neigh'=>'required|string',
            'lat'=>'required',
            'long'=>'required',
            'photos.*'=>'required|mimetypes:image/jpeg,image/png|dimensions:min_width=600,min_height:600'
        ];
    }
}
