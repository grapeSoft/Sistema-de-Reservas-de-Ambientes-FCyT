@extends('plantillas.principal')

@section('contenido')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Lista de horarios</h4>
                </div>
                <div class="panel-body">
                    @if(session('mensaje'))
                        <div class="alert alert-danger">
                            {{ session('mensaje') }}
                        </div>
                    @endif

                    <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                            <th>Hora Inicio</th>
                            <th>Hora Fin</th>
                            <th>Estado</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($horarios as $horario)
                            <tr>
                                <td>{{ $horario->hora_inicio }}</td>
                                <td>{{ $horario->hora_fin }}</td>
                                <td>{{ $horario->pivot->estado }}</td>
                            </tr>
                        @endforeach
                        {{--@endif--}}
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection