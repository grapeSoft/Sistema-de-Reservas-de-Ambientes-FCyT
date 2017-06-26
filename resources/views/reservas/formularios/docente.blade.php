<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h4 class="modal-title">Materias</h4>
</div>
<div class="modal-body">
	<div class="panel">
		@if($errors->has('inscritos'))
			<p class="alert alert-danger">{{ $errors->first('inscritos') }} {{ \App\Model\TipoReserva::where('tipo', 'examen')->first()->min_nro_participantes }} </p>
		@endif
		<div class="table-responsive">
	        <table class="table table-striped table-hover table-bordered">
	            <thead>
	                <tr>
	                    <th class="text-center">Nombre</th>
	                    <th class="text-center">Grupo</th>
	                    <th class="text-center">Seleccion</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@foreach($materias as $materia)
	                    <tr>
	                        <td class="text-center">{{ $materia->nombre }}</td>
	                        <td class="text-center">{{ $materia->pivot->grupo }}</td>
	                        <td class="text-center">
								<div class="checkbox" style="padding-top: 3px;">
									<label>
										{!! Form::checkbox('ids_usuario_materias[]', $materia->pivot->id_usuario_materia) !!}
									</label>
								</div>
							</td>
	                    </tr>
	                @endforeach
	            </tbody>
	        </table>
	    </div>
	</div>
</div>