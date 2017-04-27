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

                         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#formularioReserva">Siguiente</button> -->

                         <button type="button" class="btn btn-primary btn-lg" data-toggle="modal">Siguiente</button> 
                        <!-- $reserva->id_reserva (1) -->
                        <a href="{{ route('reservas.show', 
                                        ['id' => 1]) }}" 
                                    class="btn btn-xs btn-info" title="Ver">
                                        <i class="material-icons md-18">open_in_new</i>
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