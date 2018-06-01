<?php 
	require_once 'lib/conn/session.php';
	#Save date
	require_once 'scripts/DateAdd.php';
	//Modo de la página
	//Create  (C)
	//Read    (R)
	//Update  (U)
	//Delete  (D)
	if (isset($_GET["m"])) {
		$m = $_GET["m"];
	} else {
		$m = "R";
	}
	#Varibale menú
	$alias="";
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
				window.open("date","_self");
			}
			<?php } ?>

			<?php if($m=="R") { ?>
				document.getElementById("create").onclick = function() {
				window.open("date.php?m=C","_self");
			}
			<?php } 
			?>
		}
	</script>

	<script src="js/functions.js"></script>

	<title>Citas | CAV</title>
</head>
<body>
	<section class="container-fluid">
		<?php $alias="visit"; require_once 'html/navbar.php';?>
	</section>
	<!-- section titulo -->
	<section class="container-fluid bg-light">
		<div class="wrap-footer text-center">
			<?php #section tittle
				if ($m=="R") { #TittleRead
					print '<h3>Historial de visitas</h3>';
				}#end TittleRead
				else if ($m=="C") { #TittleCreate
					print '<h3>Guardar Visita</h3>';
				} #end TittleCreate
				else if ($m=="U") { #TittleUpdate
					print '<h3>Registrar Visita</h3>';
				} #end TittleUpdate
			?>
		</div>
	</section>
	<!-- section Create-->
	<?php
		if ($m == "R") { #start create date
	?>
	<section class="container-fluid bg-light">
		<div class="wrap-footer">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<?php
					if(isset($MensajeSave)){ #Mensaje si guarda correctamente
						print '<div class="alert alert-success text-center">';
						print "<strong>".$MensajeSave."</strong>";
						print '</div>';
					} #end mensaje
					?>
					<table class="table-responsive-lg table-hover table-striped table-bordered" width='100%'>
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Fecha</th>
								<th scope="col">Empresa</th>
								<th scope="col">Contacto</th>
							</tr>
						</thead>
						<tbody class="text-left">
						<?php
							require_once 'scripts/DateRead.php';
						?>
						</tbody>
				 	</table>
				 	<!-- Botón Crear Cita 
					<div class="wrap-footer text-right"> 
						<label for="create"></label>
						<input type="button" name="create" value="Agendar llamada" class="btn btn-outline-success" role="button" id="create" />
					</div>-->
				</div>
			</div>
		</div>
	</section> 
	<!-- end section Create-->
	<?php }#end create date
		else if($m=="C" || $m=="U"){ #start Create || Update
		#Variables de Trabajo
		require_once 'scripts/WorkingVariables.php';
		require_once 'scripts/UpdateVariables.php';
	?>
	<!-- formulario create o update -->
	<section class="container bg-light">
		<div class="wrap-footer text-left">
			<div class="row">
				<div class="col-md-8 offset-md-2">
				<form action="date" method="POST" enctype="multipart/form-data">

					<input type="hidden" name="id" id="id" value="<?php print $id; ?>">
					<input type="hidden" name="code" id="code" value="<?php print $code; ?>">
					
					<div class="form-group text-left">
					  <label>
					  	<input type="checkbox" name="training" id="training" 
							<?php if ($training=="1") print " checked "; ?>
					  	> Es capacitación?</label>
					</div>

					<div class="row">
					  <div class="col-md-8 offset-md-2">
					    <div class="form-group text-left">
							<label for="city">Ciudad:</label>
							<select name="city" id="city">
								<option value="0">- Seleccione -</option>
								<?php
									require_once 'scripts/class.combos.php';
									
									$consult = new combos();
									$DataCity = $consult->getCity();

									//var_dump($DataCity);
									while ($row = $DataCity->fetch(PDO::FETCH_ASSOC)) {
										print "<option value='".$row['id']."'";
										if ($row['id']==$city) print " selected ";
										print "/>".$row['name']."</option>";
									}
								?>
							</select>
							<label for="company">Razón Social:</label>
							<select name="company" id="company">
								<option value="0">- Seleccione -</option>
								<?php
									$DataCompany = $consult->getRazonSocial();

									//var_dump($DataCity);
									while ($row = $DataCompany->fetch(PDO::FETCH_ASSOC)) {
										print "<option value='".$row['id']."'";
										if ($row['id']==$company) print " selected ";
										print "/>".$row['name']."</option>";
									}
								?>
							</select>
							<label for="sede">Sede:</label>
							<select name="sede" id="sede">
								<option value="0">- Seleccione -</option>
								<?php
									$DataSede = $consult->getSede();

									//var_dump($DataCity);
									while ($row = $DataSede->fetch(PDO::FETCH_ASSOC)) {
										print "<option value='".$row['id']."'";
										if ($row['id']==$sede) print " selected ";
										print "/>".$row['name']."</option>";
									}
								?>
							</select>
							<label for="segment">Segmento:</label>
							<select name="segment" id="segment">
								<option value="0">- Seleccione -</option>
								<?php
									$DataSegmento = $consult->getSegmento();

									//var_dump($DataCity);
									while ($row = $DataSegmento->fetch(PDO::FETCH_ASSOC)) {
										print "<option value='".$row['id']."'";
										if ($row['id']==$segmento) print " selected ";
										print "/>".$row['name']."</option>";
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
								  Registrar Visita
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
				</div>
			</div>
		</div>
	</section>

	<!-- footer -->
	<?php require_once 'html/footer.php'; ?>
	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>