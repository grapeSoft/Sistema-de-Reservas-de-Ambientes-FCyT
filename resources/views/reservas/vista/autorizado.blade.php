	
				
				<table class="table table-bordered table-hover">
					<tr>
						<td><strong>Id. de Usuario</strong></td>
						<td>{{ $reservas->id_usuario }}</td>
					</tr>
					<tr>
						<td><strong>Id de Reserva</strong></td>
						<td>{{ $reservas->id_reserva }}</td>
					</tr>
					<tr>
						<td><strong>Nombre</strong></td>
						<td>{{ $reservas->nombre }} {{ $reservas->apellido_paterno }} {{ $reservas->apellido_materno }} </td>
					</tr>
					<tr>
						<td><strong>Email</strong></td>
						<td>{{ $reservas->email }}</td>
					</tr>
					<tr>
						<td><strong>Tipo de Reserva</strong></td>				               
                        <td>{{ $reservas->tipo }}</td>                                   
                    </tr> 
                    <tr>
						<td><strong>Descripcion</strong></td>				               
                        <td>{{ $reservas->descripcion }}</td>                                   
                    </tr> 
                                     		
					
					
				</table>
			
