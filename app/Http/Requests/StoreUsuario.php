<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuario extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => ['required', 'regex:/^([a-zA-ZÁÉÍÓÚáéíóúñ ])+$/', 'min:2', 'max:32'],
            'apellido_paterno' => ['required', 'regex:/^([a-zA-ZÁÉÍÓÚáéíóúñ ])+$/', 'min:2', 'max:32'],
            'apellido_materno' => ['required', 'regex:/^([a-zA-ZÁÉÍÓÚáéíóúñ ])+$/', 'min:2', 'max:32'],
            'email' => 'unique:usuario,email|required|email',
            'tipo' => 'required',
            'foto' => 'image',
        ];
    }
}
