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
                                    placeholder="Ingresa tu nombre completo" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Apellidos *</label>
                                <input class="form-control" id="lastNameUser" name="lastNameUser" type="text"
                                    placeholder="Ingresa tus apellidos" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Cedula *</label>
                                <input class="form-control" id="identifier" name="identifier" type="number"
                                    placeholder="Ingresa tu número de cedula" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Correo Electronico *</label>
                                <input class="form-control" id="emailuser" name="emailuser" type="email"
                                    placeholder="ingresa tu correo electrónico" required>
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
                            <div class="form-group">
                                <label class="control-label">Celular *</label>
                                <input class="form-control" id="phone" name="phone" type="text" placeholder="Ingresa tu número de celular"
                                    required>
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
                                <button type="submit" class="btn btn-primary" id="btnUsuario"><span id="btntext"
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
    const form = document.getElementById('userCreate');
    const inputs = document.querySelectorAll("#userCreate input");

    const expresiones = {
        usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
        nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
        password: /^.{4,12}$/, // 4 a 12 digitos.
        correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
        telefono: /^\d{7,14}$/ // 7 a 14 numeros.
    }

    const validarFormulario = (e) =>{
        switch (e.target.name){
            case "nameUser":
                console.log("Funciona")
            break;
            case "lastNameUser":
                console.log("Funciona")
            break;
            case "identifier":
                console.log("Funciona")
            break;
            case "emailuser":
                console.log("Funciona")
            break;
            case "country":
                console.log("Funciona")
            break;
            case "address":
                console.log("Funciona")
            break;
            case "phone":
                console.log("Funciona")
            break;
            case "categoryUser":
                console.log("Funciona")
            break;
        }
    }

    inputs.forEach((input) => {
        input.addEventListener('keyup',validarFormulario);
        input.addEventListener('blur',validarFormulario);
    });
</script>