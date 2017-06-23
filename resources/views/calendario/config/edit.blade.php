@extends('calendario.config.config')
@section('form-action')
    {!! Form::model($gestion, [
					'route' => ['calendario.updateConfig', $gestion->id_calendario],
					'method' => 'put',
					'files' => true,
					'class' => 'form-horizontal'
    ]) !!}
    @include('calendario.config.form')
    {!! Form::close() !!}
@endsection