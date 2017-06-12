	
				
				<table class="table table-bordered table-hover">
					<tr>
						<td><strong>Id. de Usuario</strong></td>
						<td>{{ $datosUsuario->id_usuario }}</td>
					</tr>
					<tr>
						<td><strong>Nombre</strong></td>
						<td>{{ $datosUsuario->nombre }} {{ $datosUsuario->apellido_paterno }} {{ $datosUsuario->apellido_materno }} </td>
					</tr>
					<tr>
						<td><strong>Email</strong></td>
						<td>{{ $datosUsuario->email }}</td>
					</tr>
					<tr>
						<td><strong>Tipo de Reserva</strong></td>				               
                        <td>{{ $eventosAutorizado->tipo }}</td>                                   
                    </tr> 
                    <tr>
						<td><strong>Descripcion</strong></td>				               
                        <td>{{ $eventosAutorizado->descripcion }}</td>                                   
                    </tr> 
                </table>
                <div class="btn-group btn-group-justified btn-group-raised">
					<a target="_blank" href="{{ route('crearpdf',['id' => $eventosAutorizado->id_reserva]) }}" class="btn btn-primary">VER PDF</a>
					<a target="_blank" href="{{ route('descargarpdf',['id' => $eventosAutorizado->id_reserva]) }}" class="btn btn-primary">DESCARGAR PDF</a>
				</div>
                	
			
