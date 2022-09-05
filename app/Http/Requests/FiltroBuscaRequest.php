<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FiltroBuscaRequest extends FormRequest
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
            'motivo'=>['required_if:codigo,!=,null'],
            // 'bairro'=>['required'],
            // 'quarto'=>['required'],
            // 'banheiro'=>['required'],
            // 'garagem'=>['required'],
        ];
    }
}
