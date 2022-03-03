<!-- Modal -->
<div class="modal fade" id="createuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titulomodal">CREAR USUARIO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">

                <div class="tile">
                    <div class="tile-body">
                        <form id="userCreate" name="userCreate" method="POST">
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
                                <input class="form-control" id="nameUser" name="nameUser" type="text"
                                    placeholder="Ingresa tu nombre completo"  required>
                            </div>
                            <div class="alert alert-danger" id="namealert" name="namealert"  role="alert" style="display:none">
                                No se permiten numeros, solo letras minimo 5 y maximo 100 caracteres
                            </div>
                            <div class="form-group">
                                <label class="control-label">Apellidos *</label>
                                <input class="form-control" id="lastNameUser" name="lastNameUser" type="text"
                                    placeholder="Ingresa tus apellidos" required>
                            </div>
                            <div class="alert alert-danger" id="lastnamealert" name="lastnamealert"  role="alert" style="display:none">
                                No se permiten numeros, solo letras maximo 100 caracteres
                            </div>
                            <div class="form-group">
                                <label class="control-label">Cedula *</label>
                                <input class="form-control" id="identifier" name="identifier" type="number"
                                    placeholder="Ingresa tu número de cedula" required>
                            </div>
                            <div class="alert alert-danger" id="identifierAlert" name="identifierAlert"  role="alert" style="display:none">
                                solo se permiten caracteres numericos
                            </div>
                            <div class="form-group">
                                <label class="control-label">Correo Electronico *</label>
                                <input class="form-control" id="emailuser" name="emailuser" type="email"
                                    placeholder="ingresa tu correo electrónico" required>
                            </div>
                            <div class="alert alert-danger" id="emailAlert" name="emailAlert"  role="alert" style="display:none">
                                Ingresa un correo electroníco valido
                            </div>
                            <div class="form-group">
                                <label class="control-label">Pais *</label>
                                <select class="form-control" id="country" name="country" placeholder="Escoje el pais"
                                    required>
                                    <option value="0">Seleccione el pais</option>
                                    @foreach ($paises as $pais)
                                        <option> {{ $pais['country'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Dirección *</label>
                                <input class="form-control" id="address" name="address" type="text" placeholder="Ingresa tu dirección"
                                    required>
                            </div>
                            <div class="alert alert-danger" id="addressAlert" name="addressAlert"  role="alert" style="display:none">
                                Se permiten maximo 180 caracteres
                            </div>
                            <div class="form-group">
                                <label class="control-label">Celular *</label>
                                <input class="form-control" id="phone" name="phone" type="number" placeholder="Ingresa tu número de celular"
                                    required>
                            </div>
                            <div class="alert alert-danger" id="phoneAlert" name="phoneAlert"  role="alert" style="display:none">
                                Numero no valido
                            </div>
                            <div class="form-group">
                                <label class="control-label">Categoria *</label>
                                <select class="form-control" id="categoryUser" name="categoryUser" placeholder="Escoje area"
                                    required>
                                    <option value="0">Seleccione una categoria</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}"> {{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="submit"  class="btn btn-primary" id="btnUsuario"><span id="btntext"
                                        class="bg-light"></span>Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    const btnUsuario = document.getElementById('btnUsuario');
    const form = document.getElementById('userCreate');
    const inputs = document.querySelectorAll("#userCreate input");

    const expresiones = {
        correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/
    }

    const validarFormulario = (e) =>{

        
        switch (e.target.name){
            case "nameUser":
                if( e.target.value == null || e.target.value.length <= 5 || /^\s+$/.test(e.target.value) ) {
                    document.getElementById("namealert").style.display = "block";
                }else{
                    document.getElementById("namealert").style.display = "none";
                }
            break;
            case "lastNameUser":
                if( e.target.value == null || e.target.value.length <= 0 || /^\s+$/.test(e.target.value) ) {
                    document.getElementById("lastnamealert").style.display = "block";
                }else{
                    document.getElementById("lastnamealert").style.display = "none";
                }
            break;
            case "identifier":
                if( isNaN(e.target.value) ) {
                    document.getElementById("identifierAlert").style.display = "block";
                }else{
                    document.getElementById("identifierAlert").style.display = "none";
                }
            break;
            case "emailuser":
                if( !expresiones.correo.test(e.target.value)) {
                    document.getElementById("emailAlert").style.display = "block";
                }else{
                    document.getElementById("emailAlert").style.display = "none";
                }
            break;
            case "address":
                if( e.target.value.length >= 180 ) {
                    document.getElementById("addressAlert").style.display = "block";
                }else{
                    document.getElementById("addressAlert").style.display = "none";
                }
            break;
            case "phone":
                if( e.target.value.length != 10 ) {
                    document.getElementById("phoneAlert").style.display = "block";
                }else{
                    document.getElementById("phoneAlert").style.display = "none";
                }
            break;
        }
    
    }


    inputs.forEach((input) => {
        input.addEventListener('keyup',validarFormulario);
        input.addEventListener('blur',validarFormulario);
    });
</script>
