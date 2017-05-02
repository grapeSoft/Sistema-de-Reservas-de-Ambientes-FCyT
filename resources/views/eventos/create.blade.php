@extends('plantillas.principal')

@section('contenido')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Materias</h4>
                </div>
                <div class="panel-body">
                    @if(session('mensaje'))
                        <div class="alert alert-success">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    {!! Form::open([
                    'route' => ['eventos.almacenar', $id],
                    'files' => true,
                    'class' => 'form-horizontal'
                    ]) !!}
                    <div class="">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Grupo</th>
                                        <th>Seleccion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($materias as $materia)
                                        <tr>
                                            <td>{{ $materia->nombre }}</td>
                                            <td>{{ $materia->pivot->grupo }}</td>
                                            <td>{!! Form::checkbox($materia->pivot->id_usuario_materia, $materia->pivot->id_usuario_materia) !!}</td>
                                        </tr>
                                    @endforeach
                                    {{--@endif--}}
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                <b class="glyphicon glyphicon-new-window"></b> Crear
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection