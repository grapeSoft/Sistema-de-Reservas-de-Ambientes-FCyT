@extends('reservas.create.create')

@section('contenido-create')
<div class="panel panel-default">
    <div class="panel-body">
        {!! Form::open([
                'route' => ['reservas.store',],
                'files' => true,
                'class' => 'form-horizontal'
                ]) !!}
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
                                @if($horario->pivot->estado == "Libre")
                                    <td>{!! Form::checkbox($horario->id_horas, $horario->id_horas) !!}</td>
                                @else
                                    <td></td>
                                @endif
                            </tr>
                        @endforeach
                        {{--@endif--}}
                        </tbody>
                    </table>
            </div>
            @if(Auth::user()->tipo === 'docente')
            @include('reservas.formularios.boton-doc')
            @endif
        </div>
        @if(!empty($horario))
        {!! Form::hidden('id_fecha', $horario->pivot->id_fecha, ['class' => 'form-control', 'onchange' => "this.form.submit()"]) !!}
        @endif
        @if(Auth::user()->tipo === 'autorizado')
        @include('reservas.formularios.boton-aut')
        @endif

        {!! Form::close() !!}
    </div>
</div>
@endsection
@section('panel-footer')
@endsection