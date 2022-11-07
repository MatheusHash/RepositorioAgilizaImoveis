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
            'codImovel',
            'nome'=>['required'],
            'email'=>['required'],
            'telefone'=>['required'],
            'mensagem'=>['required', 'string', 'max: 255'],
        ];
    }
}
