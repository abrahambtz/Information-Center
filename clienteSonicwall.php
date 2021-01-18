<div class="col-12 col-lg-12 pt-3">
    <div id="accordionSonicwall">
        <div class="card">
            <div class="card-body text-warning pb-0" id="headingSonicwall">
                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-block text-left" data-toggle="collapse" data-target="#collapseSonicwall" aria-expanded="false" aria-controls="collapseSonicwall">
                            <h5 class="card-title">Sonicwall</h5>
                        </a>
                    </div>
                    <div class="col-6 text-right">
                        <button class="btn btn-sm btn-success ">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div id="collapseSonicwall" class="collapse" aria-labelledby="headingSonicwall" data-parent="#accordionSonicwall">
                <div class="card-body text-secondary">
                    <table class="table  table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Ubicacion</th>
                                <th scope="col">Acceso</th>
                                <th scope="col" class="text-center">Usuario</th>
                                <th scope="col" class="text-center">Contraseña</th>
                                <th scope="col" class="text-center">Interfaz</th>
                                <th scope="col" class="text-center">Comentarios</th>
                                <th scope="col" class="text-right">Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $infoSonicwall = obtenerSonicwall($_POST['clienteOp']);
                            $dataInfoSonicwall = $infoSonicwall->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($dataInfoSonicwall as $dataIS) {
                            ?>
                                <tr>
                                    <td>
                                        <div class=" btn" data-container="body" data-placement="left" data-toggle="popover" title="Informacion de Equipo" data-content="<div>Modelo: <?php echo $dataIS['modelo']; ?><br>N/S: <?php echo $dataIS['numeroSerie']; ?><br>Firmware:<br> <?php echo $dataIS['versionDeFirmware']; ?></div>" data-html="true">
                                            <?php echo $dataIS['ubicacion']; ?></div>
                                    </td>
                                    <?php
                                    $infoSonicwallAcceso = obtenerSonicwallAcceso($dataIS['id']);
                                    $dataInfoSonicwallAcceso = $infoSonicwallAcceso->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <td>
                                        <?php
                                        $cont = 0;
                                        foreach ($dataInfoSonicwallAcceso as $dataISA) {
                                            if ($cont > 0) {
                                        ?><br><?php
                                            }
                                                ?><a href="https://<?php echo $dataISA['ip']; ?>" target="_blank" style="text-decoration:none" data-toggle="tooltip" data-placement="bottom" title="Abrir"><?php echo $dataISA['ip']; ?></a><?php
                                                                                                                                                                                                                                        $cont = 1;
                                                                                                                                                                                                                                    } ?>

                                    </td>
                                    <?php

                                    $infoSonicwallCredenciales = obtenerSonicwallCredenciales($dataIS['id']);
                                    $dataInfoSonicwallCredenciales = $infoSonicwallCredenciales->fetchAll(PDO::FETCH_ASSOC);


                                    ?>

                                    <td class="text-center">
                                        <?php
                                        $cont = 0;
                                        foreach ($dataInfoSonicwallCredenciales as $dataISC) {
                                            if ($cont > 0) {
                                                echo " / ";
                                            }
                                            echo $dataISC['usuario'];
                                            $cont = 1;
                                        } ?>
                                    </td>

                                    <td class="text-center">
                                        <?php
                                        $cont = 0;
                                        foreach ($dataInfoSonicwallCredenciales as $dataISC) {
                                            if ($cont > 0) {
                                                echo " / ";
                                            }
                                            echo $dataISC['contrasena'];
                                            $cont = 1;
                                        } ?>
                                    </td>
                                    <?php

                                    $infoSonicwallInterfaz = obtenerSonicwallInterfaz($dataIS['id']);
                                    $dataInfoSonicwallInterfaz = $infoSonicwallInterfaz->fetchAll(PDO::FETCH_ASSOC);


                                    ?>
                                    <td class="text-center">
                                        <i class="far fa-eye btn " data-placement="left" data-toggle="popover" title="Interfaces." data-content="<div class='row'><?php foreach ($dataInfoSonicwallInterfaz as $dataISI) { ?><div class='col-6'><?php echo $dataISI['nombre']; ?></div><div class='col-6 text-left'><?php echo $dataISI['ip']; ?></div><?php } ?></div>" data-html="true"></i>
                                    </td>
                                    <td class="text-center">
                                        <i class="far fa-comments " data-placement="left" data-toggle="popover" title="Comentarios." data-content="<div class='row'><div class='col-12'>  <?php echo $dataIS['comentarios']; ?></div></div>" data-html="true"></i>
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