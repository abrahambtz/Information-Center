<div class="modal fade" id="modalFirewall" tabindex="-1" role="dialog" aria-labelledby="modalFirewall" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFirewall">Añadir firewall a
                    <?php
                    foreach ($dataInfoCliente as $dataIC) {
                        echo $dataIC['cliente'];
                    } ?>.
                </h5>
                <button class="close" id="btnCerrarFirewallX" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col">
                            <form id="firewallForm" action="POST" class="">

                                <div class="form-group row">
                                    <?php
                                    foreach ($dataInfoCliente as $dataIC) {
                                    ?>
                                        <input type="hidden" value="<?php echo $dataIC['id'] ?>" id="idClienteFirewall" />
                                    <?php
                                    } ?>
                                    <div class="col-md-8 mb-2">
                                        <b><label >Ubicacion. *</label></b>
                                        <input type="text" class="form-control" id="ubicacionFirewall" placeholder="ubicacion o sitio del equipo" required>
                                    </div>
                                    <div class="col-md-12 text-left">
                                        <b> <label>Accesos. *</label></b>
                                    </div>
                                    <div class="col-md-12 mb-2">

                                        <div class="card card-body p-2">
                                            <div class="row pr-0">
                                                <div class="col-9 col-md-10 text-left mt-1">
                                                    <label>URL - IP</label>
                                                </div>

                                                <div class="col-1 col-md-1 pr-0 text-right">
                                                    <button class="btn btn-sm btn-danger" id="btnEliminarAcceso" value="eliminar" type="button">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                                <div class="col-1 col-md-1 text-right">
                                                    <button class="btn btn-sm btn-success" id="btnNuevaAcceso" value="crear" type="button">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-12 ">
                                                    <div class="row mb-1">
                                                        <div class="col-5 col-md-6 pr-1">
                                                            <input type="text" class="form-control form-control-sm" id="acceso" placeholder="" required>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-12" id="listaAcceso">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="card card-body p-2">
                                            <div class="row pr-0">
                                                <div class="col-5 col-md-5 text-left mt-1">
                                                    <label>Usuario.</label>
                                                </div>
                                                <div class="col-4 col-md-5 text-left mt-1 pl-1 p-0">
                                                    <label>Contraseña.</label>
                                                </div>
                                                <div class="col-1 col-md-1 pr-0 text-right">
                                                    <button class="btn btn-sm btn-danger" id="btnEliminarCredencial" value="eliminar" type="button">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                                <div class="col-1 col-md-1 text-right">
                                                    <button class="btn btn-sm btn-success" id="btnNuevaCredencial" value="crear" type="button">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-12 ">
                                                    <div class="row mb-1">
                                                        <div class="col-5 col-md-5 pr-1">
                                                            <input type="text" class="form-control form-control-sm" id="usuarioFirewall" placeholder="" required>
                                                        </div>
                                                        <div class="col-5 col-md-5 pl-1">
                                                            <input type="text" class="form-control form-control-sm" id="contrasenaFirewall" placeholder="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" id="listaCredenciales">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-left">
                                        <b><label>Detalles de Equipo. *</label></b>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="correo">Modelo. </label>
                                        <input type="text" class="form-control" id="modelo" placeholder="modelo del equipo" required>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label for="telefono">Numero de Serie.</label>
                                        <input type="text" class="form-control" id="nsFirewall" placeholder="numero de serie del equipo" required>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="extencion">Version de Firmware.</label>
                                        <input type="text" class="form-control" id="firmwareFirewall" placeholder="ingrese la version del equipo">
                                    </div>
                                    <div class="col-md-12 text-left">
                                        <b> <label>Descripcion de interfaces. *</label></b>
                                    </div>
                                    <div class="col-md-12 mb-2">

                                        <div class="card card-body p-2">
                                            <div class="row pr-0">
                                                <div class="col-5 col-md-6 text-left mt-1">
                                                    <label>IP</label>
                                                </div>
                                                <div class="col-4 col-md-4 text-left mt-1 pl-1 p-0">
                                                    <label>Puerto-Nombre</label>
                                                </div>
                                                <div class="col-1 col-md-1 pr-0 text-right">
                                                    <button class="btn btn-sm btn-danger" id="btnEliminarInterfaz" value="eliminar" type="button">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                                <div class="col-1 col-md-1 text-right">
                                                    <button class="btn btn-sm btn-success" id="btnNuevaInterfaz" value="crear" type="button">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-12 ">
                                                    <div class="row mb-1">
                                                        <div class="col-5 col-md-6 pr-1">
                                                            <input type="text" class="form-control form-control-sm" id="interfaz" placeholder="" required>
                                                        </div>
                                                        <div class="col-4 col-md-3 pl-1">
                                                            <input type="text" class="form-control form-control-sm" id="puerto" placeholder="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" id="listaInterfaz">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <b><label>Comentarios. </label></b>                          
                                        <textarea class="form-control" id="comentarios" rows="5" placeholder="ingresa tus comentarios del equipo"></textarea>
                                    </div>
                                </div>


                        </div>
                    </div>


                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success" id="accionFirewall" value="crear" type="submit">Aceptar</button>
                <button class="btn btn-default" id="btnCerrarFirewall" value="cerrar" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>