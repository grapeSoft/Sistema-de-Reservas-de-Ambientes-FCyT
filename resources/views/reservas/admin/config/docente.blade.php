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
@if($errors->has('max_nro_periodos'))
    <div class="form-group has-error">
@else
    <div class="form-group">
@endif
        {!! Form::label('max_nro_periodos', 'Numero de Periodos', ['class' => 'control-label col-md-4']) !!}
        <div class="col-md-7">
            {!! Form::number('max_nro_periodos', null, ['class' => 'form-control']) !!}
            <div class="help-block">
                {{ $errors->first('max_nro_periodos') }}
            </div>
        </div>
    </div>
@if($errors->has('min_nro_participantes'))
    <div class="form-group has-error">
@else
    <div class="form-group">
@endif
        {!! Form::label('min_nro_participantes', 'Numero de Participantes', ['class' => 'control-label col-md-4']) !!}
        <div class="col-md-7">
            {!! Form::number('min_nro_participantes', null, ['class' => 'form-control']) !!}
            <div class="help-block">
                {{ $errors->first('min_nro_participantes') }}
            </div>
        </div>
    </div>
@if($errors->has('numero_reservas_materias'))
    <div class="form-group has-error">
@else
    <div class="form-group">
@endif
        {!! Form::label('numero_reservas_materias', '(*) Numero de Reservas por Materia', ['class' => 'control-label col-md-4']) !!}
        <div class="col-md-7">
            {!! Form::number('numero_reservas_materias', null, ['class' => 'form-control']) !!}
            <div class="help-block">
                {{ $errors->first('numero_reservas_materias') }}
            </div>
        </div>
    </div>