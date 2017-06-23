@if($errors->has('gestion'))
<div class="form-group has-error">
@else
<div class="form-group">
@endif
    {!! Form::label('gestion', 'Gestión', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-4">
        @if($gestion)
        {!! Form::text('gestion', null, ['class' => 'form-control']) !!}
        @else
        {!! Form::text('gestion', '1-20XX', ['class' => 'form-control']) !!}
        @endif
        <div class="help-block">
            {{ $errors->first('gestion') }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
@if($errors->has('fecha_inicial'))
            <div class="form-group has-error">
                @else
                    <div class="form-group">
                        @endif
                        {!! Form::label('fecha_inicial', 'Fecha Inicial', ['class' => 'control-label col-md-4']) !!}
                        <div class="col-md-7">
                            @if($gestion)
                            {!! Form::date('fecha_inicial', $gestion->fecha_inicio, ['class' => 'form-control']) !!}
                            @else
                            {!! Form::date('fecha_inicial', null, ['class' => 'form-control']) !!}
                            @endif
                            <div class="help-block">
                                {{ $errors->first('fecha_inicial') }}
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-md-6">
                @if($errors->has('fecha_final'))
                    <div class="form-group has-error">

                        @else
                            <div class="form-group">
                                @endif
                                {!! Form::label('fecha_final', 'Fecha Final', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-7">
                                    @if($gestion)
                                    {!! Form::date('fecha_final', $gestion->fecha_fin, ['class' => 'form-control']) !!}
                                    @else
                                    {!! Form::date('fecha_final', null, ['class' => 'form-control']) !!}
                                    @endif
                                    <div class="help-block">
                                        {{ $errors->first('fecha_final') }}
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>
            <h4 style="margin-top: 30px;">Primer Ciclo de Examenes</h4>
            <div class="row">
                <div class="col-md-6">
                    @if($errors->has('primer_parcial_ini'))
                        <div class="form-group has-error">
                            @else
                                <div class="form-group">
                                    @endif
                                    {!! Form::label('primer_parcial_ini', 'Fecha Inicial', ['class' => 'control-label col-md-4']) !!}
                                    <div class="col-md-7">
                                        @if($gestion)
                                        {!! Form::date('primer_parcial_ini', $gestion->primerCiclo()->fecha_inicio, ['class' => 'form-control']) !!}
                                        @else
                                        {!! Form::date('primer_parcial_ini', null, ['class' => 'form-control']) !!}
                                        @endif
                                        <div class="help-block">
                                            {{ $errors->first('primer_parcial_ini') }}
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-6">
                            @if($errors->has('primer_parcial_fin'))
                                <div class="form-group has-error">
                                    @else
                                        <div class="form-group">
                                            @endif
                                            {!! Form::label('primer_parcial_fin', 'Fecha Final', ['class' => 'control-label col-md-4']) !!}
                                            <div class="col-md-7">
                                                @if($gestion)
                                                {!! Form::date('primer_parcial_fin', $gestion->primerCiclo()->fecha_fin, ['class' => 'form-control']) !!}
                                                @else
                                                {!! Form::date('primer_parcial_fin', null, ['class' => 'form-control']) !!}
                                                @endif
                                                <div class="help-block">
                                                    {{ $errors->first('primer_parcial_fin') }}
                                                </div>
                                            </div>
                                        </div>
                                </div>
                        </div>
                        <h4 style="margin-top: 30px;">Segundo Ciclo de Examenes</h4>
                        <div class="row">
                            <div class="col-md-6">
                                @if($errors->has('segundo_parcial_ini'))
                                    <div class="form-group has-error">
                                        @else
                                            <div class="form-group">
                                                @endif
                                                {!! Form::label('segundo_parcial_ini', 'Fecha Inicial', ['class' => 'control-label col-md-4']) !!}
                                                <div class="col-md-7">
                                                    @if($gestion)
                                                    {!! Form::date('segundo_parcial_ini', $gestion->segundoCiclo()->fecha_inicio, ['class' => 'form-control']) !!}
                                                    @else
                                                    {!! Form::date('segundo_parcial_ini', null, ['class' => 'form-control']) !!}
                                                    @endif
                                                    <div class="help-block">
                                                        {{ $errors->first('segundo_parcial_ini') }}
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                        @if($errors->has('segundo_parcial_fin'))
                                            <div class="form-group has-error">
                                                @else
                                                    <div class="form-group">
                                                        @endif
                                                        {!! Form::label('segundo_parcial_fin', 'Fecha Final', ['class' => 'control-label col-md-4']) !!}
                                                        <div class="col-md-7">
                                                            @if($gestion)
                                                            {!! Form::date('segundo_parcial_fin', $gestion->segundoCiclo()->fecha_fin, ['class' => 'form-control']) !!}
                                                            @else
                                                            {!! Form::date('segundo_parcial_fin', null, ['class' => 'form-control']) !!}
                                                            @endif
                                                            <div class="help-block">
                                                                {{ $errors->first('segundo_parcial_fin') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="pull-right">
                                                    <button type="submit" class="btn btn-raised btn-primary">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

