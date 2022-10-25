<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalvarAtualizarFormRequestImovel extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'titulo' => ['required', 'string'],
            // 'cidade_id' => ['required'],

            'municipio' => ['required'],

            'categoria_id' => ['required'],
            'imagem-principal' =>['required'],
            'valor' =>['required'],
            //'endereco'=>['required', 'string', 'min: 5','max: 100'],
            'visibility'=>['required'],
            'quarto'=>['required'],
            'banheiro'=>['required'],
            'suite'=>['required'],
            'garagem'=>['required'],
            'motivo'=>['required'],
            //'googlemaps'=>['nullable'],
            //'descricao'=>['required', 'string'],
        ];
    }
}
