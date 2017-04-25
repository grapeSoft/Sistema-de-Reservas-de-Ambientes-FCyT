@extends('plantillas.principal')

@section('contenido')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Lista de reservas</h4>
                </div>
                <div class="panel-body">
                    @if(session('mensaje'))
                        <div class="alert alert-danger">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    <div>
                        {{--{1, 2} parametros de la url --}}
                        <a href="{{ route('reservas.create') }}" class="btn btn-primary">
                            <i class="material-icons">person_add</i> Crear reserva
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover ">
                            <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection