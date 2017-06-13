<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function __construct()
    {
        $this->middleware('autentificado', [
            'only' => ['inicio',]
        ]);
    }

    public function inicio()
    {
        $usuario = auth()->user();
        return view('principal.inicio', compact('usuario'));
    }
}
