{!! Form::open(['route' => ['feriado.store'],'method' => 'post','files' => true,'class' => 'form-horizontal']) !!}
	<div class="modal fade" id="form-create" tabindex="-1" role="dialog">
		<div class="modal-dialog">
		    <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Formulario de Feriado</h4>
                </div>
                <div class="modal-body">                    
                        @if($errors->has('titulo'))
                            <div class="form-group has-error">
                        @else
                            <div class="form-group">
                        @endif
                            {!! Form::label('titulo', 'Nombre', ['class' => 'control-label col-md-3']) !!}
                            <div class="col-md-8">
                                {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
                                <div class="help-block">
                                    {{ $errors->first('titulo') }}
                                </div>
                            </div>
                        </div>
                        @if($errors->has('fecha'))
                            <div class="form-group has-error">
                        @else
                            <div class="form-group">
                        @endif
                            {!! Form::label('fecha', 'Fecha', ['class' => 'control-label col-md-3']) !!}
                            <div class="col-md-8">
                                {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
                                <div class="help-block">
                                    {{ $errors->first('fecha') }}
                                </div>
                            </div>
                        </div>
                </div> 	
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        	<button type="submit" class="btn btn-primary">Guardar</button>
		      	</div>                  
		    </div>
		</div>
	</div>
{!! Form::close() !!}