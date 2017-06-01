@extends('plantillas.menu-aut')
@section('menu')
<li><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
<li><a href="{{ route('calendario.index') }}">Calendario</a></li>
@endsection