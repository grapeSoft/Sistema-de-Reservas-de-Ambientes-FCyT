<?php

namespace App\Http\Controllers;
use App\Http\Requests\HorariosReserva;
use App\Http\Requests\StoreReserva;
use App\Http\Requests\UpdateReserva;
use App\Model\Fecha;
use App\Model\Horario;
use App\Model\TipoReserva;
use Illuminate\Http\Request;
use App\Model\Reserva;
use App\Model\Ambiente;
use App\Model\Evento;
use Illuminate\Support\Facades\DB;
use App\Model\Usuario;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;

class ReservaController extends Controller
{
    public function __construct()
    {
        $this->middleware('autentificado', [
            'except' => ['login', 'logear', 'recuperarContrasea', 'enviarContrasea', ]
        ]);
    }

    public function index()
    {
        if(auth()->user()->esAdministrador()){

            $reservas = Reserva::paginate(7);
            

            return view('reservas.admin.index', compact('reservas'));
        }
        $usuario = auth()->user();
        $reservas = $usuario->reserva;
        return view('reservas.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservas.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReserva $request)
    {
        $reserva = new Reserva();
        $reserva->id_usuario = auth()->user()->id_usuario;
        $reserva->save();

        $ambiente = Ambiente::findOrFail(1);
        $ambiente->setFecha($request->id_fecha);
        $ids_horas = $request->ids_horas;
        foreach ($ids_horas as $id){
            $ambiente->horarios()->updateExistingPivot($id,['id_reserva' => $reserva->id_reserva , 'estado' => 'Ocupado' ]);
        }

        
        if(auth()->user()->esAutorizado()){
            $evento = new Evento();
            $evento->id_reserva = $reserva->id_reserva;
            $evento->tipo=$request->tipo;
            $evento->descripcion=$request->descripcion;
            $evento->save();
        }

        if(auth()->user()->esDocente()){
            $ids_usuario_materias = $request->ids_usuario_materias;
            foreach ($ids_usuario_materias as $id1){
                $evento = new Evento;
                $evento->id_reserva = $reserva->id_reserva;
                $evento->tipo="Examen";
                $evento->id_usuario_materia = $id1;
                $evento->save();
            }
        }
        return redirect()->route('reservas.index')
        ->with('mensaje', 'La reserva se ha creado con exito');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
         $eventos= DB::table('evento')
                    ->where('evento.id_reserva','=',$id)
                    ->join('usuario_materia','evento.id_usuario_materia','=','usuario_materia.id_usuario_materia')          
                    ->join('materia','usuario_materia.id_materia' ,'=','materia.id_materia')  
                                    
                    ->select('evento.tipo','evento.descripcion','materia.nombre','usuario_materia.grupo','evento.id_reserva')
                    ->get()->toArray(); 

         $datosUsuario= DB::table('evento')
                         ->where('evento.id_reserva','=',$id)
                         ->join('reserva','evento.id_reserva','=','reserva.id_reserva')
                         ->join('usuario','reserva.id_usuario','=','usuario.id_usuario')
                         ->select('usuario.nombre','usuario.email','usuario.id_usuario','usuario.apellido_paterno','usuario.apellido_materno','usuario.tipo')
                         ->first();

       




         $eventosAutorizado=  DB::table('evento')
                                ->where('evento.id_reserva','=',$id)
                                ->select('evento.tipo','evento.descripcion','evento.id_reserva')
                                ->first(); 
                                

        if(auth()->user()->esAdministrador()){
            return view('reservas.vista.view-admin', compact('eventos','eventosAutorizado','datosUsuario'));
        }                
                     
        return view('reservas.vista.view', compact('eventos','eventosAutorizado','datosUsuario'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserva = Reserva::findOrFail($id);
        $eventos = $reserva->eventos;


        if(auth()->user()->esAutorizado()){
            return view('reservas.edit.edit', compact('eventos'));
        }
        if(auth()->user()->esDocente()){
            $usuario = auth()->user();
            $materias = $usuario->materias;
            return view('reservas.edit.edit', compact('eventos'), compact('materias'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReserva $request, $id)
    {   
        if(auth()->user()->esAutorizado()){
            $evento = Evento::findOrFail(Reserva::findOrFail($id)->eventos->first()->id_evento);
            $evento->fill($request->all());
            $evento->save();
        }
        if(auth()->user()->esDocente()){
            $ids_usuario_materias = $request->ids_usuario_materias;
            $borrado = Evento::where('id_reserva', $id )->delete();

            foreach ($ids_usuario_materias as $id1){
                $evento = new Evento;
                $evento->id_reserva = $id;
                $evento->id_usuario_materia = $id1;
                $evento->save();
            }
        }   
        return redirect()->route('reservas.index')
        ->with('mensaje', 'La reserva se ha modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $eventos = $reserva->eventos;
        $horarios = $reserva->horarios;
        //liberando horarios reservados
        foreach ($horarios as $horario){
            $id_hora = $horario->id_horas;
            $reserva->horarios()->updateExistingPivot($id_hora,['id_reserva' => NULL, 'estado' => 'Libre' ]);
        }
        //borrando eventos (1)->para autorizado (n)->para docente
        foreach ($eventos as $evento){
          //borrando evento
          $evento->delete();
        }
        //borrando reserva
        $reserva->delete();
        return redirect()->route('reservas.index')
            ->with('mensaje', 'Se ha eliminado la reserva');
    }

    public function horarios(HorariosReserva $request)
    {
        $ambiente = $request->ambiente;
        $fecha = $request->fecha;
        $ambiente = Ambiente::findOrFail($ambiente);
        $ambiente->setFecha($fecha);
        $horarios = $ambiente->horarios;
        $usuario = auth()->user();
        $materias = $usuario->materias;
        return view('reservas.horarios', compact('horarios', 'ambiente', 'fecha', 'materias'));
    }

    public function config(){
        return view('reservas.admin.config.config');
    }

    public function updateConfig(Request $request){
        $this->validate($request, [
            'tipo' => 'required',
            'numeroPeriodos' => 'required|numeric|min:1|max:10',
            'numeroParticipantes' => 'required|numeric|min:25|max:500',
        ]);
        $tipo_reserva = TipoReserva::updateOrCreate(
            ['tipo' => $request->tipo],
            ['max_nro_periodos' => $request->numeroPeriodos,
             'min_nro_participantes' => $request->numeroParticipantes,
            ]
        );
        return redirect()
            ->route('reservas.index')
            ->with('mensaje', 'Se ha cofigurado la reserva');
    }

    public function filtrado(Request $request){

        $reservas = null;
        $fecha_ini = null;
        $fecha_fin = null;
        $hora_ini = null;
        $hora_fin = null;

        if ($request->nombre) {
            $nombre = $request->nombre;

            if ($request->filtrado) {
                //dd($request->fecha_inicial);

                if ( $request->fecha_inicial != null && $request->fecha_final != null ) {

                    $fecha_ini = $request->fecha_inicial;
                    $fecha_fin = $request->fecha_final;
                    
                    if ( strtotime($fecha_ini) <= strtotime($fecha_fin) ) {

                        if ($request->hora_inicial != "00:00:00" && $request->hora_final != "24:00:00") {
                            
                            $hora_ini = $request->hora_inicial;
                            $hora_fin = $request->hora_final;

                            if ( strtotime($hora_ini) <= strtotime($hora_fin) ) {
                                
                                $nombre = $request->nombre;
                                $usuarios = Usuario::where('nombre', 'LIKE', '%'.$nombre.'%')
                                    ->orWhere('apellido_paterno', 'LIKE', '%'.$nombre.'%')
                                    ->orWhere('apellido_materno', 'LIKE', '%'.$nombre.'%')
                                    ->get();
                                //dd($res);

                                foreach ($usuarios as $usuario) {

                                    foreach ($usuario->reserva as $reserva) {
                                        
                                        $start_ts = strtotime($fecha_ini);
                                        $end_ts = strtotime($fecha_fin);
                                        $fecha_actual = $reserva->horarios->first()->pivot->id_fecha;
                                        $user_ts = strtotime($fecha_actual);

                                        $start_time = strtotime($hora_ini);
                                        $end_time = strtotime($hora_fin);
                                        $hora_actual_inicio = $reserva->horarios->first()->hora_inicio;
                                        $hora_actual_final = $reserva->horarios->last()->hora_fin;
                                        $user_ts_ini = strtotime($hora_actual_inicio);
                                        $user_ts_fin = strtotime($hora_actual_final);

                                        if ( ( $user_ts >= $start_ts) && ($user_ts <= $end_ts) && ( $user_ts_ini >= $start_time) && ($user_ts_fin <= $end_time) ) {
                                            
                                            $reservas[] = $reserva;
                                        }
                                    }
                                }
                                
                            }else{

                                //dd($reservas);
                                $horanovalida = "error";
                                return view('reservas.admin.index', compact('nombre', 'fecha_ini', 'fecha_fin', 'hora_ini', 'hora_fin', 'horanovalida'));
                            }
                            
                        }else{

                            $nombre = $request->nombre;
                            $usuarios = Usuario::where('nombre', 'LIKE', '%'.$nombre.'%')
                                ->orWhere('apellido_paterno', 'LIKE', '%'.$nombre.'%')
                                ->orWhere('apellido_materno', 'LIKE', '%'.$nombre.'%')
                                ->get();


                            foreach ($usuarios as $usuario) {

                                foreach ($usuario->reserva as $reserva) {
                                        
                                    $start_ts = strtotime($fecha_ini);
                                    $end_ts = strtotime($fecha_fin);
                                    $fecha_actual = $reserva->horarios->first()->pivot->id_fecha;
                                    $user_ts = strtotime($fecha_actual);

                                    if ( ( $user_ts >= $start_ts) && ($user_ts <= $end_ts) ) {
                                            
                                        $reservas[] = $reserva;
                                    }
                                }
                            }
                        }
                    
                    }else{

                        $fechanovalida = "error";
                        return view('reservas.admin.index', compact('nombre', 'fecha_ini', 'fecha_fin', 'fechanovalida'));
                    }

                }else{

                    if ($request->hora_inicial != "00:00:00" && $request->hora_final != "24:00:00") {
                            
                            $hora_ini = $request->hora_inicial;
                            $hora_fin = $request->hora_final;

                            if ( strtotime($hora_ini) <= strtotime($hora_fin) ) {
                                
                                $nombre = $request->nombre;
                                $usuarios = Usuario::where('nombre', 'LIKE', '%'.$nombre.'%')
                                    ->orWhere('apellido_paterno', 'LIKE', '%'.$nombre.'%')
                                    ->orWhere('apellido_materno', 'LIKE', '%'.$nombre.'%')
                                    ->get();
                                //dd($res);

                                foreach ($usuarios as $usuario) {

                                    foreach ($usuario->reserva as $reserva) {

                                        $start_time = strtotime($hora_ini);
                                        $end_time = strtotime($hora_fin);
                                        $hora_actual_inicio = $reserva->horarios->first()->hora_inicio;
                                        $hora_actual_final = $reserva->horarios->last()->hora_fin;
                                        $user_ts_ini = strtotime($hora_actual_inicio);
                                        $user_ts_fin = strtotime($hora_actual_final);

                                        if ( ($user_ts_ini >= $start_time) && ($user_ts_fin <= $end_time) ) {
                                            
                                            $reservas[] = $reserva;
                                        }
                                    }
                                }
                                //dd($reservas);
                            }else{

                                $horanovalida = "error";
                                return view('reservas.admin.index', compact('nombre', 'hora_ini', 'hora_fin', 'horanovalida'));
                            }
                            
                    }else{

                        $nombre = $request->nombre;
                        $usuarios = Usuario::where('nombre', 'LIKE', '%'.$nombre.'%')
                            ->orWhere('apellido_paterno', 'LIKE', '%'.$nombre.'%')
                            ->orWhere('apellido_materno', 'LIKE', '%'.$nombre.'%')
                            ->get();

                        
                        foreach ($usuarios as $usuario) {
                            foreach ($usuario->reserva as $reserva) {
                                $reservas[] = $reserva;
                            }
                        }
                    }
                    
                }

            } else {

                $nombre = $request->nombre;
                $usuarios = Usuario::where('nombre', 'LIKE', '%'.$nombre.'%')
                    ->orWhere('apellido_paterno', 'LIKE', '%'.$nombre.'%')
                    ->orWhere('apellido_materno', 'LIKE', '%'.$nombre.'%')
                    ->get();

                
                foreach ($usuarios as $usuario) {
                    foreach ($usuario->reserva as $reserva) {
                        $reservas[] = $reserva;
                    }
                }

                //dd($reservas);
                
            }

            
            if ($reservas != null) {
                $paginate = 10;

                $page = Input::get('page', 1);

                

                $offSet = ($page * $paginate) - $paginate;  

                $itemsForCurrentPage = array_slice($reservas, $offSet, $paginate, true);  

                $reservas = new LengthAwarePaginator($itemsForCurrentPage, count($reservas), 10, $page);

                
                
                
                return view('reservas.admin.index', compact('reservas', 'nombre', 'fecha_ini', 'fecha_fin', 'hora_ini', 'hora_fin'));
            
            }else{
                
                return view('reservas.admin.index', compact('nombre', 'fecha_ini', 'fecha_fin', 'hora_ini', 'hora_fin'));
                
            }
            
        } else {

            if ($request->filtrado) {
                if ( $request->fecha_inicial != null && $request->fecha_final != null ) {

                    $fecha_ini = $request->fecha_inicial;
                    $fecha_fin = $request->fecha_final;
                    
                    if ( strtotime($fecha_ini) <= strtotime($fecha_fin) ) {

                        if ($request->hora_inicial != "00:00:00" && $request->hora_final != "24:00:00") {
                            
                            $hora_ini = $request->hora_inicial;
                            $hora_fin = $request->hora_final;

                            if ( strtotime($hora_ini) <= strtotime($hora_fin) ) {
                                
                                $reservas1 = Reserva::all();

                                foreach ($reservas1 as $reserva) {
                                        
                                        $start_ts = strtotime($fecha_ini);
                                        $end_ts = strtotime($fecha_fin);
                                        $fecha_actual = $reserva->horarios->first()->pivot->id_fecha;
                                        $user_ts = strtotime($fecha_actual);

                                        $start_time = strtotime($hora_ini);
                                        $end_time = strtotime($hora_fin);
                                        $hora_actual_inicio = $reserva->horarios->first()->hora_inicio;
                                        $hora_actual_final = $reserva->horarios->last()->hora_fin;
                                        $user_ts_ini = strtotime($hora_actual_inicio);
                                        $user_ts_fin = strtotime($hora_actual_final);

                                        if ( ( $user_ts >= $start_ts) && ($user_ts <= $end_ts) && ( $user_ts_ini >= $start_time) && ($user_ts_fin <= $end_time) ) {
                                            
                                            $reservas[] = $reserva;
                                        }
                                    }
                                //dd($reservas);
                            }else{

                                $horanovalida = "error";
                                return view('reservas.admin.index', compact('hora_ini', 'hora_fin', 'horanovalida'));
                            }
                            
                        }else{

                            $reservas1 = Reserva::all();

                                foreach ($reservas1 as $reserva) {
                                        
                                        $start_ts = strtotime($fecha_ini);
                                        $end_ts = strtotime($fecha_fin);
                                        $fecha_actual = $reserva->horarios->first()->pivot->id_fecha;
                                        $user_ts = strtotime($fecha_actual);

                                        if ( ( $user_ts >= $start_ts) && ($user_ts <= $end_ts) ) {
                                            
                                            $reservas[] = $reserva;
                                        }
                                    }
                        }
                    
                    }else{

                        $fechanovalida = "error";
                        return view('reservas.admin.index', compact('fecha_ini', 'fecha_fin', 'fechanovalida'));
                    }

                }else{

                    if ($request->hora_inicial != "00:00:00" && $request->hora_final != "24:00:00") {
                            
                            $hora_ini = $request->hora_inicial;
                            $hora_fin = $request->hora_final;

                            if ( strtotime($hora_ini) <= strtotime($hora_fin) ) {

                                $reservas1 = Reserva::all();
                                
                                foreach ($reservas1 as $reserva) {
                                        
                                        $start_time = strtotime($hora_ini);
                                        $end_time = strtotime($hora_fin);
                                        $hora_actual_inicio = $reserva->horarios->first()->hora_inicio;
                                        $hora_actual_final = $reserva->horarios->last()->hora_fin;
                                        $user_ts_ini = strtotime($hora_actual_inicio);
                                        $user_ts_fin = strtotime($hora_actual_final);

                                        if ( ( $user_ts_ini >= $start_time) && ($user_ts_fin <= $end_time) ) {
                                            
                                            $reservas[] = $reserva;
                                        }
                                    }
                                //dd($reservas);
                            }else{

                                $horanovalida = "error";
                                return view('reservas.admin.index', compact('hora_ini', 'hora_fin', 'horanovalida'));
                            }
                            
                    }else{

                        $reservas = Reserva::paginate(7);
                        return view('reservas.admin.index', compact('reservas'));
                    }
                    
                }

            }else{

                $reservas = Reserva::paginate(7);
                return view('reservas.admin.index', compact('reservas'));
            }

            if ($reservas != null) {
                $paginate = 10;

                $page = Input::get('page', 1);

                

                $offSet = ($page * $paginate) - $paginate;  

                $itemsForCurrentPage = array_slice($reservas, $offSet, $paginate, true);  

                $reservas = new LengthAwarePaginator($itemsForCurrentPage, count($reservas), 10, $page);

                
                
                
                return view('reservas.admin.index', compact('reservas', 'fecha_ini', 'fecha_fin', 'hora_ini', 'hora_fin'));
            
            }else{
                
                return view('reservas.admin.index', compact('fecha_ini', 'fecha_fin', 'hora_ini', 'hora_fin'));
                
            }

            
        }
        
    }

/*    public function crearpdf($id)
    {
        
        $eventos= DB::table('evento')
            ->where('evento.id_reserva','=',$id)
            ->join('usuario_materia','evento.id_usuario_materia','=','usuario_materia.id_usuario_materia')          
            ->join('materia','usuario_materia.id_materia' ,'=','materia.id_materia')  
            ->select('evento.tipo','evento.descripcion','materia.nombre','usuario_materia.grupo')
            ->get()->toArray(); 

        $datosUsuario= DB::table('evento')
            ->where('evento.id_reserva','=',$id)
            ->join('reserva','evento.id_reserva','=','reserva.id_reserva')
            ->join('USUARIO','reserva.id_usuario','=','USUARIO.id_usuario') 
            ->select('USUARIO.nombre','USUARIO.email','USUARIO.id_usuario','USUARIO.apellido_paterno','USUARIO.apellido_materno','USUARIO.tipo')
            ->first();
        
        $eventosAutorizado=  DB::table('evento')
            ->where('evento.id_reserva','=',$id)
            ->select('evento.tipo','evento.descripcion')
            ->first(); 

        if(auth()->user()->esAutorizado()){
            $view=\View::make('reservas.vista.autorizado', compact('eventos','eventosAutorizado','datosUsuario'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
            return $pdf->stream();
        }
        if(auth()->user()->esDocente()){
            $view=\View::make('reservas.vista.docente', compact('eventos','eventosAutorizado','datosUsuario'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
            return $pdf->stream();
        }
    }*/
}
