<?php
if (isset($_POST['clienteOp'])) {

	if (filter_var($_POST['clienteOp'], FILTER_VALIDATE_INT) || filter_var($_POST['tecnologia'], FILTER_VALIDATE_INT)) {
		$infoCliente = obtenerUnCliente($_POST['clienteOp']);
		$dataInfoCliente = $infoCliente->fetchAll(PDO::FETCH_ASSOC);
		foreach ($dataInfoCliente as $dataIC) { ?>
			<div class="container-fluid">
				<div class="row mt-3">
					<div class="col-12 col-lg-3">
						<div class="card" style="width: 17rem; height: 28.5rem;">
							<img class="card-img-top" src="source/img/fandeli.png" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title"><?php echo $dataIC['cliente']; ?></h5>
								<p class="card-text">Matriz <?php echo $dataIC['matriz']; ?></p>
							</div>
							<div class="card-body">
								<a href="#" class="card-link">Editar</a>
								<a href="#" class="card-link">Eliminar</a>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-9">
						<div id="accordionClienteInformacion">
							<div class="card">
								<div class="card-header" id="headingContactos">
									<div class="row">
										<div class="col-10 col-lg-11">
											<h4 class="mb-0">
												<a class="btn btn-block text-left" data-toggle="collapse" data-target="#collapseContactos" aria-expanded="false" aria-controls="collapseContactos">
													<h6>Contactos</h6>
												</a>
											</h4>
										</div>
										<div class="col-2 col-lg-1 pt-1">
											<button class="btn btn-sm btn-success " data-toggle="modal" data-target="#modalContacto">
												<i class="fas fa-plus"></i>
											</button>
										</div>

									</div>
								</div>
								<div id="collapseContactos" class="collapse" aria-labelledby="headingContactos" data-parent="#accordionClienteInformacion">
									<div class="card-body">
										<div class="row" id="listadoContactos">
											<?php
											$infoClienteContacto = obtenerContacto($_POST['clienteOp']);
											$dataInfoClienteContacto = $infoClienteContacto->fetchAll(PDO::FETCH_ASSOC);
											$contContacto = 1;
											foreach ($dataInfoClienteContacto as $dataICC) {
											?>
												<div class="col-12 col-lg-6 mb-3">
													<div class="card">
														<div class="card-body mb-0">
															<p class="card-title font-weight-bold m-0">
																<span class="badge badge-dark">Contacto <?php echo $contContacto;
																										$contContacto++; ?></span>
															</p>
															<div class="card-text ml-3 mt-0 m-0">
																<p class="font-weight-light m-0"> <b>Nombre:</b> <?php echo $dataICC['nombre']; ?>
																	<br>
																	<b>Correo: </b> <?php echo $dataICC['correo']; ?>
																	<br>
																	<b>Telefono:</b> <?php echo $dataICC['telefono']; ?> ext. <?php echo $dataICC['extencion']; ?>
																	<br>
																	<b>Celular: </b><?php echo $dataICC['celular']; ?>
																</p>
																<p class=" m-0 text-right">
																	<button class="btn btn-sm btn-info rounded-circle text-right" data-toggle="tooltip" data-placement="bottom" title="Editar">
																		<i class="fas fa-pencil-alt"></i>
																	</button>
																	<button class="btn btn-sm btn-danger rounded-circle" data-toggle="tooltip" data-placement="bottom" title="Eliminar">
																		<i class="fas fa-trash-alt"></i>
																	</button>
																</p>
															</div>
														</div>
													</div>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingVPN">
									<div class="row">
										<div class="col-10 col-lg-11">
											<h5 class="mb-0">
												<a class="btn btn-block text-left" data-toggle="collapse" data-target="#collapseVPN" aria-expanded="true" aria-controls="collapseVPN">
													<h6>VPN</h6>
												</a>
											</h5>
										</div>
										<div class="col-2 col-lg-1 pt-1">
											<button class="btn btn-sm btn-success " data-toggle="modal" data-target="#modalVpn">
												<i class="fas fa-plus"></i>
											</button>
										</div>
									</div>

								</div>
								<div id="collapseVPN" class="collapse show" aria-labelledby="headingVPN" data-parent="#accordionClienteInformacion">
									<div class="card-body">
										<div class="row" id="listadoVpn">
											<?php
											$infoClienteVPN = obtenerVPN($_POST['clienteOp']);
											$dataInfoClienteVPN = $infoClienteVPN->fetchAll(PDO::FETCH_ASSOC);
											$contContacto = 1;
											foreach ($dataInfoClienteVPN as $dataICVpn) {
											?>
												<div class="col-12 col-lg-6 mb-3">
													<div class="card">
														<div class="card-body mb-0">
															<p class="card-title font-weight-bold m-0">
																<span class="badge badge-primary"><?php echo $dataICVpn['tipo']; ?> <?php echo $contContacto;
																																	$contContacto++; ?></span>
															</p>
															<div class="card-text ml-3 mt-0 m-0">
																<p class="font-weight-light m-0"> <b>IP:</b> <?php echo $dataICVpn['ip']; ?>
																	<br>
																	<b>Usuario: </b> <?php echo $dataICVpn['usuario']; ?>
																	<br>
																	<b>Contraseña:</b> <?php echo $dataICVpn['contrasena']; ?>
																	<br>
																	<b>Shared Secret: </b><?php echo $dataICVpn['sharedSecret']; ?>
																</p>
																<p class=" m-0 text-right">
																	<button class="m-0 btn btn-sm btn-info rounded-circle text-right" data-toggle="tooltip" data-placement="bottom" title="Editar">
																		<i class="fas fa-pencil-alt"></i>
																	</button>
																	<button class="btn btn-sm btn-danger rounded-circle" data-toggle="tooltip" data-placement="bottom" title="Eliminar">
																		<i class="fas fa-trash-alt"></i>
																	</button>
																</p>

															</div>

														</div>
													</div>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingNotas">
									<div class="row">
										<div class="col-10 col-lg-11">
											<h5 class="mb-0">
												<a class="btn btn-block text-left" data-toggle="collapse" data-target="#collapseNotas" aria-expanded="false" aria-controls="collapseNotas">
													<h6>Notas</h6>
												</a>
											</h5>
										</div>
										<div class="col-2 col-lg-1 pt-1">
											<button class="btn btn-sm btn-success " data-toggle="modal" data-target="#modalNotas">
												<i class="fas fa-plus"></i>
											</button>
										</div>
									</div>
								</div>
								<div id="collapseNotas" class="collapse" aria-labelledby="headingNotas" data-parent="#accordionClienteInformacion">
									<div class="card-body">
										<div class="row" id="listadoNotas">
											<?php
											$infoClienteServidor = obtenerServidor($_POST['clienteOp']);
											$dataInfoClienteServidor = $infoClienteServidor->fetchAll(PDO::FETCH_ASSOC);
											$contServidor = 1;
											foreach ($dataInfoClienteServidor as $dataICS) {
											?>
												<div class="col-12 col-lg-4 mb-3">
													<div class="card">
														<div class="card-body">
															<p class="card-title font-weight-bold">
																<span class="badge badge-danger"><?php echo $dataICS['nombre']; ?></span>
															</p>
															<p class="card-text">
															<div class="ml-3 mt-0">
																<p class="font-weight-light">
																	<?php echo $dataICS['descripcion']; ?>
																	
																</p>
															</div>
															</p>
														</div>
													</div>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php require_once "modal/modalContacto.php"; ?>
				<?php require_once "modal/modalVpn.php"; ?>
				<?php require_once "modal/modalNotas.php"; ?>
				
				<div class="row mt-1">
					<?php require_once "clienteSonicwall.php"; ?>
					<?php require_once "clienteSwitch.php"; ?>
					<?php require_once "clienteWireless.php"; ?>

				</div>


			</div>
<?php
		}
	} else {
		echo "No hay resultados";
	}
} else {
} ?>