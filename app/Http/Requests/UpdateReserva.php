<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Model\Grupo;
use App\Model\TipoReserva;

class UpdateReserva extends FormRequest
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
        $rules = [
            'noAutorizado' => 'required',
        ];

        $minNroParticipantes = TipoReserva::where('tipo', 'examen')->first()->min_nro_participantes;
        $max_nro_periodos = TipoReserva::where('tipo', 'examen')->first()->max_nro_periodos;
        $ids_usuario_materia = $ids_usuario_materia = request()->input('ids_usuario_materias');
        $horas = request()->input('ids_horas');

        $condicionNroInscritos = $this->verificarNroInscritos($minNroParticipantes, $ids_usuario_materia);
        $condicionNroReservasMateria = $this->verificarNroReservasMateria();



            if(auth()->user()->esDocente()){
                if($condicionNroInscritos){
                    if(empty($condicionNroReservasMateria)) {
                        $rules = [
                        ];
                    }
                    else{
                        $rules = [
                            'nroReservas' => 'required',
                        ];
                    }
                }
                else{
                    $rules = [
                        'inscritos' => 'required',
                    ];
                }
            }
            //Si no es usuario autorizado
            else{
                $rules =  [
                    'descripcion' => 'required|min:4|max:64',
                ];
            }

        return $rules; //Unica regla requerida es ids_horas required xq ya se estan verificando las demas condiciones
    }

    private function verificarNroInscritos($minNroParticipantes, $ids_usuario_materia)
    {
        $totalInscritos = 0;
        $r = false;
        if($ids_usuario_materia !== null)
            foreach($ids_usuario_materia as $id)
                $totalInscritos += Grupo::findOrFail($id)->numero_inscritos;
        if($totalInscritos >= $minNroParticipantes)
            $r =true;
        return $r;
    }

    private function verificarNroReservasMateria(){
        $nroReservasMateria =TipoReserva::where('tipo', 'examen')->first()->numero_reservas_materias;
        $res = [];
        if(!$nroReservasMateria)
            return $res;

        $grupos=request()->input('ids_usuario_materias');
        if(!$grupos)
            $grupos=[];

        $usuario = auth()->user();
        $reservas = $usuario->reserva;
        $c=0;
        if($reservas)
            foreach($reservas as $reserva)
                foreach($reserva->eventos as $g1){
                    if(in_array($g1->grupo->id_usuario_materia,$grupos) && !in_array($g1->grupo->id_usuario_materia,$res)) {
                        foreach($reservas as $reserva1)
                            foreach ($reserva1->eventos as $g2) {
                                if (in_array($g2->grupo->id_usuario_materia, $grupos)) {
                                    if ($g2->grupo->id_usuario_materia === $g1->grupo->id_usuario_materia) {
                                        $c++;
                                    }
                                }
                            }
                    }
                    if($c>=$nroReservasMateria){
                        $res[]=$g1->grupo->id_usuario_materia;
                    }
                    $c=0;
                }
        return $res;
    }

    public function messages(){
        $valores = $this->verificarNroReservasMateria();
        $mensaje="";
        if($valores)
            foreach($valores as $valor){
                $materia = Grupo::find($valor)->materia->nombre;
                $mensaje.=  $materia. ", ";
            }
        return [
            'nroReservas.required' => 'No es posible realizar la reserva, debido a que existen reservas para las materias: '.$mensaje.
                'El numero maximo de reservas permitidas para una materia es: '
                .TipoReserva::where('tipo', 'examen')->first()->numero_reservas_materias,
        ];
    }
}
