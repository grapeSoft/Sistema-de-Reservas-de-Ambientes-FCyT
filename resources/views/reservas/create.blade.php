@extends('plantillas.principal')

@section('contenido')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Crear Reserva</h4>
                </div>
                <div class="panel-body">
                    {{--{!! Form::open([--}}
						{{--'route' => ['ambiente.horarios',1,'2017-04-02'],--}}
						{{--'files' => true,--}}
						{{--]) !!}--}}
                    @include('reservas.form-select-dates')
                    <div class="text-center">
                        <a class="btn btn-primary"
                           href="{{ route('ambiente.horarios', ['id_ambiente'=>1, 'fecha'=>'2017-04-02']) }}">
                            <b class="glyphicon glyphicon-remove"></b> Siguiente
                        </a>
                        <a class="btn btn-primary"
                           href="{{ route('reservas.index') }}">
                            <b class="glyphicon glyphicon-remove"></b> Salir
                        </a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection