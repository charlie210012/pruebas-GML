<!-- Modal -->
<div class="modal fade" id="createuseredit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titulomodal">Actualizar datos de usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="tile">
                    <div class="tile-body">
                        <form id="editusercreate" name="editusercreate" method="POST">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="alert alert-primary" role="alert">
                                    Los campos con (*) son obligatorios
                                </div>
                                <label class="control-label">Nombres *</label>
                                <input class="form-control" id="editNameUser" name="editNameUser" type="text"
                                    placeholder="Ingresa tu nombre completo" required>
                            </div>
                            <div class="alert alert-danger" id="Enamealert" name="Enamealert"  role="alert" style="display:none">
                                No se permiten numeros, solo letras minimo 5 y maximo 100 caracteres
                            </div>
                            <div class="form-group">
                                <label class="control-label">Apellidos *</label>
                                <input class="form-control" id="editLastNameUser" name="editLastNameUser" type="text"
                                    placeholder="Ingresa tus apellidos" required>
                            </div>
                            <div class="alert alert-danger" id="Elastnamealert" name="Elastnamealert"  role="alert" style="display:none">
                                No se permiten numeros, solo letras maximo 100 caracteres
                            </div>
                            <div class="form-group">
                                <label class="control-label">Cedula *</label>
                                <input class="form-control" id="editIdentifier" name="editIdentifier" type="number"
                                    placeholder="Ingresa tu n??mero de cedula" required>
                            </div>
                            <div class="alert alert-danger" id="EidentifierAlert" name="EidentifierAlert"  role="alert" style="display:none">
                                solo se permiten caracteres numericos
                            </div>

                            <div class="form-group">
                                <label class="control-label">Correo Electronico *</label>
                                <input class="form-control" id="editEmailuser" name="editEmailuser" type="email"
                                    placeholder="ingresa tu correo electr??nico" required>
                            </div>
                            <div class="alert alert-danger" id="EemailAlert" name="EemailAlert"  role="alert" style="display:none">
                                Ingresa un correo electron??co valido
                            </div>
                            <div class="form-group">
                                <label class="control-label">Pais *</label>
                                <select class="form-control" id="editCountry" name="editCountry" placeholder="Escoje el pais"
                                    required>
                                    <option value="0">Seleccione el pais</option>
                                    @foreach ($paises as $pais)
                                        <option> {{ $pais['country'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Direcci??n *</label>
                                <input class="form-control" id="editAddress" name="editAddress" type="text"
                                    placeholder="Ingresa tu direcci??n" required>
                            </div>
                            <div class="alert alert-danger" id="EaddressAlert" name="EaddressAlert"  role="alert" style="display:none">
                                Se permiten maximo 180 caracteres
                            </div>
                            <div class="form-group">
                                <label class="control-label">Celular *</label>
                                <input class="form-control" id="editPhone" name="editPhone" type="text" placeholder="Ingresa tu n??mero de celular"
                                    required>
                            </div>
                            <div class="alert alert-danger" id="EphoneAlert" name="EphoneAlert"  role="alert" style="display:none">
                                Numero no valido
                            </div>
                            <div class="form-group">
                                <label class="control-label">Categoria *</label>
                                <select class="form-control" id="editCategoryUser" name="editCategoryUser"
                                    placeholder="Escoje area" required>
                                    <option value="0">Seleccione una categoria</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}"> {{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                                <input id="id" name ="id" type="text" placeholder="id" readonly=""  style="visibility:hidden">
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" id="btnUsuarioEdit"><span id="btntext"
                                        class="bg-light"></span>Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    
    const formEdit = document.getElementById('editusercreate');
    const Einputs = document.querySelectorAll("#editusercreate input");

    // const expresiones = {
    //     correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    //     texto: /^[a-zA-Z??-??\s]{1,100}$/
    // }

    const validarFormularioEdit = (e) =>{

        switch (e.target.name){
            case "editNameUser":
                if( e.target.value == null || e.target.value.length <= 5 || e.target.value.length >= 100  || (!expresiones.texto.test(e.target.value)) ) {
                    document.getElementById("Enamealert").style.display = "block";
                    document.getElementById('btnUsuarioEdit').disabled = true;
                }else{
                    document.getElementById("Enamealert").style.display = "none";
                    document.getElementById('btnUsuarioEdit').disabled = false;
                }
            break;
            case "editLastNameUser":
                if( e.target.value == null || e.target.value.length <= 0 || e.target.value.length >= 100  || (!expresiones.texto.test(e.target.value)) ) {
                    document.getElementById("Elastnamealert").style.display = "block";
                    document.getElementById('btnUsuarioEdit').disabled = true;
                }else{
                    document.getElementById("Elastnamealert").style.display = "none";
                    document.getElementById('btnUsuarioEdit').disabled = false;
                }
            break;
            case "editIdentifier":
                if( isNaN(e.target.value) ) {
                    document.getElementById("EidentifierAlert").style.display = "block";
                    document.getElementById('btnUsuarioEdit').disabled = true;
                }else{
                    document.getElementById("EidentifierAlert").style.display = "none";
                    document.getElementById('btnUsuarioEdit').disabled = false;
                }
            break;
            case "editEmailuser":
                if( !expresiones.correo.test(e.target.value)) {
                    document.getElementById("EemailAlert").style.display = "block";
                    document.getElementById('btnUsuarioEdit').disabled = true;
                }else{
                    document.getElementById("EemailAlert").style.display = "none";
                    document.getElementById('btnUsuarioEdit').disabled = false;
                }
            break;
            case "editAddress":
                if( e.target.value.length >= 180 ) {
                    document.getElementById("EaddressAlert").style.display = "block";
                    document.getElementById('btnUsuario').disabled = true;
                }else{
                    document.getElementById("EaddressAlert").style.display = "none";
                    document.getElementById('btnUsuario').disabled = false;
                }
            break;
            case "editPhone":
                if( e.target.value.length != 10 ) {
                    document.getElementById("EphoneAlert").style.display = "block";
                    document.getElementById('btnUsuario').disabled = true;
                }else{
                    document.getElementById("EphoneAlert").style.display = "none";
                    document.getElementById('btnUsuario').disabled = false;
                }
            break;
        }
        
    }


    Einputs.forEach((Einput) => {
        Einput.addEventListener('keyup',validarFormularioEdit);
        Einput.addEventListener('blur',validarFormularioEdit);
    });
</script>
