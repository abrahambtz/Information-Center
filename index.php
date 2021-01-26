<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Clients</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta/dist/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
	<link href="source/fontawesome/css/all.css" rel="stylesheet">


</head>
</head>

<body>

	<?php require_once "modal/modalCliente.php"; ?>
	<?php require_once "includes/consultas.php"; ?>

	<header>
		<div class="container">
			<div class="row mt-1">
				<div class="col-12 col-lg-10">
					<form method="post">
						<div class="form-row align-items-center my-2">
							<div class="col-5 col-lg-1 pt-1 mr-1">
								Cliente
							</div>
							<div class="col-6 col-lg-4 pt-1 ">
								<select class="selectpicker" data-live-search="true" name="clienteOp" id="clienteOp" title="seleccionar...">
									<option value="" selected disabled>Seleccionar cliente</option>
									<?php
									$matrize = obtenerMatriz();
									$clientes = obtenerCliente();
									$dataMatrices = $matrize->fetchAll(PDO::FETCH_ASSOC);
									$dataCliente = $clientes->fetchAll(PDO::FETCH_ASSOC);
									foreach ($dataMatrices as $dataM) { ?>
										<optgroup label="<?php echo $dataM['matrices'] ?>">

											<?php
											foreach ($dataCliente as $dataC) {
												if ($dataM['matrices'] == $dataC['matriz']) {

											?><option value="<?php echo $dataC['id'] ?>"><?php echo $dataC['cliente'] ?></option>
											<?php	}
											}
											?></optgroup>
									<?php } ?>
								</select>
							</div>

							<div class="col-5 col-lg-1 pt-1 mr-1">
								Tecnologia
							</div>
							<div class="col-6 col-lg-3 pt-1">
								<select class="selectpicker" id="tecnologiaOpcion" name="tecnologia" value="5" multiple data-actions-box="true" title="seleccionar...">
									<optgroup>
										<option value="5" disabled>Seleccionar tecnologia</option>
										<option value="1" selected>Sonicwall</option>
										<option value="2" selected>Switch</option>
										<option value="3" selected>Wireless</option>
										<option value="4" selected>Telefonia</option>

									</optgroup>
								</select>
							</div>
							<div class="col-12 col-lg-2 pt-1">
								<button type="submit" class="btn btn-success  btn-block">Buscar</button>
							</div>
						</div>


					</form>

				</div>
				<div class="col-12 col-lg-2 pt-1 my-2">
					<div class="btn-group btn-block ">

						<button class="btn btn-danger btn-block  dropdown-toggle" data-toggle="dropdown" id="dp-categorias">Añadir</button>
						<div class="dropdown-menu" aria-labelledby="dp-categorias">
							<h6 class="dropdown-header">Añadir</h6>
							<div class="dropdown-divider"></div>

							<a class="dropdown-item btn-danger" href="#" data-toggle="modal" data-target="#modalInsertarCliente">Cliente</a>

						</div>
					</div>
				</div>
			</div>



			<!-- COLUMNA DEL MENU DE NAVEGACION DERECHO 
				<nav class="col-12  col-lg-1   d-flex justify-content-between ">


					<button class="btn  " id="dp-categorias" data-toggle="dropdown">
						<img src="" width="30" height="30" alt="">
					</button>
					<div class="dropdown-menu" aria-labelledby="dp-categorias">
						<h6 class="dropdown-header">Categorias</h6>
						<a href="#" class="dropdown-item">HTML</a>
						<a href="#" class="dropdown-item">CSS</a>
						<a href="#" class="dropdown-item">JS</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">Bootstrap</a>
					</div>

				</nav>-->
		</div>
	</header>
	<?php require_once "cliente.php"; ?>
	<footer class="footer mt-5">
		<div class="container ">
			<div class="row ">
				<nav class="nav justify-content-center col">
					<li><a href="#" class="nav-link">Soporte SISA</a></li>
					<li>
						<p class="copyright nav-link m-0">
							2021. Derechos Reservados
						</p>
					</li>
				</nav>
			</div>
		</div>
	</footer>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper	.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
	<script>
		$(function() {
			$('[data-toggle="popover"]').popover({
			});
		})
	</script>
	<script>
		$(function() {
			$('[data-toggle="tooltip"]').tooltip({
				trigger: "hover"
			})
		})
	</script>
	<script type="text/javascript" src="js/main.js"></script> 
</body>

</html>