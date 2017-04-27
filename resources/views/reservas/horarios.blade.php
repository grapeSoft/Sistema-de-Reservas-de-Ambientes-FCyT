@extends('reservas.create.create')

@section('content')
    {{--<div class="">--}}
        {{--<div class="col-md-10 col-md-offset-1">--}}
            <div class="table-responsive">
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
        {{--</div>--}}
    {{--</div>--}}
@endsection