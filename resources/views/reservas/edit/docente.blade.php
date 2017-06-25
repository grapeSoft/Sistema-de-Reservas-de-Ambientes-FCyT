<legend>Materias</legend>

<fieldset>
    @if($errors->has('inscritos'))
        <p class="alert alert-danger">{{ $errors->first('inscritos') }} {{ \App\Model\TipoReserva::where('tipo', 'examen')->first()->min_nro_participantes }} </p>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Grupo</th>
                <th class="text-center">Seleccion</th>
            </tr>
            </thead>
            <tbody>
            @foreach($eventos as $evento)
                <tr>
                    <td class="text-center">{{ $evento->grupo->materia->nombre }}</td>
                    <td class="text-center">{{ $evento->grupo->grupo }}</td>
                    <td class="text-center">                        
                        <div class="checkbox" style="padding-top: 3px;">
                            <label>
                                {!! Form::checkbox('ids_usuario_materias[]', $evento->grupo->id_usuario_materia, true) !!}
                            </label>
                        </div>
                    </td>
                </tr>
            @endforeach

            @foreach($materias as $materia)
                @php($b=false)
                @foreach($eventos as $evento)
                        @if(($evento->id_usuario_materia == $materia->pivot->id_usuario_materia))
                            @php($b=true)
                        @endif
                @endforeach
                @if(!$b)
                    <tr>
                        <td class="text-center">{{ $materia->nombre }}</td>
                        <td class="text-center">{{ $materia->pivot->grupo }}</td>
                        <td class="text-center">                            
                            <div class="checkbox" style="padding-top: 3px;">
                                <label>
                                    {!! Form::checkbox('ids_usuario_materias[]', $materia->pivot->id_usuario_materia) !!}
                                </label>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach

            </tbody>
        </table>
    </div>
</fieldset>
