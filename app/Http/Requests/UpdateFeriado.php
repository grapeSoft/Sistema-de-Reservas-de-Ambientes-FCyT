<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeriado extends FormRequest
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
            'fecha' => 'required|date|exists:fecha,id_fecha',
            'titulo' => 'required',
        ];
    }

    public function messages(){
        return [
            'fecha.exists' => 'La fecha no es valida, debe configurar previamente una gestion para poder configurar el feriado',
        ];
    }
}
