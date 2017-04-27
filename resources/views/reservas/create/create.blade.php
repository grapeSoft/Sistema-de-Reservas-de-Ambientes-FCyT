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
                    {{--@include('reservas.create.form-select-dates')--}}

                    <div class="form-group">
                        <label for="fecha">Seleccione una fecha:</label>
                        <input type="date" class="form-control" id="fecha">
                    </div>
                    <div class="form-group">
                        <select onChange="window.location.href=this.value">
                            <option disabled selected value> -- Seleccione un ambiente -- </option>
                            <option value="http://localhost:8000/ambientes/1/fechas/2017-04-01/horarios">Auditorio</option>
                        </select>
                    </div>

                    {{--<article id="content">--}}
                        {{--<!-- <div class="container"> -->--}}
                        {{--@yield('content')--}}
                                {{--<!-- </div> -->--}}
                    {{--</article>--}}

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