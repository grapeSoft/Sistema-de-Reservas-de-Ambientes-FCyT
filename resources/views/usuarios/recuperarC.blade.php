@extends('plantillas.principal')
@section('contenido')
<div class="hidden-xs" style="padding-bottom: 100px;">
</div>
<div class="container">
    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2 class="text-center">Se te olvido tu Contraseña?</h2>
                <p class="text-center">Tu puedes restablecerla aqui.</p>
                <div class="panel-body">
                    @if(session('mensaje'))
                        <div class="alert alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    @if($errors->has('recuperarC'))
                        <div class="alert alert-dismissible alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ $errors->first('recuperarC') }}
                        </div>
                    @endif
                    {!! Form::open(['route' => 'usuarios.enviarContrasea']) !!}
                        <div class="form-group label-floating">
                            {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group" style="margin-top: 14px;">
                            <div class="pull-left">
                                <a class="btn btn-primary btn-raised btn-danger" 
                                    href="{{ route('usuarios.index') }}">
                                    <i class="material-icons">close</i> Salir
                                </a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary btn-raised">
                                    <i class="material-icons">done</i> Enviar
                                </button> 
                            </div>
                        </div>
                    {!! Form::close() !!}                       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection