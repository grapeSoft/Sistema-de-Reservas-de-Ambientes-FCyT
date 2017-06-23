<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConfigCalendario;
use App\Http\Requests\UpdateConfigCalendario;
use App\Http\Requests\UpdateFeriado;
use App\Model\Calendario;
use App\Model\Fecha;
use App\Model\Horas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use App\Model\Reserva;
use App\Model\Usuario;
use App\Model\PeriodoExamen;
class CalendarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('autentificado', [
            'except' => ['login', 'logear', 'recuperarContrasea', 'enviarContrasea', ]
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::all();
        $eventosCalendario = array();
        foreach ($reservas as $key => $reserva){
            $id = $reserva->id_reserva;
            $usuario = $reserva->usuario;
            $eventos = $reserva->eventos;
            $title = $usuario->apellido_paterno.' '.$usuario->apellido_materno.' '.$usuario->nombre;
            $type = $eventos->first()->tipo;
            if($usuario->esAutorizado()){
                $descripcion = $reserva->eventos->first()->descripcion;
                $eventInfo = '<strong>Descripción: </strong>'.$descripcion;
            }
            if($usuario->esDocente()){
                $eventInfo = "";
                foreach ($eventos as $evento) {
                    $grupo = $evento->grupo->grupo;
                    $materia = $evento->grupo->materia->nombre;
                    $materiaGrupos[] = 'Materia: '.$materia.' '.' Grupo: '.$grupo;
                    if ($eventInfo === "") {
                        $eventInfo = '<strong>Materia: </strong>'.$materia.' '.'<strong>Grupo: </strong>'.$grupo;
                    }
                    $eventInfo = $eventInfo.'<br>'.'<strong>Materia: </strong>'.$materia.' '.'<strong>Grupo: </strong>'.$grupo;
                }
            }
            $start = $reserva->horarios->first()->pivot->id_fecha.' '.$reserva->horarios->first()->hora_inicio;
            $end = $reserva->horarios->first()->pivot->id_fecha.' '.$reserva->horarios->last()->hora_fin;
            $color = $this->colorRandom();

            $eventosCalendario[$key]["id"] = $id;
            $eventosCalendario[$key]['title'] = $title;
            $eventosCalendario[$key]['type'] = $type;
            $eventosCalendario[$key]['eventInfo'] = $eventInfo;
            $eventosCalendario[$key]['start'] = $start;
            $eventosCalendario[$key]['end'] = $end;
            $eventosCalendario[$key]['color'] = $color;
        }
        // Feriados
        $feriados = Fecha::where('tipo','feriado')->get();
        $feriadosArray = array();       
        foreach ($feriados as $key => $feriado) {
            $feriadosArray[$key]['title'] = $feriado->descripcion;
            $feriadosArray[$key]['start'] = $feriado->id_fecha;
            $feriadosArray[$key]['end'] = $feriado->id_fecha;
            $feriadosArray[$key]['rendering'] = 'background';
            $feriadosArray[$key]['color'] = '#FFCDD2';
            $feriadosArray[$key]['textColor'] = '#D50000';
        }
        // Gestion Academica (solo funciona para una gestion a la vez)
        $gestiones = Calendario::all();
        $gestionesIniArray = array();
        foreach ($gestiones as $key => $gestion) {
                $gestionesIniArray[$key]['title'] = 'Inicio de Gestión '.$gestion->gestion;
                $gestionesIniArray[$key]['start'] = $gestion->fecha_inicio;
                $gestionesIniArray[$key]['end'] = $gestion->fecha_inicio;
                $gestionesIniArray[$key]['rendering'] = 'background';
                $gestionesIniArray[$key]['color'] = '#C5CAE9';
                $gestionesIniArray[$key]['textColor'] = '#1A237E';
        }
        $gestionesFinArray = array();
        foreach ($gestiones as $key => $gestion) {
                $gestionesFinArray[$key]['title'] = 'Final de Gestión '.$gestion->gestion;
                $gestionesFinArray[$key]['start'] = $gestion->fecha_fin;
                $gestionesFinArray[$key]['end'] = $gestion->fecha_fin;
                $gestionesFinArray[$key]['rendering'] = 'background';
                $gestionesFinArray[$key]['color'] = '#C5CAE9';
                $gestionesFinArray[$key]['textColor'] = '#1A237E';
        }        
        // Periodos de Examen
        $examenes = PeriodoExamen::all();
        $examenesBackgroundrray = array();       
        foreach ($examenes as $key => $examen) {
            $examenesBackgroundrray[$key]['title'] = "";
            $examenesBackgroundrray[$key]['start'] = $examen->fecha_inicio;
            $examenesBackgroundrray[$key]['end'] = $examen->fecha_fin;
            $examenesBackgroundrray[$key]['rendering'] = 'background';
            $examenesBackgroundrray[$key]['color'] = '#C8E6C9';
        }
        $examenesIniArray = array();       
        foreach ($examenes as $key => $examen) {
            $examenesIniArray[$key]['title'] = 'Inicio '.$examen->nombre;
            $examenesIniArray[$key]['start'] = $examen->fecha_inicio;
            $examenesIniArray[$key]['end'] = $examen->fecha_inicio;
            $examenesIniArray[$key]['rendering'] = 'background';
            $examenesIniArray[$key]['color'] = '#C8E6C9';
            $examenesIniArray[$key]['textColor'] = '#1B5E20';
        }
        $examenesFinArray = array();       
        foreach ($examenes as $key => $examen) {
            $examenesFinArray[$key]['title'] = 'Fin '.$examen->nombre;
            $examenesFinArray[$key]['start'] = $examen->fecha_fin;
            $examenesFinArray[$key]['end'] = $examen->fecha_fin;
            $examenesFinArray[$key]['rendering'] = 'background';
            $examenesFinArray[$key]['color'] = '#C8E6C9';
            $examenesFinArray[$key]['textColor'] = '#1B5E20';
        }

        $eventosCalendarioFeriados = array_merge($eventosCalendario, $feriadosArray, $gestionesIniArray, $gestionesFinArray, $examenesBackgroundrray, $examenesIniArray, $examenesFinArray);  
        $datos = Collection::make($eventosCalendarioFeriados);
        return view('calendario.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function config()
    {
        $gestiones = Calendario::all();
        $gestion = null;
        return view('calendario.config.create', compact('gestiones', 'gestion'));
    }
    public function createConfig(StoreConfigCalendario $request)
    {
        $gestion = Calendario::create([
            'gestion' => $request->gestion,
            'fecha_inicio' => $request->fecha_inicial,
            'fecha_fin' => $request->fecha_final,
        ]);

        $fechaInicio = Carbon::createFromFormat('Y-m-d', $request->fecha_inicial, 'Etc/GMT-4');
        $fechaFin = Carbon::createFromFormat('Y-m-d', $request->fecha_final, 'Etc/GMT-4');
        $fechaActual = $fechaInicio;
        $fechaFin->addDay(1);

        $this->agregarFechas($fechaActual, $fechaFin, $gestion);

        $gestion->periodos()->create([
            'nombre' => "Primer Ciclo",
            'fecha_inicio' => $request->primer_parcial_ini,
            'fecha_fin' => $request->primer_parcial_fin,
        ]);

        $gestion->periodos()->create([
            'nombre' => "Segundo Ciclo",
            'fecha_inicio' => $request->segundo_parcial_ini,
            'fecha_fin' => $request->segundo_parcial_fin,
        ]);

        return redirect()->route('calendario.index')->with('mensaje', 'Se ha configurado correctamente el calendario academico');
    }

    public function updateConfig(UpdateConfigCalendario $request, $id){
        $gestion = Calendario::findOrFail($id);
        $fechaInicioAnterior = Carbon::createFromFormat('Y-m-d', $gestion->fecha_inicio, 'Etc/GMT-4');
        $fechaFinAnterior = Carbon::createFromFormat('Y-m-d', $gestion->fecha_fin, 'Etc/GMT-4');

        $fechaInicio = Carbon::createFromFormat('Y-m-d', $request->fecha_inicial, 'Etc/GMT-4');
        $fechaFin = Carbon::createFromFormat('Y-m-d', $request->fecha_final, 'Etc/GMT-4');
        $fechaActual = null;
        $fecha = null;
        $reservas = false;
        $fechaVerificacion = null;

        if($fechaInicio>$fechaInicioAnterior){
            $fechaVerificacion = clone $fechaInicioAnterior;
            $fecha = Fecha::find($fechaVerificacion->toDateString());
            while($fechaVerificacion<$fechaInicio && !$reservas){
                if(!$fechaVerificacion->isSunday() && $fecha) {
                    if ($fecha->reservas->first()) {
                        $reservas = true;
                    }
                }
                $fechaVerificacion->addDay(1);
                $fecha = Fecha::find($fechaVerificacion->toDateString());
            }
        }

        if($fechaFin<$fechaFinAnterior){
            $fechaVerificacion = clone $fechaFin;
            $fechaVerificacion->addDay(1);
            $fecha = Fecha::find($fechaVerificacion->toDateString());
            while($fechaVerificacion<=$fechaFinAnterior && !$reservas){
                if(!$fechaVerificacion->isSunday() && $fecha) {
                    if ($fecha->reservas->first()) {
                        $reservas = true;
                    }
                }
                $fechaVerificacion->addDay(1);
                $fecha = Fecha::find($fechaVerificacion->toDateString());
            }
        }

        if($reservas){
            return redirect()->back()->with('mensaje', 'No es posible editar la gestion debido a que existen reservas almacenadas');
        }

        $gestion->update([
            'fecha_inicio' => $request->fecha_inicial,
            'fecha_fin' => $request->fecha_final,
        ]);

        $gestion->primerCiclo()->update([
            'fecha_inicio' => $request->primer_parcial_ini,
            'fecha_fin' => $request->primer_parcial_fin,
        ]);

        $gestion->segundoCiclo()->update([
            'fecha_inicio' => $request->segundo_parcial_ini,
            'fecha_fin' => $request->segundo_parcial_fin,
        ]);

        if($fechaInicio>$fechaInicioAnterior){
            $fechaActual= clone $fechaInicioAnterior;
            $this->borrarFechas($fechaActual, $fechaInicio, $gestion);
        }
        if($fechaFin<$fechaFinAnterior){
            $fechaActual= clone $fechaFin;
            $fechaActual->addDay(1);
            $fechaCopia = clone $fechaFinAnterior;
            $fechaCopia->addDay(1);
            $this->borrarFechas($fechaActual, $fechaCopia, $gestion);
        }
        if($fechaInicio<$fechaInicioAnterior){
            $fechaActual= clone $fechaInicio;
            if($fechaFin<$fechaInicioAnterior){
                $fechaFin->addDay(1);
                $this->agregarFechas($fechaActual, $fechaFin, $gestion);
            }
            else {
                $this->agregarFechas($fechaActual, $fechaInicioAnterior, $gestion);
            }
        }
        if($fechaFin>$fechaFinAnterior){
            if($fechaInicio>$fechaFinAnterior){
                $fechaActual = clone $fechaInicio;
            }
            else {
                $fechaActual = clone $fechaFinAnterior;
                $fechaActual->addDay(1);
            }
            $fechaCopia = clone $fechaFin;
            $fechaCopia->addDay(1);
            $this->agregarFechas($fechaActual, $fechaCopia, $gestion);
        }

        return redirect()->route('calendario.index')->with('mensaje', 'Se ha actualizado correctamente la configuracion del calendario academico');
    }

    public function editConfig($id){
        $gestiones = Calendario::all();
        $gestion = Calendario::findOrFail($id);
        return view('calendario.config.edit', compact('gestion', 'gestiones'));
    }

    public function deleteConfig($id){
        $gestion = Calendario::findOrFail($id);
        $inicio = Carbon::createFromFormat('Y-m-d', $gestion->fecha_inicio, 'Etc/GMT-4');
        $fin = Carbon::createFromFormat('Y-m-d', $gestion->fecha_fin, 'Etc/GMT-4');

        $inicioGestion = clone $inicio;
        $finGestion = clone $fin;
        $fechaActual = clone $inicioGestion;
        $fecha=null;
        $reservas=false;

        while(!$reservas && $fechaActual<=$finGestion){
            $fecha = Fecha::find($fechaActual->toDateString());
            if(!$fechaActual->isSunday() && $fecha) {
                if ($fecha->reservas->first()) {
                    $reservas = true;
                }
            }
            $fechaActual->addDay(1);
        }
        if($reservas){
            return redirect()->back()->with('mensaje', 'No es posible eliminar la gestion debido a que existen reservas almacenadas');
        }
        else{
            $fin->addDay(1);
            $this->borrarFechas($inicio, $fin, $gestion);
            PeriodoExamen::where('id_calendario', $gestion->id_calendario)->delete();
            $gestion->delete();
            return redirect()->route('calendario.index')->with('mensaje', 'Se ha eliminado correctamente la gestion');
        }
    }

    private function agregarFechas($inicio, $fin, $calendario){
        while($inicio < $fin ){
            if(!$inicio->isSunday()) {
                $fecha = $calendario->fechas()->Create([
                    'id_fecha' => $inicio->toDateString(),
                    'tipo' => "Normal",
                ]);
                foreach(Horas::all() as $hora) {
                    $fecha->horas()->attach($hora->id_horas, ['id_ambiente' => 1, 'estado' => "Libre"]);
                }
            }
            $inicio->addDay(1);
        }
    }

    private function borrarFechas($inicio, $fin, $gestion){
        $fecha=Fecha::find($inicio->toDateString());
        while($inicio<$fin){
            if(!$inicio->isSunday() && $fecha) {
                $fecha->horas()->detach();
                $fecha->delete();
            }
            $inicio->addDay(1);
            $fecha = Fecha::find($inicio->toDateString());
        }
    }

    public function colorRandom()
    {
        $materialColors = array("#F44336", "#E91E63", "#9C27B0", "#673AB7", "#3F51B5", "#2196F3", "#03A9F4", "#00BCD4", "#009688", "#4CAF50", "#558B2F", "#9E9D24", "#FF9800", "#FF5722", "#795548", "#616161", "#607D8B");
        $indice = array_rand($materialColors, 1);
        return $materialColors[$indice];
    }
}
