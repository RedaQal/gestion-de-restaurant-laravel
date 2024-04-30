<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EmployeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return $this->user()->id === $this->route('user')->id;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $employe = $this->employe->id ?? 0;
        return [
            'name' => 'required',
            'email' => "required|email|unique:employes,email,$employe",
            'tel' => ["required","regex:/^(\+212|0)\d{9}$/i"],
            'salaire' => 'required|numeric',
        ];

    }
}
