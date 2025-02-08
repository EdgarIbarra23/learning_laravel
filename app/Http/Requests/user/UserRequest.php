<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name'              => ['required', 'string'],
            'last_name'         => ['required', 'string'],
            'email'             => ['required', 'string', Rule::unique('users', 'email')->ignore($this->id)],
            'password'          => ['required', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name'              => 'nombre',
            'last_name'         => 'apellido',
            'email'             => 'correo electronico',
            'password'          => 'contraseña'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'      => 'El :attribute es requerido.',
            'name.string'        => 'El :attribute debe ser un texto.',

            'last_name.required' => 'El :attribute es requerido.',
            'last_name.string'   => 'El :attribute debe ser un texto.',

            'email.required'     => 'El :attribute es requerido.',
            'email.string'       => 'El :attribute debe ser un texto.',
            'email.unique'       => 'El :attribute ya está en uso.',

            'password.required'  => 'El :attribute es requerido.',
            'password.string'    => 'El :attribute debe ser un texto.',
        ];
    }
}
