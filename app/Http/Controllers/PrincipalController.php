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
        return view('principal.inicio');
    }
}
