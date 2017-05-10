<?php

namespace App\Http\Controllers;
use App\Http\Requests\HorariosReserva;
use App\Http\Requests\StoreReserva;
use App\Model\Fecha;
use App\Model\Horario;
use Illuminate\Http\Request;
use App\Model\Reserva;
use App\Model\Ambiente;
use App\Model\Evento;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$reservas = Reserva::getReservas()//reservas del usuario;
        $reservas = null;
        $usuarioAdmin = auth()->user();
        $id_us = $usuarioAdmin->id_usuario;
        //$reservas = Reserva::findOrFail($id_us);
        $reservas = DB::table('USUARIO')
            ->join('reserva', 'USUARIO.id_usuario', '=', 'reserva.id_usuario')
            ->join('horario' , 'reserva.id_reserva', '=', 'horario.id_reserva')
            ->join('horas', 'horario.id_horas', '=', 'horas.id_horas')
            ->select('horario.id_fecha', 'horas.hora_inicio', 'horas.hora_fin', 'reserva.id_reserva')
            ->where('USUARIO.id_usuario', '=', $id_us)
            ->get();
        return view('reservas.index', compact('reservas'));  
       /* $usuario = auth()->user();
        $reservas = $usuario->reserva;
        return $reservas;*/       
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
    

        $reservas= DB::table('reserva')
                    ->where('reserva.id_reserva','=',$id)
                    ->join('USUARIO','reserva.id_usuario','=','USUARIO.id_usuario') 
                    ->join('evento','reserva.id_reserva' ,'=','evento.id_reserva')                   
                    ->select('reserva.id_reserva','USUARIO.nombre', 'USUARIO.id_usuario', 'USUARIO.apellido_paterno', 'USUARIO.apellido_materno',
                        'USUARIO.email','evento.tipo','evento.descripcion')
                    ->first(); 
        $materias= DB::table('reserva')
                    ->where('reserva.id_reserva','=',$id)
                    ->join('USUARIO','reserva.id_usuario','=','USUARIO.id_usuario') 
                    ->join('usuario_materia','USUARIO.id_usuario','=','usuario_materia.id_usuario')
                    ->join('materia', 'usuario_materia.id_usuario_materia','=','materia.id_materia')                   
                    ->select('materia.nombre','usuario_materia.grupo')
                    ->get()->toArray();                    
                     
          return view('reservas.vista.view', compact('reservas','materias'));
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
            $evento = $eventos->first();
            return view('reservas.edit.edit', compact('evento'));
        }
        if(auth()->user()->esDocente()){
            $evento = $eventos->first();//borrar
            return view('reservas.edit.edit', compact('evento'));
        }      
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
        if(auth()->user()->esAutorizado()){
            $evento = Evento::findOrFail($id);
            $evento->fill($request->all());
            $evento->save();
        }
        if(auth()->user()->esDocente()){
            //
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
        return "eliminando reserva: ".$id;
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
}
