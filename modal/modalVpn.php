<div class="modal fade" id="modalVpn" tabindex="-1" role="dialog" aria-labelledby="modalVpn" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalVpn">Añadir acceso VPN a
                    <?php
                    foreach ($dataInfoCliente as $dataIC) {
                        echo $dataIC['cliente'];
                    } ?>.
                </h5>
                <button class="close" id="btnCerrarVPNX" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col">
                            <form id="vpn" action="POST" class="">

                                <div class="form-group row">
                                    <?php
                                    foreach ($dataInfoCliente as $dataIC) {
                                    ?>
                                        <input type="hidden" value="<?php echo $dataIC['id'] ?>" id="idClienteVPN" />
                                    <?php
                                    } ?>
                                    <div class="col-md-4 mb-4">
                                        <label for="nombreContacto">Direccion IP *</label>
                                        <input type="text" class="form-control" id="ipvpn" placeholder="0000.0000.0000.0000" required>
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <label for="nombreContacto">Usuario *</label>
                                        <input type="text" class="form-control" id="uservpn" placeholder="usuarios de acceso" required>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label for="correo">Contraseña *</label>
                                        <input type="password" class="form-control" id="passvpn" placeholder="contraseña" required>
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <label for="telefono">Tipo de VPN *</label>
                                        <div class="form-check">
                                            <input class="form-check-input" checked="checked" name="vpn" type="radio" id="globalVPN" value="Global VPN Client" />
                                            <label class="form-check-label" for="globalVPN">
                                                Global Client VPN
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="vpn" type="radio" id="netVPN" value="NetExtender" />
                                            <label class="form-check-label" for="netVPN">
                                                NetExtender
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-8 mb-4" id="divSharedSecret" style="display:block;">
                                        <label for="sharedsecret">SharedSecret</label>
                                        <input type="password" class="form-control" id="sharedsecret" placeholder="sharedsecret">
                                    </div>
                                    
                                </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success" id="accionVPN" value="crear" type="submit">Aceptar</button>
                <button class="btn btn-default" id="btnCerrarVPN" value="cerrar" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>