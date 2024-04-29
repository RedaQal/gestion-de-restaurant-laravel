<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'label' => 'required',
            'description' => 'required|min:15',
            'prix' => 'required|numeric|min:0.01',
            'id_categorie' => 'required',
            'image.*' => 'image|mimes:png,jpg,jpeg|max:2048',
        ];
    }
}
