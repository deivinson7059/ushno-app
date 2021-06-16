<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to CodeIgniter 4!</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
	<link rel="stylesheet" href="<?php echo base_url() ?>/css/bootstrap.css">
</head>
<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-lg-4">
			<h2>Leer informacion</h2> <br>
			A continuación, se brindan dos opciones: crear un contacto y mostrar el listado de contactos registrado en la base de datos. Haga clic en la imagen
			</div>
			<div class="col-lg-4 text-center">
				<a href="<?php echo base_url('/createcontact')   ?>" >
				<img src="<?php echo base_url('img/i4.png'); ?>" class="img-fluid w-50" >
				</a>
				
				<br>
				<h2>Crear un contacto</h2>
			</div>
			<div class="col-lg-4 text-center">
				<a href="<?php echo base_url('/contactslist')   ?>" >
				<img src="<?php echo base_url('img/i5.png'); ?>" class="img-fluid w-50" >
				</a>
			
				<br>
				<h2>Mostrar los contacto</h2>
			</div>
		</div>
	
	</div>
	
	<script src="<?php echo base_url() ?>/js/bootstrap.js"></script>
</body>
</html>
