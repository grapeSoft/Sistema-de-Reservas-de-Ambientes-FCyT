<legend>Materias</legend>

<fieldset>
    @if($errors->has('inscritos'))
        <p class="alert alert-danger">{{ $errors->first('inscritos') }} {{ \App\Model\TipoReserva::where('tipo', 'examen')->first()->min_nro_participantes }} </p>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Grupo</th>
                <th>Seleccion</th>
            </tr>
            </thead>
            <tbody>
            @foreach($eventos as $evento)


                <tr>
                    <td>{{ $evento->grupo->materia->nombre }}</td>
                    <td>{{ $evento->grupo->grupo }}</td>
                    <td>{!! Form::checkbox('ids_usuario_materias[]', $evento->grupo->id_usuario_materia, true) !!}</td>
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
                        <td>{{ $materia->nombre }}</td>
                        <td>{{ $materia->pivot->grupo }}</td>
                        <td>{!! Form::checkbox('ids_usuario_materias[]', $materia->pivot->id_usuario_materia) !!}</td>
                    </tr>
                @endif
            @endforeach


            </tbody>
        </table>
    </div>
</fieldset>
