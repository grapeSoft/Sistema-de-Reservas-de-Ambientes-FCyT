@extends('calendario.principal')

@section('contenido-principal-calendario')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="well" style="margin-top: 10px;">
			<fieldset>
			{!! Form::open(['route' => ['calendario.updateConfig'],'method' => 'post','files' => true,'class' => 'form-horizontal']) !!}
				<ul class="nav nav-pills nav-justified">
					<li class="active"><a href="#tab1" data-toggle="tab">Gestión Academica y Periodo de Examen</a></li>
					<li><a href="#tab2" data-toggle="tab">Información</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade active in" id="tab1">
						<h4 style="margin-top: 20px;">Gestion Academica</h4>
						@if($errors->has('gestion'))
							<div class="form-group has-error">
						@else
							<div class="form-group">
						@endif
							{!! Form::label('gestion', 'Gestión', ['class' => 'control-label col-md-2']) !!}
							<div class="col-md-4">
								{!! Form::text('gestion', '1-20XX', ['class' => 'form-control']) !!}
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
											{!! Form::date('fecha_inicial', null, ['class' => 'form-control']) !!}
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
											{!! Form::date('fecha_final', null, ['class' => 'form-control']) !!}
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
										{!! Form::date('primer_parcial_ini', null, ['class' => 'form-control']) !!}
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
										{!! Form::date('primer_parcial_fin', null, ['class' => 'form-control']) !!}
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
										{!! Form::date('segundo_parcial_ini', null, ['class' => 'form-control']) !!}
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
										{!! Form::date('segundo_parcial_fin', null, ['class' => 'form-control']) !!}
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
					</div>
				{!! Form::close() !!}
					<div class="tab-pane fade" id="tab2">
						<h4 class="text-center" style="margin-top: 20px;">Gestion Academica</h4>
						<div class="row">
							<div class="col-md-12" style="margin-top: 15px;">
								<div class="table-responsive">
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<tr>
											<th>Id</th>
											<th>Gestión</th>
											<th>Fecha Inicial</th>
											<th>Fecha Final</th>
											<th>Opciones</th>
										</tr>
									</thead>
									<tbody>		
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
									</tbody>
								</table>
								</div>
							</div>
						</div>
					</div>				
				</div>
			</fieldset>	
			</div>
		</div>
	</div>
@endsection
@section('script')
<script>
	$('.btnNext').click(function(){
	$('.nav-pills > .active').next('li').find('a').trigger('click');
	});

	$('.btnPrevious').click(function(){
	$('.nav-pills > .active').prev('li').find('a').trigger('click');
	});
</script>         
@endsection