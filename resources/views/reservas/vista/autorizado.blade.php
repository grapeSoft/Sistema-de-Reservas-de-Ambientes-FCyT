	
				
				<table class="table table-bordered table-hover">
					<tr>
						<td><strong>Id. de Usuario</strong></td>
						<td>{{ auth()->user()->id_usuario }}</td>
					</tr>
					<tr>
						<td><strong>Nombre</strong></td>
						<td>{{ auth()->user()->nombre }} {{ auth()->user()->apellido_paterno }} {{ auth()->user()->apellido_materno }} </td>
					</tr>
					<tr>
						<td><strong>Email</strong></td>
						<td>{{ auth()->user()->email }}</td>
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
			
