<?php

namespace App\Http\Requests;

use App\Model\Usuario;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUsuario extends FormRequest
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
        $id = explode('/', request()->path(), 3)[1];
        $user = Usuario::findOrFail($id);
        return [
            'nombre' => ['required', 'regex:/^([a-zA-ZÁÉÍÓÚáéíóúñ ])+$/', 'min:2', 'max:32'],
            'apellido_paterno' => ['required', 'regex:/^([a-zA-ZÁÉÍÓÚáéíóúñ ])+$/', 'min:2', 'max:32'],
            'apellido_materno' => ['required', 'regex:/^([a-zA-ZÁÉÍÓÚáéíóúñ ])+$/', 'min:2', 'max:32'],
            'email' => 'required|email|unique:usuario,email,'.$user->id_usuario.',id_usuario',
            'username' => 'required|unique:usuario,username,'.$user->id_usuario.',id_usuario',
            'password' => 'min:6|max:32|confirmed',
            'foto' => 'image',
            'tipo' => 'required',
        ];
    }
}
