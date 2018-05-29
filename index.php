<?php 
	require 'lib/login.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
	<!-- link bootstrap 4 -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<!-- link style -->
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<title>Inicio | CAV</title>
</head>
<body>
	<section class="container-fluid text-center wrap-footer bg-dark text-white">
		<h1>Iniciar sesión</h1>
	</section>
	<!-- section login -->
	<section class="container-fluid text-center bg-light">
		<div class="wrap-login row">
			<div class="col-sm-4">
				
			</div>
			<div class="col-sm-4">
				<?php
					if(isset($error)){
						print '<div class="alert alert-danger">';
						print "<strong>* ".$error."</strong>";
						print '</div>';
					}
				?>
				<form class="text-center form-group" action="index.php" method="post">
					<div class="form-group">
						<label for="user">Usuario:</label>
						<input type="text" name="user" id="user" class="form-control" required placeholder="Escriba su usuario..." value="">
					</div>
					<div class="form-group">
						<label for="pass">Contraseña:</label>
						<input type="password" name="pass" id="pass" class="form-control" required placeholder="Escriba su contraseña..." value="">
					</div>
					<div class="form-group">
						<label for="Entrar"></label>
						<input type="submit" name="Entrar" value="Entrar" class="btn btn-outline-success btn-block" role="button">
					</div>
				</form>
				<div class="container-fluid">
					<a href="#" class="badge badge-light">¿Olvidó su clave de acceso?</a>
				</div>
			</div>
			<div class="col-sm-4">
				
			</div>
		</div>
	</section>
	
	<!-- footer -->
	<footer class="container-fluid text-center wrap-footer bg-dark text-white">
		<p>&copy; 2018 | Made with <i class="fa fa-heart"></i> by <a href="http://freelancediego.website/" target="_blank">Diego Chacón</a>.</p>
	</footer>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>