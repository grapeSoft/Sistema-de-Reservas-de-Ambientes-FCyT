<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h4 class="modal-title">Materias</h4>
</div>
<div class="modal-body">
	<div class="panel">
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
	                        <td>{!! Form::checkbox('ids_usuario_materias[]', $materia->pivot->id_usuario_materia) !!}</td>
	                    </tr>
	                @endforeach
	            </tbody>
	        </table>
	    </div>
	</div>
</div>