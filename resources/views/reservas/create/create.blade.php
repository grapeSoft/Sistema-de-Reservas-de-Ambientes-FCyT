@extends('plantillas.principal')

@section('contenido')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Crear Reserva</h4>
                </div>
                <div class="panel-body">
                    {!! Form::open([
						'route' => ['reservas.horarios'],
					    'method' => 'get',
						'files' => true,
						]) !!}

                    <div class="form-group">
                        {!! Form::label('ambiente', 'Ambiente', [
                            'class' => 'control-label col-md-2'
                        ]) !!}
                        <div class="col-md-10">
                            {!! Form::select('ambiente', ['1' => 'Auditorio',],
                            null,
                            ['class' => 'form-control', 'onchange' => "this.form.submit()"])
                            !!}
                        </div>
                        {!! Form::label('fecha', 'Fecha', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-10">
                            {{--{!! Form::text('nombre', null, ['class' => 'form-control']) !!}--}}
                            @if(empty($fecha))
                                {!! Form::date('fecha', null, ['class' => 'form-control', 'onchange' => "this.form.submit()"]) !!}
                            @else
                                {!! Form::date('fecha', $fecha, ['class' => 'form-control', 'onchange' => "this.form.submit()"]) !!}
                            @endif
                        </div>
                    </div>
                    {!! Form::close() !!}

                    @yield('content')

                </div>
                <div class="panel-footer">
                    <div class="btn-group">
                        <div>
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#formularioReserva">Siguiente</button>
                        </div>
                    </div>
                    @include('reservas.formularios.form')
                </div>
            </div>
        </div>
    </div>
@endsection