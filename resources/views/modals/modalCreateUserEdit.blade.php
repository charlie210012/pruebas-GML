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
                            <div class="form-group">
                                <label class="control-label">Apellidos *</label>
                                <input class="form-control" id="editLastNameUser" name="editLastNameUser" type="text"
                                    placeholder="Ingresa tus apellidos" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Cedula *</label>
                                <input class="form-control" id="editIdentifier" name="editIdentifier" type="number"
                                    placeholder="Ingresa tu número de cedula" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Correo Electronico *</label>
                                <input class="form-control" id="editEmailuser" name="editEmailuser" type="email"
                                    placeholder="ingresa tu correo electrónico" required>
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
                                <label class="control-label">Dirección *</label>
                                <input class="form-control" id="editAddress" name="editAddress" type="text"
                                    placeholder="Ingresa tu dirección" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Celular *</label>
                                <input class="form-control" id="editPhone" name="editPhone" type="text" placeholder="Ingresa tu número de celular"
                                    required>
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
