<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditTypeRequest extends FormRequest
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
            'label' => 'required|string|max:25',
            'description' => 'string|max:255',

        ];
    }

    /**
     * Get the error message.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'label.required' => 'L\'etichetta non può essere vuota',
            'label.string' => "L'etichetta dev'essere una stringa",
            'label.max' => 'La lunghezza massima è di 100 caratteri',
            'description.string' => "La descrizione dev'essere un testo",
            'description.max' => "La descrizione dev'essere lunga massino 255 caratteri",

        ];
    }
}