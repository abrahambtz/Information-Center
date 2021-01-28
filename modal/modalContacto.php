<div class="modal fade" id="modalContacto" tabindex="-1" role="dialog" aria-labelledby="modalContacto" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalContacto">Añadir contacto a
                    <?php
                    foreach ($dataInfoCliente as $dataIC) {
                        echo $dataIC['cliente'];
                    } ?>.
                </h5>
                <button class="close" id="btnCerrarContactoX" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col">
                            <form id="contacto" action="POST" class="">

                                <div class="form-group row">
                                    <?php
                                    foreach ($dataInfoCliente as $dataIC) {
                                    ?>
                                        <input type="hidden" value="<?php echo $dataIC['id'] ?>" id="idCliente" />
                                    <?php
                                    } ?>
                                    <div class="col-md-6 mb-4">
                                        <label for="nombreContacto">Nombre completo *</label>
                                        <input type="text" class="form-control" id="nombreContacto" placeholder="nombre del contacto" required>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="correo">Correo electronico *</label>
                                        <input type="text" class="form-control" id="correo" placeholder="correo del contacto" required>
                                    </div>

                                    <div class="col-md-5 mb-4">
                                        <label for="telefono">Telefono *</label>
                                        <input type="text" class="form-control" id="telefono" placeholder="telefono" required>
                                    </div>
                                    <div class="col-md-2 mb-4">
                                        <label for="extencion">ext</label>
                                        <input type="text" class="form-control" id="extencion" placeholder="opcional">
                                    </div>
                                    <div class="col-md-5 mb-4">
                                        <label for="celular">Celular</label>
                                        <input type="text" class="form-control" id="celular" placeholder="opcional">
                                    </div>

                                </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
            <button class="btn btn-success" id="accionContacto" value="crear" type="submit">Aceptar</button>
                <button class="btn btn-default" id="btnCerrarContacto" value="cerrar" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>