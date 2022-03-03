@extends('layouts.app')

@section('content')
    @include('modals.modalCreateUser',[
        'categorias' => $categorias,
        'paises'=> $paises
    ])
    @include('modals.modalCreateUserEdit',[
        'categorias' => $categorias,
        'paises'=> $paises
    ])
    @include("modals.modalAdminEmail",[
        'email'=> $email
    ])

    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-gradient-dark text">
                    <div class="card-header bg-white text-dark">
                        <h3 class="mb-0">Lista de Usuarios</h3>
                            <div class="col text-right">
                            <a onclick="createuser();" class="btn btn-sm btn-primary text-right"><i class="fas fa-user-plus"></i> Crear usuario</a>
                            <a onclick="addEmailAdmin();" class="btn btn-sm btn-primary text-right"><i class="fas fa-envelope"></i> Añadir correo administrativo</a>
                            </div>
                        </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush" id="tableuser">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">  Nombres</th>
                                                <th scope="col">  Apellidos</th>
                                                <th scope="col">  Cedula</th>
                                                <th scope="col">  Email</th>
                                                <th scope="col">  Pais</th>
                                                <th scope="col">  Direccion</th>
                                                <th scope="col">  Celular</th>
                                                <th scope="col">  Categoria</th>
                                                <th scope="col">Modificar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
<script>
	function createuser(){
		$('#createuser').modal('show');
	}
    function addEmailAdmin(){
		$('#addemail').modal('show');
	}
</script>
<script>
$(document).ready(function () {
    var debugs = $('#tableuser').DataTable({
        "serveSide": true,
        "processing": true,
        "responsive": true,
        "ajax": "{{ url('user_data') }}",
        "columns": [
            {"data": "nombres"},
            {"data": "apellidos"},
            {"data": "cedula"},
            {"data": "email"},
            {"data": "pais"},
            {"data": "direccion"},
            {"data": "celular"},
            {"data": "categoria"},
            {"data": "modificar"}
        ],
    });
});
</script>
<script>
$(document).on("click","#btnUsuario",function(){
    var datos = $('#userCreate').serialize();
    $.ajax({
        type: "POST",
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        url:  "{{ url('user_data') }}",
        data: datos,
        success: function(r){
            console.log(r);
            if(r['message']=="error"){
                Swal.fire({        
                title: '¡Atención!',
                text: r['alerta'], 
                icon: 'error',
                });
            }else{
                Swal.fire({        
                title: '¡Felicidades!',
                text: 'Los datos fueron agregados con exito',
                icon: 'success',
                 });
                    
                    $('#tableuser').DataTable().ajax.reload();
                    $('#createuser').modal('hide');
                    // $('#nameuser').val('');
                    // $('#emailuser').val('');
                    // $('#sexo').prop('checked',false);
                    // $('#areauser').val('Seleccione una area');
                    // $('#descripcionuser').val('');
                 
            }
            
            
        }
        
    })
    return false
}); 
</script>
<script>
    $(document).on("click","#btnEmail",function(){
        var datos = $('#emailAdmin').serialize();
        $.ajax({
            type: "POST",
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            url:  "{{ url('data_email') }}",
            data: datos,
            success: function(r){
                if(r['message']=="error"){
                    Swal.fire({        
                    title: '¡Atención!',
                    text: r['alerta'], 
                    icon: 'error',
                    });
                }else{
                    Swal.fire({        
                    title: '¡Felicidades!',
                    text: 'El correo fue agregado con exito',
                    icon: 'success',
                     });
                        
                        $('#addemail').modal('hide');
                        // $('#nameuser').val('');
                        // $('#emailuser').val('');
                        // $('#sexo').prop('checked',false);
                        // $('#areauser').val('Seleccione una area');
                        // $('#descripcionuser').val('');
                     
                }
                
                
            }
            
        })
        return false
    }); 
</script>
<script>
    function eliminar(id){
		Swal.fire({
		title: 'Esta seguro?',
		text: "¿Desea borrar este empleado?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Si,borrar!',
		cancelButtonText: 'No, cancelar!',
		}).then((result) => {
			if (result["value"] == true){
				$.ajax({
					type: "DELETE",
					headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    },
					url:  "/empleados_data/" + id,
                    data: id,
					success: function(r){
						if (r['message']=="ok"){
								Swal.fire({
									title: 'Felicidades!',
									text:'Se ha borrado al empleado con exito',
									icon: 'success',
									confirmButtonText: 'OK!',
								}).then((res)=> {
									if (res["value"] == true){
										$('#tableuser').DataTable().ajax.reload();
									}
								})
							}
					}
				})
			}else{
					Swal.fire({
					title: 'Procesado!',
					text:'No se ha borrado esta empleado',
					icon: 'warning',
					});
				}
		});
	}
</script>
<script>
    /*Este codigo lanza el modals de la edicion de los datos en la pagina Totaltrabajador.php, y sirve para mostras los datos a editar, enlazado a extraertrabajador.php para sacar esos datos*/
    function modificar(id){
        $('#createuseredit').modal('show');
             $.ajax({
                type: "GET",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:  "/user_data/" + id,
                success: function(r){

                    $('#id').val(r['id']);
                    $('#editNameUser').val(r['nombres']);
                    $('#editLastNameUser').val(r['apellidos']);
                    $('#editIdentifier').val(r['cedula']);
                    $('#editEmailuser').val(r['email']);
                    $('#editCountry').val(r['pais']);
                    $('#editAddress').val(r['direccion']);
                    $('#editPhone').val(r['celular']);
                    $('#editCategoryUser').val(r['categoria']);         
                }
                
                
            });
    }

       $(document).on("click","#btnUsuarioEdit",function(){
        var datos = $('#editusercreate').serialize();
        var id = $('#id').val()
        $.ajax({
            type: "PUT",
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            url:  "/user_data/" + id,
            data: datos,
            success: function(r){

                if(r['message']=="error"){
                    Swal.fire({        
                    title: '¡Atención!',
                    text: 'Todos los campos son obligatorios', 
                    icon: 'error',
                    });
                }else{
                    Swal.fire({        
                    title: '¡Felicidades!',
                    text: 'Los datos fueron actualizados con exito',
                    icon: 'success',
                     });
                        $('#tableuser').DataTable().ajax.reload();
                        $('#createuseredit').modal('hide');
                        $('#editnameuser').val('');
                        $('#editemailuser').val('');
                        $('#editsexo').prop('checked',false);
                        $('#editareauser').val('Seleccione una area');
                        $('#editdescripcionuser').val('');
                     
                }
                
                
            }
            
        })
        return false;
    }); 
    </script>

@endsection