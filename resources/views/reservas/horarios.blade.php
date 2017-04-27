@extends('reservas.create.create')

@section('content')
        <div class="col-md-12">
            <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Hora Inicio</th>
                            <th>Hora Fin</th>
                            <th>Estado</th>
                            <th>Seleccion</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($horarios as $horario)
                            <tr>
                                <td>{{ $horario->hora_inicio }}</td>
                                <td>{{ $horario->hora_fin }}</td>
                                <td>{{ $horario->pivot->estado }}</td>
                                <td>{!! Form::checkbox('seleccion', 'value') !!}</td>
                            </tr>
                        @endforeach
                        {{--@endif--}}
                        </tbody>
                    </table>
            </div>
        </div>
@endsection