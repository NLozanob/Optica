@extends('layouts.app')

@section('title','Lista de Clientes')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
		</div>
    </section>
    <section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header bg-secondary" style="font-size: 1.75rem;font-weight: 500; line-height: 1.2; margin-bottom: 0.5rem;">
							@yield('title')
								<a href="{{ route('customers.create') }}" class="btn btn-primary float-right" title="Create"><i class="fas fa-plus nav-icon"></i></a>
						</div>
						<div class="card-body">
							<table id="example1" class="table table-bordered table-hover" style="width:100%">
								<thead class="text-primary">
								    <tr>
										<th width="10px">ID</th>
										<th>Nombre</th>
										<th>Documento</th>
										<th>Dirección</th>
										<th>Telefono</th>
										<th>Correro</th>
										<th width="50px">Acción</th>
									</tr>
								</thead>
								<tbody>
									@foreach($customers as $customer)
									<tr>
										<td>{{ $customer -> id}}</td>
                    					<td>{{ $customer -> name}}</td>
                    					<td>{{ $customer -> identification_document}}</td>
                    					<td>{{ $customer -> address}}</td>
                    					<td>{{ $customer -> phone_number}}</td>
                    					<td>{{ $customer -> email}}</td>
                              <td>
                                <a href="{{ route('customers.edit',$customer->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                <form class="d-inline delete-form" action="{{ route('customers.destroy', $customer) }}"  method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm" title="delete"><i class="fas fa-trash-alt"></i></button>
                                </form>
                              </td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
 </div>
@endsection

@push('scripts')
	<script>
		$(document).ready(function(){
			$("example1").DataTable()
		});
		$(function() {
			$('.toggle-class').change(function() {
				var status = $(this).prop('checked') == true ? 1 : 0;
				var customer_id = $(this).data('id');
				$.ajax({
					type: "GET",
					dataType: "json",
					url: 'changestatuscustomer',
					data: {'status': status, 'customer_id': customer_id},
					success: function(data){
					  console.log(data.success)
					}
				});
			})
		  })
	</script>
	<script>
	$('.delete-form').submit(function(e){
		e.preventDefault();
		Swal.fire({
			title: 'Estás seguro?',
			text: "Este registro se eliminará de forma permanente",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Acceptar',
			cancelButtonText: 'Cancelar',
		}).then((result) => {
			if (result.isConfirmed) {
				this.submit();
			}
		})
	});
	</script>
	@if(session('delete') == 'ok')
		<script>
			Swal.fire(
				'Eliminado',
				'El registro se ha eliminado correctamente',
				'success'
			)
		</script>
	@endif
	<script type="text/javascript">
		$(function () {
			$("#example1").DataTable({
				"responsive": true, 
				"lengthChange": true, 
				"autoWidth": false,
				//"buttons": ["excel", "pdf", "print", "colvis"],
				"language": 
						{
							"sLengthMenu": "Mostrar _MENU_ entradas",
							"sEmptyTable": "No hay datos disponibles en la tabla",
							"sInfo": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
							"sInfoEmpty": "Mostrando 0 a 0 de 0 entradas",
							"sSearch": "Buscar:",
							"sZeroRecords": "No se encontraron registros coincidentes en la tabla",
							"sInfoFiltered": "(Filtrado de _MAX_ entries totales)",
							"oPaginate": {
								"sFirst": "Primero",
								"sPrevious": "Anterior",
								"sNext": "Próximo",
								"sLast": "Ultimo"
							},
							/*"buttons": {
								"print": "Imprimir",
								"colvis": "Visibilidad Columnas"
								/*"create": "Nuevo",
								"edit": "Cambiar",
								"remove": "Borrar",
								"copy": "Copiar",
								"csv": "fichero CSV",
								"excel": "tabla Excel",
								"pdf": "documento PDF",
								"collection": "Colección",
								"upload": "Seleccione fichero...."
							}*/
						}
			});//.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		});
	</script>
@endpush
