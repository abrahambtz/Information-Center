<div class="modal fade" id="modalInsertarCliente" tabindex="-1" role="dialog" aria-labelledby="modalInsertarCliente" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalInsertarCliente">Añadir cliente.</h5>
                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col">
                            <form id="cliente" action="POST" class="">
                                <div class="form-group row">
                                    <div class="col-12 mb-5">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" required>
                                        <div class="invalid-feedback">
                                        Selecciona
                                        </div>
                                    </div>
                                    <div class="col-12  mb-3 input-group">
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
                                </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success" id="accion" value="crear" type="submit">Aceptar</button>
                <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
            </form>
        </div>
    </div>
</div>