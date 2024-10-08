<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'description' => 'required',
            'quantity' => 'required|integer',
            'value' => 'required',
            'product_types_id' => 'required|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'description.required'=>'A descrição é obrigatória.',
            'quantity.required'=>'A quantidade é obrigatória',
            'quantity.integer'=>'O campo quantidade precisa ser número inteiro',
            'value.required'=>'O valor é obrigatório',
            'product_types_id.required'=>'O tipo de produto é obrigatório',
            'product_types_id.integer'=>'O campo Tipo de produto precisa ser número inteiro'


        ];
    }
}
