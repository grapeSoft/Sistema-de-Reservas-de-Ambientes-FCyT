@include('usuarios.form-basic')
@if($errors->has('foto'))
    <div class="form-group has-error">
@else
    <div class="form-group">
@endif
        {!! Form::label('foto', 'Foto', ['class' => 'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::text('foto', null, ['class' => 'form-control', 'placeholder' => 'Subir imagen...', 'readonly' => '']) !!}
            {!! Form::file('foto', ['class' => 'form-control', 'accept' => 'image/*']) !!}
            <div class="help-block">
                {{ $errors->first('foto') }}
            </div>
        </div>
    </div>
@if($errors->has('username'))
    <div class="form-group has-error">
@else
    <div class="form-group">
@endif
        {!! Form::label('username', 'Nombre de usuario', ['class' => 'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::text('username', null, ['class' => 'form-control']) !!}
            <div class="help-block">
                {{ $errors->first('username') }}
            </div>
        </div>
    </div>
<!--@if($errors->has('password'))
    <div class="form-group has-error">
@else
    <div class="form-group">
@endif
        {!! Form::label('password', 'Clave', ['class' => 'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::password('password', ['class' => 'form-control']) !!}
            <div class="help-block">
                {{ $errors->first('password') }}
            </div>
        </div>
    </div>
@if($errors->has('password'))
    <div class="form-group has-error">
@else
    <div class="form-group">
@endif
        {!! Form::label('password_confirmation', 'Repita su clave', ['class' => 'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>
    </div>-->
