@if($errors->has('nombre'))
    <div class="form-group has-error">
        <div class="help-block">
            {{ $errors->first('nombre') }}
        </div>
        @else
            <div class="form-group">
                @endif
                {!! Form::label('nombre', 'Nombre', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            @if($errors->has('apellido_paterno'))
                <div class="form-group has-error">
                    <div class="help-block">
                        {{ $errors->first('apellido_paterno') }}
                    </div>
                    @else
                        <div class="form-group">
                            @endif
                            {!! Form::label('apellido_paterno', 'Apellido Paterno', ['class' => 'control-label col-md-2']) !!}
                            <div class="col-md-10">
                                {!! Form::text('apellido_paterno', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if($errors->has('apellido_materno'))
                            <div class="form-group has-error">
                                <div class="help-block">
                                    {{ $errors->first('apellido_materno') }}
                                </div>
                                @else
                                    <div class="form-group">
                                        @endif
                                        {!! Form::label('apellido_materno', 'Apellido materno', ['class' => 'control-label col-md-2']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('apellido_materno', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    @if($errors->has('email'))
                                        <div class="form-group has-error">
                                            <div class="help-block">
                                                {{ $errors->first('email') }}
                                            </div>
                                            @else
                                                <div class="form-group">
                                                    @endif
                                                    {!! Form::label('email', 'Email', ['class' => 'control-label col-md-2']) !!}
                                                    <div class="col-md-10">
                                                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                                @if($errors->has('foto'))
                                                    <div class="form-group has-error">
                                                        <div class="help-block">
                                                            {{ $errors->first('foto') }}
                                                        </div>
                                                        @else
                                                            <div class="form-group">
                                                                @endif
                                                                {!! Form::label('foto', 'Foto', ['class' => 'control-label col-md-2']) !!}
                                                                <div class="input-group-btn col-md-10">
                                                                    <button type="button" class="btn btn-fab btn-fab-mini btn-primary">
                                                                    {!! Form::file('foto') !!}
                                                                    <i class="material-icons">cloud_upload</i>
                                                                    </button>
                                                                </div>
                                                            </div>