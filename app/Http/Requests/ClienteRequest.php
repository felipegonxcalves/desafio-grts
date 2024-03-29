<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nome' => 'required',
            'email'=> 'required|email',
            'telefone' => 'required|numeric',
            'sexo' => 'required',
            'nascimento' => 'required',
            'logradouro' => 'required',
            'complemento' => 'required',
            'numero' => 'required|numeric',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'pais' => 'required',
            'cep' => 'required'
        ];
    }
}
