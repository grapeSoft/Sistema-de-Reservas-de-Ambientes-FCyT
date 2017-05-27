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
						<td><strong>Materias</strong></td>				               
                        @foreach($eventos as $evento)<td> {{ $evento->nombre }} --> Grupo {{ $evento->grupo }} </td><tr>
                        </tr> <td></td> @endforeach                                   
                    </tr> 

					
				</table>
			