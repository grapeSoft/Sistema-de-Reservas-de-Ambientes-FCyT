<?php

namespace App\Http\Requests;

use App\Model\Grupo;
use Illuminate\Foundation\Http\FormRequest;

class StoreReserva extends FormRequest
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
        $totalIncritos = 0;
        if(auth()->user()->esDocente()){
            $ids_usuario_materia = request()->input('ids_usuario_materias');
            if($ids_usuario_materia !== null)
                foreach($ids_usuario_materia as $id)
                    $totalIncritos += Grupo::findOrFail($id)->numero_inscritos;
        }
        else
            $totalIncritos=50;

        $horas = request()->input('ids_horas');
        $b = true;
        $i = $horas[0];
        if($horas!=null)
            foreach ($horas as $h){
                if(!($h == $i))
                {
                    $b = false;
                }
                $i++;
            }
        if($b && $totalIncritos>=50){
            return [
                'ids_horas' => 'required|between:1,2',
            ];
        }
        else{
            return [
                'noAutorizado' => 'required',
            ];
        }
    }
}
