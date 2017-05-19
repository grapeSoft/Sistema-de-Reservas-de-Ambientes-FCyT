<div class="form-group">
    {!! Form::label('tipo', 'Tipo', [
        'class' => 'control-label col-md-4'
    ]) !!}
    <div class="col-md-7 col-md-offset-1">
        {!! Form::select('tipo', [
        'examen' => 'Examen',
		'congreso' => 'Congreso',
		'seminario'=> 'Seminario',
		'curso' => 'Cursos',
		'charla' => 'Charlas',
		'otro' => 'Otros',], null, ['class' => 'form-control'])!!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('numeroPeriodos', 'Numero de Periodos', ['class' => 'control-label col-md-4']) !!}
    <div class="col-md-7 col-md-offset-1">
        {!! Form::number('numeroPeriodos', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('numeroParticipantes', 'Numero de Participantes', ['class' => 'control-label col-md-4']) !!}
    <div class="col-md-7 col-md-offset-1">
        {!! Form::number('numeroParticipantes', null, ['class' => 'form-control']) !!}
    </div>
</div>