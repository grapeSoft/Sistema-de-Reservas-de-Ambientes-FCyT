@extends('reservas.create.create')

@section('contenido-create')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="">
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
    </div>
</div>
@endsection

@section('panel-footer')
<div class="btn-group btn-group-justified">
    <div class="col-md-2 col-md-offset-10">
        <div class="btn-group">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#formularioReserva">Siguiente</button>
        </div>
    </div>
</div>
    @include('reservas.formularios.form')
@endsection