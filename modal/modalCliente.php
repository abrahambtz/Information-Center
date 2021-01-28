<div class="modal fade" id="modalInsertarCliente" tabindex="-1" role="dialog" aria-labelledby="modalInsertarCliente" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalInsertarCliente">Añadir cliente.</h5>
                <button class="close" data-dismiss="modal" aria-label="Cerrar" id="btnCerrarX">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col">
                            <form id="cliente" action="POST" class="">
                                <div class="form-group row">
                                    <div class="col-12 mb-3">
                                        <label for="nombre">Nombre del cliente.</label>
                                        <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" required>
                                        <div class="invalid-feedback">
                                            Selecciona
                                        </div>
                                    </div>
                                    <div class="col-12  mb-2 input-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="matriz">Matriz</label>
                                        </div>
                                        <select class="custom-select" id="matriz" required>
                                            <option value="">Seleccionar...</option>
                                            <option value="1">A</option>
                                            <option value="2">B</option>
                                            <option value="3">C</option>
                                        </select>
                                        <div class="invalid-feedback">Selecciona</div>
                                    </div>
                                    <div class="col-12 ">
                                        <label for="nombre">Tecnologia</label>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="col-5 col-lg-3 form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="firewall" value="1">
                                            <label class="form-check-label" for="firewall">Firewall</label>
                                        </div>
                                        <div class="col-5 col-lg-3 form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="switches" value="1">
                                            <label class="form-check-label" for="switch">Switch</label>
                                        </div>
                                        <div class="col-5 col-lg-3 form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="telefonia" value="1">
                                            <label class="form-check-label" for="telefonia">Telefonia</label>
                                        </div>
                                        <div class="col-5 col-lg-2 form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="wireless" value="1">
                                            <label class="form-check-label" for="wireless">Wireless</label>
                                        </div>
                                        <div class="invalid-feedback">
                                            Selecciona
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success" id="accion" value="crear" type="submit">Aceptar</button>
                <button class="btn btn-default" id="btnCerrar" value="cerrar" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>

