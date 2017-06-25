<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreConfigCalendario extends FormRequest
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
        $fecha=null;
        if(request()->input('fecha_inicial'))
            $fecha = Carbon::createFromFormat('Y-m-d', request()->input('fecha_inicial'), 'Etc/GMT-4')->addYear();

        return [
            'gestion' => ['required', 'unique:calendario,gestion', 'regex:/^[1-2]-201[7-9]$|^[1-2]-20[2-9][0-9]$/'],
            'fecha_inicial' => 'required|date|before:fecha_final|unique:fecha,id_fecha',
            'fecha_final' => 'required|date|after:fecha_inicial|before:'.$fecha.'|unique:fecha,id_fecha',
            'primer_parcial_ini' => 'required|date|before:primer_parcial_fin|after:fecha_inicial',
            'primer_parcial_fin' => 'required|date|before:segundo_parcial_ini|after:primer_parcial_ini',
            'segundo_parcial_ini' => 'required|date|before:segundo_parcial_fin|after:primer_parcial_fin',
            'segundo_parcial_fin' => 'required|date|before_or_equal:fecha_final|after:segundo_parcial_ini',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'fecha_inicial.unique' => 'La fecha no es valida, ya existe una gestion configurada para esa fecha',
            'fecha_final.unique'  => 'La fecha no es valida, ya existe una gestion configurada para esa fecha',
        ];
    }
}

