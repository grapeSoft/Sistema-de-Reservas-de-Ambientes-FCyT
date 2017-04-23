<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function __construct()
    {
    	//
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservas.inicio');
    }
}
