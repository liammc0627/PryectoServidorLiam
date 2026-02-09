<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'name' => 'required|min:2|max:255',
            'date' => 'required|after_or_equal:today',
            'description' => 'min:20|max:200',
            'location' => 'required',
            'map' => 'required',
            'hour' => 'required',
            'type' => 'required|in:match,training,charity',
            'visible' => 'boolean',
        ];
    }
    public function messages()
    {
        return[
            'name.required' =>'El nombre del evento es obligatorio',
            'name.min' => 'El nombre del evento tiene que tener mínimo 2 caracteres',
            'name.max' => 'El nombre del evento tiene que tener máximo 255 caracteres',
            'date.required' => 'La fecha del evento es obligatoria',
            'date.after_or_equal' => 'La fecha tiene que ser hoy como pronto',
            'description.min' => 'La descripción tiene que tener mínimo 20 caracteres',
            'description.max' => 'La descripción tiene que tener como máximo 300 caracteres',
        ];
    }
}
