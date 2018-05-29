<?php 
	require 'lib/conn/session.php';
	require 'lib/conn/conn.php';
	require 'lib/SedeCreate.php';
	require 'lib/SedeAdd.php';

	$consult = new SedeCreate();
	$errores = array();
	$idUsuar = $_SESSION['usuario']['id'];
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
	<title>Crear Sede | CAV</title>
	<script>
		window.onload = function() {
			document.getElementById("back").onclick = function() {
				window.open("calls.php?m=C","_self");
			}
		}
	</script>
</head>
<body>
	<section class="container-fluid">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="#">CAV</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse text-center" id="navbarText">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <a class="nav-link" href="home"><i class="fas fa-home"></i> Inicio <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link" href="calls"><i class="fas fa-phone-volume"></i> Llamadas</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#"><i class="fas fa-address-book"></i> Citas</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#"><i class="fas fa-people-carry"></i> Visitas</a>
		      </li>
		    </ul>
		    <span class="navbar-text">
		      <?php
		      $datesys = date("d-m-Y"); 
		      print '<a href="lib/logout.php"><i class="fas fa-sign-out-alt"></i>Salir</a><p>'.$nombre." ".$apellido.' '.$cargo.' <br><i class="fas fa-calendar-alt"></i> '.$datesys. '</p>'?>
		    </span>
		  </div>
		</nav>
	</section>
	
	<!-- Miga de pan -->
	<section class="container-fluid bg-light">
		<?php include 'html/breadcrumbSede.php'; ?>
		<div class="wrap-footer text-center">
			<h2>Crear Sedes</h2>
		</div>
	</section>
	
	<!-- Formulario -->
	<section class="container-fluid bg-light">
		<div class="wrap-footer">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<?php 
						if(count($errores)>0){ #erroes
							print '<div class="alert alert-danger">';
							foreach ($errores as $key => $valor) {
								print "<strong>* ".$valor."</strong>";
							}
							print '</div>';
						} #end errores

						if(isset($SaveOk)){ #Save ok
							print '<div class="alert alert-success">';
							print "<strong>* ".$SaveOk."</strong>";
							print '</div>';
						} #end save ok
					?>
					<form action="sede" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-2 col-sm-4">
							    <div class="form-group text-right">
									<label for="razonsocial">Razón social:</label>
									<select id="razonsocial" name="razonsocial">
										<option value="0">- Seleccione -</option>
										<?php
										$DataCompany = $consult->ReadCompany($conn, $idUsuar);
										for ($i=0; $i < count($DataCompany) ; $i++) { 
											print "<option value='".$DataCompany[$i]['id']."'";
											print "/>".$DataCompany[$i]['name']."</option>";
										}
										?>
									</select>
								</div>
						  	</div>	
						</div>


						<div class="form-group text-left">
							<label for="name">* Nombre sede:</label>
							<input type="text" name="name" id="name" class="form-control" required placeholder="Nombre de la sede"></input>
						</div>
						<div class="form-group text-left">
							<label for="direction">Dirección:</label>
							<input type="text" name="direction" id="direction" class="form-control" placeholder="Dirección de la empresa"></input>
						</div>
						<div class="form-group text-left">
							<label for="phone">* Telefono:</label>
							<input type="number" name="phone" id="phone" class="form-control" required placeholder="Número telefonico de la empresa"></input>
						</div>
						<!-- BOTONES ENVIAR -  ATRAS -->
						<div class="form-group text-right">
							<label for="back"></label>
							<input type="button" name="back" value="Regresar" class="btn btn-outline-info" id="back" />
							<label for="enviar"></label>
							<input type="submit" name="enviar" value="Guardar" class="btn btn-outline-success" />
						</div>
					</form>
				</div>
			</div>
		</div>

	</section>

	<!-- SEDES -->
	<section class="container-fluid bg-light">
		<div class="wrap">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<div class="wrap-footer text-left">
						<h3>Sedes</h3>
					</div>
					<table class="table-responsive-lg table-hover table-striped table-bordered" width='100%'>
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Empresa</th>
								<th scope="col">Sede</th>
								<th scope="col">Telefono</th>
								<th scope="col">Dirección</th>
								<th scope="col">Borrar</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sedes = $consult->ReadSede($conn, $idUsuar);
								for ($i=0; $i < count($sedes) ; $i++) { 
									$row = $i+1;
									print '<tr class="table-secondary">';	
									print '<th scope="row"">'.$row.'</th>';
									print '<td>'.$sedes[$i]["company"].'</td>';
									print '<td>'.$sedes[$i]["sede"].'</td>';
									print '<td>'.$sedes[$i]["phone"].'</td>';
									print '<td>'.$sedes[$i]["address"].'</td>';
									print '<td><a class="btn btn-outline-link btn-sm" href="company.php?m=D&id='.$sedes[$i]["id"].'"><i class="fas fa-trash-alt"></i></a></td>';
									print '</tr>';
								}#end Read
							?>
						</tbody>
					</table>
				</div>
			</div>
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