@extends('plantillas.principal')
@section('contenido')
<hr>
<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          <h3><i class="fa fa-lock fa-4x"></i></h3>
                          <h2 class="text-center">Se te olvido tu Contraseña?</h2>
                          <p>Tu puedes restablecerlo aqui.</p>
                            <div class="panel-body">
                              @if(session('mensaje'))
                                  <div class="alert alert-success">
                                    {{ session('mensaje') }}
                                  </div>
                                  @endif

                                  @if($errors->has('recuperarC'))
                                  <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('recuperarC') }}
                                  </div>
                                  @endif
                             {!! Form::open(['route' => 'usuarios.enviarContrasea']) !!}
                                <div class="form-group">
                                    <!-- {!! Form::label('username', 'Nombre de usuario', ['class' => 'control-label']) !!} -->
                                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Email']) !!}
                                  </div>
                                  <div class="text-center">
                                    <button type="submit" class="btn btn-primary">
                                      <i class="material-icons">done</i> Enviar
                                    </button>
                                    <a class="btn btn-primary" 
                                      href="{{ route('usuarios.index') }}">
                                      <i class="material-icons">close</i> Salir
                                    </a>
                                  </div>
                                  {!! Form::close() !!}
                              
                              </form>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection