<?php

namespace App\Http\Requests;

use App\Model\Grupo;
use App\Model\Materia;
use App\Model\TipoReserva;
use Carbon\Carbon;
use App\Model\PeriodoExamen;
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
        $fecha_reserva = request()->input('id_fecha');
        $minNroParticipantes = TipoReserva::where('tipo', 'examen')->first()->min_nro_participantes;
        $max_nro_periodos = TipoReserva::where('tipo', 'examen')->first()->max_nro_periodos;
        $ids_usuario_materia = $ids_usuario_materia = request()->input('ids_usuario_materias');
        $horas = request()->input('ids_horas');
//        $nroReservasMateria = TipoReserva::where('tipo', 'examen')->first()->numero_reservas_materia;

        $condicionNroInscritos = $this->verificarNroInscritos($minNroParticipantes, $ids_usuario_materia);
        $condicionNroPeridos = $this->verificarNroPeriodos($max_nro_periodos, $horas);
        $condicionReservaContinua = $this->verificarReservaContinua($horas);
        $condicionReservaPeriodoExamen = $this->verificarReservaPeriodoExamen($fecha_reserva);
        $condicionNroReservasMateria = $this->verificarNroReservasMateria();


        if($condicionNroPeridos){
            if($condicionReservaContinua){
                if(auth()->user()->esDocente()){
                    if($condicionNroInscritos){
                        if(empty($condicionNroReservasMateria)) {
                            $rules = [
                                'ids_horas' => 'required',
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
                    if ($condicionReservaPeriodoExamen) {
                        $rules =  [
                            'reserva_aceptada' => 'required',
                            'ids_horas' => 'required',
                            'descripcion' => 'required|min:4|max:64',
                        ];
                    }
                    else{
                        $rules =  [
                            'ids_horas' => 'required',
                            'descripcion' => 'required|min:4|max:64',
                        ];
                    }
                }
            }
            else{
                $rules = [
                    'continuo' => 'required',
                ];
            }
        }
        else{
            $rules = [
                'periodos' => 'required',
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

    private function verificarNroPeriodos($max_nro_periodos, $horas){
        $c = 1;
        $r = true;
        if($horas!=null) {
            foreach ($horas as $h) {
                if ($c > $max_nro_periodos) {
                    $r = false;
                }
                $c++;
            }
        }
        return $r;
    }

    private function verificarReservaContinua($horas){
        $i = $horas[0];
        $c = 1;
        $r = true;
        if($horas!=null) {
            foreach ($horas as $h) {
                if ( !($h == $i)) {
                    $r = false;
                }
                $c++;
                $i++;
            }
        }
        return $r;
    }

    private function verificarReservaPeriodoExamen($fecha_reserva){
        $res = false;
        $fecha_reserva = Carbon::createFromFormat('Y-m-d', $fecha_reserva);
        $periodos_examen = PeriodoExamen::all();
        foreach ($periodos_examen as $periodo_examen) {
            $fechas_ini[] = Carbon::createFromFormat('Y-m-d', $periodo_examen->fecha_inicio);
            $fechas_fin[] = Carbon::createFromFormat('Y-m-d', $periodo_examen->fecha_fin);
        }
        if($fecha_reserva->between($fechas_ini[0], $fechas_fin[0]) || $fecha_reserva->between($fechas_ini[1], $fechas_fin[1])){
            $res = true;
        }
        else{
            $res = false;
        }
        return $res;
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
