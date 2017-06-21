<div class="">
	<div class="modal fade" id="formularioFeriado" tabindex="-1" role="dialog">
		<div class="modal-dialog">
		    <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Formulario de Reserva</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => ['calendario.updateFeriado'],'method' => 'post','files' => true,'class' => 'form-horizontal']) !!}
                        <div class="form-group">
                            {!! Form::label('titulo', 'Nombre feriado', ['class' => 'control-label col-md-3']) !!}
                            <div class="col-md-8">
                                {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha', 'Fecha', ['class' => 'control-label col-md-3']) !!}
                            <div class="col-md-8">
                                {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                </div> 	
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        	<button type="submit" class="btn btn-primary">Guardar</button>
		      	</div>
                  {!! Form::close() !!}
		    </div>
		</div>
	</div>
</div>
