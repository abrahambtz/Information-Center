<div class="col-12 col-lg-12 pt-3">
    <div id="accordionSwitch">
        <div class="card">
            <div class="card-body text-primary pb-0" id="headingSwitch">
                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-block text-left" data-toggle="collapse" data-target="#collapseSwitch" aria-expanded="false" aria-controls="collapseSwitch">
                            <h5 class="card-title">Switch</h5>
                        </a>
                    </div>
                    <div class="col-6 text-right">
                        <button class="btn btn-sm btn-success ">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div id="collapseSwitch" class="collapse" aria-labelledby="headingSwitch" data-parent="#accordionSwitch">
                <div class="card-body text-secondary">
                    <table class="table  table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Ubicacion</th>
                                <th scope="col" class="text-center">IP</th>
                                <th scope="col" class="text-left">Nombre</th>
                                <th scope="col" class="text-center">Usuario</th>
                                <th scope="col" class="text-center">Contraseña</th>

                                <th scope="col" class="text-center">Comentarios</th>
                                <th scope="col" class="text-right">Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $infoSwitch = obtenerSwitch($_POST['clienteOp']);
                            $datainfoSwitch = $infoSwitch->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($datainfoSwitch as $dataISW) {
                            ?>
                                <tr>
                                    <?php
                                    $infoSwitches = obtenerSwitches($dataISW['id']);
                                    $dataInfoSwitches = $infoSwitches->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <td>
                                        <div class=" btn" data-container="body" data-placement="left" data-toggle="popover" title="Switches" data-content="<?php $cont = 1;
                                                                                                                                                            foreach ($dataInfoSwitches as $dataISWS) { ?><div>Switch <?php echo $cont;
                                                                                                                                                                                                                        $cont++; ?><br>Marca: <?php echo $dataISWS['marca']; ?><br>Modelo: <?php echo $dataISWS['modelo']; ?><br>N/S: <?php echo $dataISWS['numeroSerie']; ?><br>Mac: <?php echo $dataISWS['mac']; ?></div><br><?php } ?>" data-html="true">
                                            <?php echo $dataISW['ubicacion']; ?></div>
                                    </td>
                                    <td class="text-center">
                                        <p target="_blank" style="text-decoration:none" data-toggle="tooltip" data-placement="bottom" title="<?php echo $dataISW['acceso']; ?>"><?php echo $dataISW['ip']; ?></p>
                                    </td>
                                    <td class="text-left">
                                        <?php echo $dataISW['nombre']; ?>
                                    </td>
                                    <?php
                                    $infoSwitchCredenciales = obtenerSwitchCredenciales($dataISW['id']);
                                    $dataInfoSwitchCredenciales = $infoSwitchCredenciales->fetchAll(PDO::FETCH_ASSOC);
                                    ?>

                                    <td class="text-center">
                                        <?php
                                        $cont = 0;
                                        foreach ($dataInfoSwitchCredenciales as $dataISWC) {
                                            if ($cont > 0) {
                                                echo " / ";
                                            }
                                            echo $dataISWC['usuario'];
                                            $cont = 1;
                                        } ?>
                                    </td>

                                    <td class="text-center">
                                        <?php
                                        $cont = 0;
                                        foreach ($dataInfoSwitchCredenciales as $dataISWC) {
                                            if ($cont > 0) {
                                                echo " / ";
                                            }
                                            echo $dataISWC['contrasena'];
                                            $cont = 1;
                                        } ?>
                                    </td>
                                    <td class="text-center">
                                        <i class="far fa-comments " data-placement="left" data-toggle="popover" title="Comentarios." data-content="<div class='row'><div class='col-12'>  <?php echo $dataISW['comentarios']; ?></div></div>" data-html="true"></i>
                                    </td>
                                    <td>
                                        <p class=" m-0 text-right">
                                            <button class="btn btn-sm btn-info rounded-circle text-right" data-toggle="tooltip" data-placement="bottom" title="Editar">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger rounded-circle" data-toggle="tooltip" data-placement="bottom" title="Eliminar">
                                                <i class="fas fa-trash-alt"></i></i>
                                            </button>
                                        </p>
                                    </td>
                                </tr>


                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>