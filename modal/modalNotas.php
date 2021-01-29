<div class="modal fade" id="modalNotas" tabindex="-1" role="dialog" aria-labelledby="modalNotas" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNotas">Añadir nota a
                    <?php
                    foreach ($dataInfoCliente as $dataIC) {
                        echo $dataIC['cliente'];
                    } ?>.
                </h5>
                <button class="close" id="btnCerrarNotasX" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col">
                            <form id="notas" action="POST" class="">

                                <div class="form-group row">
                                    <?php
                                    foreach ($dataInfoCliente as $dataIC) {
                                    ?>
                                        <input type="hidden" value="<?php echo $dataIC['id'] ?>" id="idClienteNotas" />
                                    <?php
                                    } ?>
                                    <div class="col-md-12 mb-3">
                                        <label for="nombreNota">Nombre *</label>
                                        <input type="text" class="form-control" id="nombreNota" placeholder="nombre de la nota" required>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="descrpcionNota">Descripcion *</label>
                                        <textarea  type="text" class="form-control" id="descrpcionNota" placeholder="ingresa la informacion de la nota..." rows="6" required></textarea>
                                    </div>      
                                   
                                    
                                </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success" id="accionNotas" value="crear" type="submit">Aceptar</button>
                <button class="btn btn-default" id="btnCerrarNotas" value="cerrar" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>