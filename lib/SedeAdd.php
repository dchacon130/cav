<?php 
$consult = new SedeCreate();
#Recibe la información del form por metodo POST
if (isset($_POST["name"])) {
	#Id de la session
	$idUsuar = $_SESSION['usuario']['id'];
	#Tomamos los datos POST
	$company = $_POST["razonsocial"];
	$name = $_POST["name"];
	$addres = $_POST["direction"];
	$phone = $_POST["phone"];
	$datesys = date("Y-m-d H:i:s");
	$estado = 1;

	//validación
	if ($name=="") {
		array_push($errores, "El nombre es requerido");
	} else if ($phone=="") {
		array_push($errores, "El Telefono es requerido");
	} else {
		$saveSede = $consult->SaveSede($conn, $idUsuar, $company, $name, $addres, $phone, $datesys, $estado);
		$SaveOk = $saveSede;
		
	}

}


 ?>