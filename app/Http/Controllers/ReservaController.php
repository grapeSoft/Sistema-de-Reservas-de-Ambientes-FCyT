<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Reserva;
use App\Model\Ambiente;

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
        // $reservas = Reserva::getReservas()//reservas del usuario;
        // $reservas = null;
        // $usuarioAdmin = auth()->user();
        // $id_us = $usuarioAdmin->id_usuario;
        // $reservas = DB::table('USUARIO')
        //     ->join('reserva', 'USUARIO.id_usuario', '=', 'reserva.id_usuario')
        //     ->join('evento' , 'reserva.id_reserva', '=', 'evento.id_reserva')
        //     ->join('ambiente', 'evento.id_ambiente', '=', 'ambiente.id_ambiente')
        //     ->join('disponibilidad', 'ambiente.id_ambiente', '=', 'disponibilidad.id_ambiente')
        //     ->join('horario', 'disponibilidad.id_horario', '=', 'horario.id_horario')
        //     ->join('fecha', 'disponibilidad.id_fecha', '=', 'fecha.id_fecha')
        //     ->select('fecha.id_fecha', 'horario.hora_inicio', 'horario.hora_fin', 'reserva.id_reserva')
        //     ->where('USUARIO.id_usuario', '=', $id_us)
        //     ->get();
        return view('Reservas.index');
        
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
    public function store(Request $request)
    {
        echo "Reserva Almacenada";
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
                    ->join('USUARIO','reserva.id_usuario','=','USUARIO.id_usuario')                    
                    ->select('reserva.id_reserva', 'USUARIO.id_usuario', 'USUARIO.apellido_paterno', 'USUARIO.apellido_materno','USUARIO.email')
                     ->first(); 
        $materias= DB::table('usuario_materia')
                    ->join('USUARIO', 'usuario_materia.id_usuario','=','USUARIO.id_usuario') 
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

    public function horarios(Request $request)
    {
        $ambiente = $request->ambiente;
        $fecha = $request->fecha;
        $ambiente = Ambiente::findOrFail($ambiente);
        //dd($ambiente);
        $ambiente->setFecha($fecha);
        $horarios = $ambiente->horarios;
        return view('reservas.horarios', compact('horarios', 'ambiente', 'fecha'));
    }
}
