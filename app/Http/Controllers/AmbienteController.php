<?php

namespace App\Http\Controllers;

use App\Model\Ambiente;
use Illuminate\Http\Request;

class AmbienteController extends Controller
{
    public function horarios($id_ambiente, $fecha)
    {
        $ambiente = Ambiente::findOrFail($id_ambiente);
        $ambiente->setFecha($fecha);
        $horarios = $ambiente->horarios;
        return view('reservas.horarios', compact('horarios'));
    }
}
