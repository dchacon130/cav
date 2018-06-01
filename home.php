<?php 
	require 'lib/conn/session.php';
	require 'lib/conn/conn.php';
	require 'lib/CallsConsult.php';
	require 'lib/CallCreate.php';
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
	<title>Home | CAV</title>
</head>
<body class="bg-light">
	<section class="container-fluid">
		<?php $alias="home"; require 'html/navbar.php';?>
	</section>
	<!-- section llamadas -->
	<section class="container">
		<!-- DESARROLLO WEB -->
        <div class="panel panel-primary">
    	 	<div class="wrap-footer text-center">
                <h1>Resumen de operación</h1>
            </div>
	</section>
	
		<!-- section llamadas -->
	<section class="container">
		<div class="wrap">
			<h3>Llamadas pendientes</h3>
		</div>
	</section>

	<!-- section citas -->
	<section class="container">
		<div class="wrap">
			<h3>Citas pendientes</h3>
		</div>
	</section>

	<!-- section citas -->
	<section class="container">
		<div class="wrap">
			<h3>Visitas pendientes</h3>
		</div>
	</section>

	<!-- footer -->
	<?php require 'html/footer.php'; ?>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>