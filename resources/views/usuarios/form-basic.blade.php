@if($errors->has('nombre'))
    <div class="form-group has-error">
@else
    <div class="form-group">
@endif
        {!! Form::label('nombre', 'Nombre', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                <div class="help-block">
                    {{ $errors->first('nombre') }}
                </div>
            </div>
    </div>
@if($errors->has('apellido_paterno'))
    <div class="form-group has-error">
@else
    <div class="form-group">
@endif
        {!! Form::label('apellido_paterno', 'Apellido Paterno', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('apellido_paterno', null, ['class' => 'form-control']) !!}
                <div class="help-block">
                    {{ $errors->first('apellido_paterno') }}
                </div>
            </div>
    </div>
@if($errors->has('apellido_materno'))
    <div class="form-group has-error">
@else
    <div class="form-group">
@endif
        {!! Form::label('apellido_materno', 'Apellido materno', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('apellido_materno', null, ['class' => 'form-control']) !!}
                <div class="help-block">
                    {{ $errors->first('apellido_materno') }}
                </div>
            </div>
    </div>
@if($errors->has('email'))
    <div class="form-group has-error">
@else
    <div class="form-group">
@endif
        {!! Form::label('email', 'Email', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                <div class="help-block">
                    {{ $errors->first('email') }}
                </div>
            </div>
    </div>