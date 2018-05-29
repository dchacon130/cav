<?php 
	require 'lib/conn/session.php';
	require 'lib/conn/conn.php';
	require 'lib/CompanyCreate.php';
	require 'lib/CompanyAdd.php';

	$consult = new CompanyCreate();
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
	<title>Crear RS | CAV</title>
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
		<?php include 'html/breadcrumbRS.php'; ?>
		<div class="wrap-footer text-center">
			<h2>Crear Razón Social</h2>
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
					<form action="company" method="POST" enctype="multipart/form-data">
						<div class="form-group text-left">
							<label for="name">* Razón social:</label>
							<input type="text" name="name" id="name" class="form-control" required placeholder="Nombre o Razón Social de la empresa"></input>
						</div>
						<div class="row">
					      <div class="col-6 col-sm-4 offset-md-1">
					        <label for="doctype">Tipo documento:</label>
							<select id="doctype" name="doctype">
								<option value="0"> - Seleccione - </option>
								<?php
									$TypeDoc = $consult->TypeDocument($conn);
									for ($i=0; $i < count($TypeDoc) ; $i++) { 
										print "<option value='".$TypeDoc[$i]['id']."'";
										print "/>".$TypeDoc[$i]['name'];
										print "</option>";
									}
								?>
							</select>
					      </div>
					      <div class="col-6 col-sm-3 offset-md-2">
					        <label for="city">Ciudad:</label>
							<select id="city" name="city">
								<option value="0"> - Seleccione - </option>
								<?php
									$cityname = $consult->CityName($conn);
									for ($i=0; $i < count($cityname) ; $i++) { 
										print "<option value='".$cityname[$i]['id']."'";
										print "/>".$cityname[$i]['name'];
										print "</option>";
									}
								?>
							</select>
					      </div>
					    </div>
						<div class="row">
							<div class="col-4 col-sm-8">
						        <label for="rut">* Registro Unico Tributario RUT:</label>
								<input type="number" name="rut" id="rut" class="form-control" required placeholder="Número de documento"</input>
						      </div>
						      <div class="col-6 col-sm-4">
						        <label for="dv">Digito Verificación: </label>
								<input type="number" name="dv" id="dv" class="form-control" placeholder="Digito de verificación" minlength="0" maxlength="1"></input>
						      </div>
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

	<!-- CONSULT COMPANY -->
	<section class="container-fluid bg-light">
		<div class="wrap">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<div class="wrap-footer text-left">
						<h3>Empresas</h3>
					</div>
					<table class="table-responsive-lg table-hover table-striped table-bordered" width='100%'>
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Empresa</th>
								<th scope="col">Documento</th>
								<th scope="col">Dirección</th>
								<th scope="col">Telefono</th>
								<th scope="col">Borrar</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$rCompany = $consult->ReadCompany($conn, $idUsuar);
								for ($i=0; $i < count($rCompany) ; $i++) { 
									$row = $i+1;
									print '<tr class="table-secondary">';	
									print '<th scope="row"">'.$row.'</th>';
									print '<td>'.$rCompany[$i]["name"].'</td>';
									print '<td>'.$rCompany[$i]["doc"].'</td>';
									print '<td>'.$rCompany[$i]["address"].'</td>';
									print '<td>'.$rCompany[$i]["phone"].'</td>';
									print '<td><a class="btn btn-outline-link btn-sm" href="company.php?m=D&id='.$rCompany[$i]["id"].'"><i class="fas fa-trash-alt"></i></a></td>';
									print '</tr>';
								}#end Read
							?>
						</tbody>
					</table>
					<!-- BOTONES ENVIAR -  ATRAS -->
					<div class="wrap-footer form-group text-right">
						<label for="back"></label>
						<input type="button" name="back" value="Regresar" class="btn btn-outline-info" id="back" />
					</div>
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