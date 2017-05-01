<?php

namespace App\Http\Controllers;

use App\Model\Evento;
use App\Model\Reserva;
use App\Model\Usuario;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function oferta($id)
    {
        $reserva = Reserva::findOrFail($id);
        $usuario = auth()->user();
        $materias = $usuario->materias;
        return view('eventos.create', compact('materias', 'id'));
    }

    public function almacenar($id, Request $request)
    {
        $reserva = Reserva::findOrFail($id);

        $ids_usuario_materias = $request->except('_token');

        foreach ($ids_usuario_materias as $id){
            $evento = new Evento();
            $evento->id_reserva = $id;
            $evento->id_usuario_materia = $id;
            $evento->save();
        }
        return redirect()->route('reservas.index')->with('mensaje', 'La reserva se ha creado con exito');;
    }
}
