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
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'email' => 'required|email|unique:usuario,email,'.$user->id_usuario.',id_usuario',
//            'email' => 'required|email|unique:usuario,email,'.request()->input('email').',email',
//            'email' => 'required|'.Rule::unique('usuario')->ignore(auth()->user()->id_usuario, 'id_usuario').',tipo,administrador',
            'username' => 'required|unique:usuario,username,'.$user->id_usuario.',id_usuario',
            'password' => 'min:6|confirmed',
            'foto' => 'image',
        ];
    }
}
