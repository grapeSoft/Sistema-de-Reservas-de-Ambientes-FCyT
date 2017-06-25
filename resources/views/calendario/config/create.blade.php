@extends('calendario.config.config')
@section('form-action')
    {!! Form::open(['route' => ['calendario.createConfig'],'method' => 'post','files' => true,'class' => 'form-horizontal']) !!}
    @include('calendario.config.form')
    {!! Form::close() !!}
@endsection