<?php

namespace App\Http\Requests\task;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
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
            'title'             => ['required', 'string'],
            'description'       => ['required', 'string'],
            'user_id'           => ['required', 'numeric', Rule::exists('users', 'id')],
        ];
    }

    public function attributes(): array
    {
        return [
            'title'             => 'titulo',
            'description'       => 'descripción',
            'user_id'           => 'user_id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'            => 'El :attribute es requerido.',
            'title.string'              => 'El :attribute debe ser un texto.',

            'description.required'      => 'El :attribute es requerido.',
            'description.string'        => 'El :attribute debe ser un texto.',

            'user_id.required'          => 'El :attribute es requerido.',
            'user_id.numeric'           => 'El :attribute debe ser un valor numérico.',
            'user_id.exists'            => 'El :attribute seleccionado no es válido.',
        ];
    }
}
