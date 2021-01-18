<div class="col-12 col-lg-12 pt-3">
    <div id="accordionWireless">
        <div class="card">
            <div class="card-body text-danger pb-0" id="headingWireless">
                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-block text-left" data-toggle="collapse" data-target="#collapseWireless" aria-expanded="true" aria-controls="collapseWireless">
                            <h5 class="card-title">Wireless</h5>
                        </a>
                    </div>
                    <div class="col-6 text-right">
                        <button class="btn btn-sm btn-success ">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div id="collapseWireless" class="collapse show" aria-labelledby="headingWireless" data-parent="#accordionWireless">
                <div class="card-body text-secondary">
                    <div id="accordionWControladora">
                        <div id="headingWControladora">
                            <div class="row">
                                <div class="col-6">
                                    <a class="btn btn-block text-left ml-3" data-toggle="collapse" data-target="#collapseWControladora" aria-expanded="true" aria-controls="collapseWControladora">
                                        <h6 class="card-title">Controladora</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div id="collapseWControladora" class="collapse show" aria-labelledby="headingWControladora" data-parent="#accordionWControladora">
                            <table class="table  table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Ubicacion</th>
                                        <th scope="col" class="text-center">IP</th>

                                        <th scope="col" class="text-center">Usuario</th>
                                        <th scope="col" class="text-center">Contraseña</th>
                                        <th scope="col" class="text-center">Puerto</th>
                                        <th scope="col" class="text-center">Comentarios</th>
                                        <th scope="col" class="text-right">Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $infoWireless = obtenerControladora($_POST['clienteOp']);
                                    $datainfoWireless = $infoWireless->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($datainfoWireless as $dataIW) {
                                    ?>
                                        <tr>
                                            <?php
                                            if ($dataIW['nombre'] == null) $nombre = "Controladora";
                                            else $nombre = $dataIW['nombre'];
                                            ?>
                                            <td>
                                                <div class=" btn" data-container="body" data-placement="right" data-toggle="popover" title="<?php echo $nombre ?>" data-content="<div>Modelo: <?php echo $dataIW['modelo']; ?><br>N/S: <?php echo $dataIW['numeroSerie']; ?><br>Mac: <?php echo $dataIW['mac']; ?><br>Firmware: <?php echo $dataIW['firmware']; ?></div>" data-html="true">
                                                    <?php echo $dataIW['ubicacion']; ?></div>
                                            </td>
                                            <td class="text-center">
                                                <p target="_blank" style="text-decoration:none" data-toggle="tooltip" data-placement="bottom" title="copiar"><?php echo $dataIW['ip']; ?></p>
                                            </td>

                                            <?php
                                            $infoWirelessCredenciales = obtenerControladoraCredenciales($dataIW['id']);
                                            $dataInfoWirelessCredenciales = $infoWirelessCredenciales->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                            <td class="text-center">
                                                <?php
                                                $cont = 0;
                                                foreach ($dataInfoWirelessCredenciales as $dataIWC) {
                                                    if ($cont > 0) {
                                                        echo " / ";
                                                    }
                                                    echo $dataIWC['usuario'];
                                                    $cont = 1;
                                                } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $cont = 0;
                                                foreach ($dataInfoWirelessCredenciales as $dataIWC) {
                                                    if ($cont > 0) {
                                                        echo " / ";
                                                    }
                                                    echo $dataIWC['contrasena'];
                                                    $cont = 1;
                                                } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $dataIW['puerto']; ?>
                                            </td>
                                            <td class="text-center">
                                                <i class="far fa-comments " data-placement="left" data-toggle="popover" title="Comentarios." data-content="<div class='row'><div class='col-12'>  <?php echo $dataIW['comentarios']; ?></div></div>" data-html="true"></i>
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
                    <div id="accordionWAPS">
                        <div id="headingWAPS">
                            <div class="row">
                                <div class="col-6">
                                    <a class="btn btn-block text-left ml-3" data-toggle="collapse" data-target="#collapseWAPS" aria-expanded="true" aria-controls="collapseWAPS">
                                        <h6 class="card-title">Wireless Access Point</h6>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div id="collapseWAPS" class="collapse show" aria-labelledby="headingWAPS" data-parent="#accordionWAPS">
                        <table class="table  table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Ubicacion</th>
                                        <th scope="col" class="text-center">IP</th>
                                        <th scope="col" class="text-center">Usuario</th>
                                        <th scope="col" class="text-center">Contraseña</th>
                                        <th scope="col" class="text-center">Puerto</th>
                                        <th scope="col" class="text-center">Comentarios</th>
                                        <th scope="col" class="text-right">Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $infoWireless = obtenerAPS($_POST['clienteOp']);
                                    $datainfoWireless = $infoWireless->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($datainfoWireless as $dataIW) {
                                    ?>
                                        <tr>
                                            <?php
                                            if ($dataIW['nombre'] == null) $nombre = "Controladora";
                                            else $nombre = $dataIW['nombre'];
                                            ?>
                                            <td>
                                                <div class=" btn" data-container="body" data-placement="right" data-toggle="popover" title="APS de <?php echo $nombre ?>" data-content="<div>Marca: <?php echo $dataIW['marca']; ?><br>Modelo: <?php echo $dataIW['modelo']; ?><br>N/S: <?php echo $dataIW['numeroSerie']; ?><br>Mac: <?php echo $dataIW['mac']; ?></div>" data-html="true">
                                                    <?php echo $dataIW['ubicacion']; ?></div>
                                            </td>
                                            <td class="text-center">
                                                <p target="_blank" style="text-decoration:none" data-toggle="tooltip" data-placement="bottom" title="copiar"><?php echo $dataIW['ip']; ?></p>
                                            </td>
                                            <?php
                                            $infoWirelessCredenciales = obtenerAPSCredenciales($dataIW['id']);
                                            $dataInfoWirelessCredenciales = $infoWirelessCredenciales->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                            <td class="text-center">
                                                <?php
                                                $cont = 0;
                                                foreach ($dataInfoWirelessCredenciales as $dataIWC) {
                                                    if ($cont > 0) {
                                                        echo " / ";
                                                    }
                                                    echo $dataIWC['usuario'];
                                                    $cont = 1;
                                                } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $cont = 0;
                                                foreach ($dataInfoWirelessCredenciales as $dataIWC) {
                                                    if ($cont > 0) {
                                                        echo " / ";
                                                    }
                                                    echo $dataIWC['contrasena'];
                                                    $cont = 1;
                                                } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $dataIW['puerto']; ?>
                                            </td>
                                            <td class="text-center">
                                                <i class="far fa-comments " data-placement="left" data-toggle="popover" title="Comentarios." data-content="<div class='row'><div class='col-12'>  <?php echo $dataIW['comentarios']; ?></div></div>" data-html="true"></i>
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
    </div>
</div>