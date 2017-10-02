<?php

require_once 'class_subida.php';

$subida = new subida();

?>


<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta description="Subir archivos en PHP por José Parra">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">



	<style>
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #333;
		}

		li {
			float: left;
		}

		li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		li a:hover {
			background-color: #111;
		}
	</style>
</head>
<body>


	<ul>
		<li><a class="active" href="/testingsoftware/">Inicio</a></li>
		<li><a href="/testingsoftware/buscar.html">Buscar</a></li>
		<li><a href="/testingsoftware/login.html">LogOut</a></li>
	</ul>


	<div class="container mt-3">
		<div class="card">
			<div class="card-header">
				Archivos existentes en el directorio
			</div>
			<div class="card-block">
				<div class="row">
					<?php
					$list = $subida->getAllArchivos();
					if ($list != false) {
						
						foreach ($list as $image) {
							echo '
							<div class="col-sm-3 col-xs-12">
								Archivo: <strong>'.$image->ubicacion.'</strong><br />
								<img src="'.$image->ubicacion.'" title="imagen" alt="imagen" class="img-fluid"/>
							</div>
							';

						}
					}
					?>
				</div>
			</div>
		</div>

		<h1>Selecciona tu archivo</h1>
		<form method="post" action="response.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="archivo">Archivo</label>
				<input type="file" class="form-control-file" id="archivo" aria-describedby="fileHelp" name="archivo">
				<label for="archivo">Tag</label>
				<br>
				<input type="text" id="etiqueta" name="etiqueta">
				<small id="fileHelp" class="form-text text-muted">Archivos permitidos (.jpg .png .gif)</small>
			</div>
			<button type="submit" class="btn btn-primary" name="boton">Subir archivo</button>
		</form>
	</div>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>
