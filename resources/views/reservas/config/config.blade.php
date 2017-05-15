@extends('reservas.principal')

@section('contenido-principal')
    <div class="">
        <div class="panel-body">
            @if(session('mensaje'))
                <div class="alert alert-danger">
                    {{ session('mensaje') }}
                </div>
            @endif
            {!! Form::open([
                'route' => 'reservas.updateConfig',
                'method' => 'post',
                'files' => true,
                'class' => 'form-horizontal'
                ]) !!}

            <div class="form-group">
                {!! Form::label('tipo', 'Tipo', [
                    'class' => 'control-label col-md-4'
                ]) !!}
                <div class="col-md-7 col-md-offset-1">
                    {!! Form::select('tipo', [
                    'examen' => 'Examen',
					'congreso' => 'Congreso',
					'seminario'=> 'Seminario',
					'curso' => 'Cursos',
					'charla' => 'Charlas',
					'otro' => 'Otros',], null, ['class' => 'form-control'])!!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('numeroPeriodos', 'Numero de Periodos', ['class' => 'control-label col-md-4']) !!}
                <div class="col-md-7 col-md-offset-1">
                    {!! Form::number('numeroPeriodos', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('numeroParticipantes', 'Numero de Participantes', ['class' => 'control-label col-md-4']) !!}
                <div class="col-md-7 col-md-offset-1">
                    {!! Form::number('numeroParticipantes', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">
                    <b class="glyphicon glyphicon-new-window"></b> Aceptar
                </button>
            </div>

            {!! Form::close() !!}
        </div>
        @yield('contenido-create')
    </div>
@endsection