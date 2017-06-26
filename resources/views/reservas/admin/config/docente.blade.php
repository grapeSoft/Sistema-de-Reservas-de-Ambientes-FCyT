@if($errors->has('tipo'))
    <div class="form-group has-error">
@else
    <div class="form-group">
@endif
        {!! Form::label('tipo', 'Tipo', [
            'class' => 'control-label col-md-4'
        ]) !!}
        <div class="col-md-7">
            {!! Form::select('tipo', [
            'examen' => 'Examen',
            ], null, ['class' => 'form-control'])!!}
            <div class="help-block">
                {{ $errors->first('tipo') }}
            </div>
        </div>
    </div>
@if($errors->has('numeroPeriodos'))
    <div class="form-group has-error">
@else
    <div class="form-group">
@endif
        {!! Form::label('numeroPeriodos', 'Numero de Periodos', ['class' => 'control-label col-md-4']) !!}
        <div class="col-md-7">
            {!! Form::number('numeroPeriodos', null, ['class' => 'form-control']) !!}
            <div class="help-block">
                {{ $errors->first('numeroPeriodos') }}
            </div>
        </div>
    </div>
@if($errors->has('numeroParticipantes'))
    <div class="form-group has-error">
@else
    <div class="form-group">
@endif
        {!! Form::label('numeroParticipantes', 'Numero de Participantes', ['class' => 'control-label col-md-4']) !!}
        <div class="col-md-7">
            {!! Form::number('numeroParticipantes', null, ['class' => 'form-control']) !!}
            <div class="help-block">
                {{ $errors->first('numeroParticipantes') }}
            </div>
        </div>
    </div>
@if($errors->has('numero_reservas_materia'))
    <div class="form-group has-error">
@else
    <div class="form-group">
@endif
        {!! Form::label('numero_reservas_materia', '(*) Numero de Reservas por Materia', ['class' => 'control-label col-md-4']) !!}
        <div class="col-md-7">
            {!! Form::number('numero_reservas_materia', null, ['class' => 'form-control']) !!}
            <div class="help-block">
                {{ $errors->first('numero_reservas_materia') }}
            </div>
        </div>
    </div>