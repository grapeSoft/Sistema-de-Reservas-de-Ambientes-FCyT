@extends('reservas.principal')

@section('contenido-principal')
    <div class="">
        <div class="panel-body">
            {!! Form::open([
                'route' => ['reservas.horarios'],
                'method' => 'get',
                'files' => true,
                'class' => 'form-horizontal'
                ]) !!}

            <div class="form-group col-md-6">
                {!! Form::label('ambiente', 'Ambiente', [
                    'class' => 'control-label col-md-4'
                ]) !!}
                <div class="col-md-7 col-md-offset-1">
                    {!! Form::select('ambiente', ['1' => 'Auditorio',],
                    null,
                    ['class' => 'form-control', 'onchange' => "this.form.submit()"])
                    !!}
                </div>
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('fecha', 'Fecha', ['class' => 'control-label col-md-4']) !!}
                <div class="col-md-7 col-md-offset-1">
                @if(empty($fecha))
                    {!! Form::date('fecha', null, ['class' => 'form-control', 'onchange' => "this.form.submit()"]) !!}
                @else
                    {!! Form::date('fecha', $fecha, ['class' => 'form-control', 'onchange' => "this.form.submit()"]) !!}
                @endif
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    @if($errors->has('fecha'))
        <p class="alert alert-danger">{{ $errors->first('fecha') }}</p>
    @endif
    @yield('contenido-create')
    </div>
@endsection