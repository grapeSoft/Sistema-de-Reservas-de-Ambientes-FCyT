@extends('reservas.create.create')

@section('contenido-create')
<div class="panel panel-default">
    <div class="panel-body">
        {!! Form::open([
                'route' => ['reservas.store',],
                'files' => true,
                'class' => 'form-horizontal'
                ]) !!}
        @if($errors->has('ids_horas'))
            <p class="alert alert-danger">{{ $errors->first('ids_horas') }}</p>
        @endif
        @if($errors->has('periodos'))
            <p class="alert alert-danger">{{ $errors->first('periodos') }} {{ \App\Model\TipoReserva::where('tipo', 'examen')->first()->max_nro_periodos }}</p>
        @endif
        @if($errors->has('continuo'))
            <p class="alert alert-danger">{{ $errors->first('continuo') }}</p>
        @endif
        @if($errors->has('reserva_aceptada'))
            <p class="alert alert-danger">{{ $errors->first('reserva_aceptada') }}</p>
        @endif
        <div class="">
            <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">Hora Inicio</th>
                            <th class="text-center">Hora Fin</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Selección</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($horarios as $horario)
                            @if($horario->pivot->estado == "Ocupado")
                            <tr style="background:#C5CAE9;">
                                <td class="text-center">{{ $horario->hora_inicio }}</td>
                                <td class="text-center">{{ $horario->hora_fin }}</td>
                                <td class="text-center">{{ $horario->pivot->estado }}</td>
                                @if($horario->pivot->estado == "Libre")
                                    <td class="text-center">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('ids_horas[]', $horario->id_horas) !!}
                                        </label>
                                    </div>
                                    </td>
                                @else
                                    <td></td>
                                @endif
                            </tr>
                            @else
                                <tr>
                                    <td class="text-center">{{ $horario->hora_inicio }}</td>
                                    <td class="text-center">{{ $horario->hora_fin }}</td>
                                    <td class="text-center">{{ $horario->pivot->estado }}</td>
                                    @if($horario->pivot->estado == "Libre")
                                        <td class="text-center">
                                        <div class="checkbox" style="padding-top: 3px;">
                                            <label>
                                                {!! Form::checkbox('ids_horas[]', $horario->id_horas) !!}
                                            </label>
                                        </div>
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                        {{--@endif--}}
                        </tbody>
                    </table>
            </div>
        </div>
        @if(!empty($horario))
        {!! Form::hidden('id_fecha', $horario->pivot->id_fecha, ['class' => 'form-control', 'onchange' => "this.form.submit()"]) !!}
        @endif
            <div class="text-right">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#formularioReserva">Siguiente</button>
            </div>
        @include('reservas.formularios.form')
        <!-- {!! Form::close() !!} -->
    </div>
</div>
@endsection
@section('script')
    @if($errors->has('descripcion') || $errors->has('inscritos'))
        <script type="text/javascript">
            $(document).ready(function(){
            $('#formularioReserva').modal('show');
        });
        </script>
    @endif
@endsection