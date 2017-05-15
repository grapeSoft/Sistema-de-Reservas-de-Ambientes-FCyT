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
						<td><strong>Materias</strong></td>				               
                        <td>@foreach($eventos as $evento) // {{ $evento->nombre }}  @endforeach</td>                                   
                    </tr>  

					<tr>
						<td><strong>Grupo</strong></td>				               
                        <td>@foreach($eventos as $evento) // {{ $evento->grupo }}  @endforeach</td>                                   
                    </tr>                  		
					
				</table>
			