<?php 
	require 'lib/conn/session.php';
	require 'lib/conn/conn.php';
	require 'lib/CallsConsult.php';
	require 'lib/CallCreate.php';
	require 'lib/RegisterCall.php';

	//Variables de trabajo
	$errores = array();
	$consult = new CallsConsult();
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
	
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	
	<script>
		window.onload = function() {
			<?php if($m=="C" || $m == "U") { ?>
			document.getElementById("back").onclick = function() {
				window.open("calls","_self");
			}
			<?php } ?>

			<?php if($m=="R") { ?>
				document.getElementById("create").onclick = function() {
				window.open("calls.php?m=C","_self");
			}
			<?php } 
			?>
		}

	</script>

	<script src="js/functions.js"></script>

	<title>Llamadas | CAV</title>
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
	<!-- section llamadas -->
	<section class="container-fluid bg-light">
		<div class="wrap">
			<div class="wrap-footer text-center">
				<?php #section tittle
				if ($m=="R") { #start Read
					print '<h3>Llamadas pendientes</h3>';
					if(count($errores)>0){ #erroes
						print '<div class="alert alert-danger">';
						foreach ($errores as $key => $valor) {
							print "<strong>* ".$valor."</strong>";
						}
						print '</div>';
					} #end errores
				} #end Read
				else if ($m=="C") { #start Create
					print '<h3>Agendar llamada</h3>';
					if(count($errores)>0){ #erroes
						print '<div class="alert alert-danger">';
						foreach ($errores as $key => $valor) {
							print "<strong>* ".$valor."</strong>";
						}
						print '</div>';
					} #end errores
				} #end Create
				else if ($m=="U") { #start Update
					print '<h3>Gestionar llamada</h3>';
					if(count($errores)>0){ #erroes
						print '<div class="alert alert-danger">';
						foreach ($errores as $key => $valor) {
							print "<strong>* ".$valor."</strong>";
						}
						print '</div>';
					} #end errores
				} #end update
			 ?>
			</div>
			<div class="row">
				<div class="col-md-8 offset-md-2 text-left">
				<?php
					if(isset($SaveOk)){
						print '<div class="alert alert-success">';
						print "<strong>* ".$SaveOk."</strong>";
						print '</div>';
					}
				?>
			      	<?php
			      	if ($m=="R") { #start Read
			      		?>
						<table class="table-responsive-lg table-hover table-striped table-bordered" width='100%'>
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Fecha</th>
									<th scope="col">Empresa</th>
									<th scope="col">Telefono</th>
								</tr>
							</thead>
						<tbody>
						<?php
						$productos = $consult->ReadDB($conn, $idUsuar);
						for ($i=0; $i < count($productos) ; $i++) { 
							$row = $i+1;
							$datesys = date("d/m/Y");
							if ($productos[$i]["date"] < $datesys) {
								print '<tr class="table-danger">';
							}else{
								print '<tr class="table-success">';	
							}
							print '<th scope="row" class="warning">'.$row.'</th>';
							print '<td>'.$productos[$i]["date"].'</td>';
							print '<td>'.$productos[$i]["name"].'</td>';
							print '<td>'.$productos[$i]["phone"].'</td>';
							print '<td><a class="btn btn-outline-link btn-sm" href="calls.php?m=U&id='.$productos[$i]["id"].'"><i class="fas fa-search-plus"></i></a></td>';
							print '</tr>';
						}
							print '</tbody>';
							print '</table>';
					} #end Read

				
				else if($m=="C" || $m=="U"){ #start Create || Update
				
				if($m == "C"){
				?>
				<div class="row">
				  <div class="col-2 col-sm-5 offset-md-1">
					<div class="wrap-footer">
						<a class="btn btn-outline-secondary" href="company" role="button">Crear Razón Social</a>
					</div>
				  </div>
				  <div class="col-2 col-sm-4">
					<div class="wrap-footer">
						<a class="btn btn-outline-secondary" href="sede" role="button">Crear Sede</a>
					</div>
				  </div>
				</div>

				<?php
					}
				?>
				<!-- formulario create o update -->
				<form action="calls.php" method="POST" enctype="multipart/form-data">

					<input type="hidden" name="id" id="id" value="<?php print $id; ?>">
					<input type="hidden" name="code" id="code" value="<?php print $code; ?>">

					<div class="row">
					  <div class="col-2 col-sm-4">
					    <div class="form-group text-right">
							<label for="razonsocial">Razón social:</label>
							<select name="razonsocial" id="razonsocial">
								<option value="0">- Seleccione -</option>
								<?php
								$DataCompany = $consult->ReadCompany($conn, $idUsuar);
								for ($i=0; $i < count($DataCompany) ; $i++) { 
									print "<option value='".$DataCompany[$i]['id']."'";
									if ($DataCompany[$i]['id']==$company) print " selected ";
									print "/>".$DataCompany[$i]['name']."</option>";
								}
								?>
							</select>
						</div>
					  </div>
					  <div class="col-2 col-sm-4">
					    <div class="form-group text-right">
							<label for="readsede">Sede:</label>
							<select name="readsede" id="readsede">
								<option value="0">- Seleccione -</option>
								<?php
								$ReadSede = $consult->ReadSede($conn, $idUsuar);
								for ($i=0; $i < count($ReadSede) ; $i++) { 
									print "<option value='".$ReadSede[$i]['id']."'";
									if ($ReadSede[$i]['id']==$sede_id) print " selected ";
									print "/>".$ReadSede[$i]['name']."</option>";
								}
								?>
							</select>
						</div>
					  </div>
					  <div class="col-2 col-sm-4">
						<div class="form-group text-right">
							<label for="segment">Segmento: </label>
							<select id="segment" name="segment">
								<option value="0">- Seleccione -</option>
								<?php
								$DataSegmento = $consult->ReadSegmento($conn);
								for ($i=0; $i < count($DataSegmento) ; $i++) { 
									print "<option value='".$DataSegmento[$i]['id']."'";
									if ($DataSegmento[$i]['id']==$segmento) print " selected ";
									print "/>".$DataSegmento[$i]['name']."</option>";
								}
								?>
							</select>
						</div>
					  </div>
					</div>

					<div class="form-group text-left">
						<label for="fecha">* Fecha de llamada:</label>
						<input type="date" name="fecha" id="fecha" class="form-control" placeholder="Fecha de llamada" value="<?php print $date_call; ?>"/>
					</div>
					<div class="form-group text-left">
						<label for="name">* Nombre:</label>
						<input type="text" name="name" id="name" class="form-control" required placeholder="Nombre de contacto" value="<?php print $name; ?>"></input>
					</div>
					<div class="form-group text-left">
						<label for="charge">* Cargo:</label>
						<input class="form-control" name="charge" id="charge" placeholder="Cargo de contacto" value="<?php print $charge; ?>"></input>
					</div>
					<div class="form-group text-left">
						<label for="email">* Correo electronico:</label>
						<input class="form-control" name="email" id="email" placeholder="Correo electronico de contacto" value="<?php print $email; ?>"></input>
					</div>
					<div class="form-group text-left">
						<label for="cell">* Celular:</label>
						<input class="form-control" name="cell" id="cell" placeholder="Número celular de contacto" value="<?php print $cell; ?>"></input>
					</div>
					<div class="form-group text-left">
						<label for="phone">* Telefono:</label>
						<input class="form-control" name="phone" id="phone" placeholder="Número telefonico de contacto" value="<?php print $phone; ?>"></input>
					</div>
					<div class="form-group text-left">
						<label for="ext">* Ext:</label>
						<input class="form-control" name="ext" id="ext" placeholder="Extención de contacto" value="<?php print $ext; ?>"></input>
					</div>
					<div class="form-group text-left">
						<label for="observation">* Observación:</label>
						<textarea class="form-control" name="observation" id="observation" placeholder="Observaciones..." ><?php print $observation; ?></textarea>
					</div>
					<!-- BOTONES ENVIAR -  ATRAS -->
					<div class="form-group text-right">
						<label for="back"></label>
						<input type="button" name="back" value="Regresar" class="btn btn-outline-info" id="back" />
						<?php 
						if ($m == "U") {
							?>
								<label for="enviar"></label>
								<input type="submit" name="enviar" value="Actualizar" class="btn btn-outline-success" />
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal">
								  Registrar Llamada
								</button>
							<?php 
						}else{
						?>
							<label for="enviar"></label>
							<input type="submit" name="enviar" value="Guardar" class="btn btn-outline-success" />
						<?php 
						}
						?>
					</div>
				</form>
				<?php 
				}//Cierro formulario Create || Update
				?>
				<?php if($m=="R") { ?>
				<div class="wrap-footer">
					<label for="create"></label>
					<input type="button" name="create" value="Agendar llamada" class="btn btn-outline-success" role="button" id="create" />
				</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</section>

	<!-- footer -->
	<?php require 'html/footer.php'; ?>
	
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
<form class="text-left" action="calls.php" method="post">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Registrar llamada</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
			<input type="hidden" name="id" id="id" value="<?php print $id; ?>">
	        <div class="row">
	        	<div class="col-sm-4 offset-md-1">
	        		<input type="checkbox" name="NewCall" id="NewCall">
	        		Nueva llamada
	        	</div>
	        	<div class="col-sm-4">
	        		<input type="checkbox" name="DateAge" id="DateAge">
	        		Agendar cita
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-sm-4 offset-md-1">
	        		<input type="checkbox" name="SendCat" id="SendCat">
	        		Envío catalogo
	        	</div>
	        	
	        	<div class="col-sm-4">
	        		<input type="checkbox" name="QuoteId" id="QuoteId">
	        		Cotización
	        	</div>
	        </div>
	        <br>
	        <div class="row">
	        	<div class="form-group text-left col-md-10 offset-md-1">
					<label for="ObservacionReg">* Observación:</label>
					<textarea class="form-control" name="ObservacionReg" id="ObservacionReg" placeholder="Observación..." ></textarea>
				</div>
	        </div>
	        <input type="hidden" name="code" id="code" value="<?php print $code; ?>">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-outline-info" data-dismiss="modal">Atras</button>
	        <input type="submit" name="enviar" value="Guardar" class="btn btn-outline-success" role="button"/>
	      </div>
</form>
	    </div>
	  </div>
	</div>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>