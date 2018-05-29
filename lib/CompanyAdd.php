<?php 
$consult = new CompanyCreate();
#Recibe la información del form por metodo POST
if (isset($_POST["name"])) {
	#Id de la session
	$idUsuar = $_SESSION['usuario']['id'];
	#Tomamos los datos POST
	$name = $_POST["name"];
	$rut = $_POST["rut"];
	$city = $_POST["city"];
	$doctype = $_POST["doctype"];
	$dv = $_POST["dv"];
	$addres = $_POST["direction"];
	$phone = $_POST["phone"];
	$datesys = date("Y-m-d H:i:s");
	$estado = 1;

	//validación
	if ($name=="") {
		array_push($errores, "El nombre es requerido");
	} else if ($rut=="") {
		array_push($errores, "El RUT es requerido");
	} else if ($phone=="") {
		array_push($errores, "El Telefono es requerido");
	} else {
		$savecompany = $consult->SaveCompany($conn, $idUsuar, $name, $doctype, $rut, $dv, $addres, $city, $phone, $datesys, $estado);
		$SaveOk = $savecompany;
		
	}

}


 ?>