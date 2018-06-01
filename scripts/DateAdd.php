<?php
	include_once 'class.AddDate.php';
	include_once 'class.UpdateDate.php';
	error_reporting(0);

	if(isset($_POST["name"])){ #start data form
		
		#hidden
		$id = (isset($_POST["id"]))?$_POST["id"]:"";
		$code = $_POST["code"];
		#Check
		$training = ($_POST["training"]=="")?"0":"1";
		#drop down box
		$city = $_POST["city"];
		$company = $_POST["company"];
		$sede = $_POST["sede"];
		$segment = $_POST["segment"];
		#text
		$date_call  = $_POST["fecha"];
		$name = $_POST["name"];
		$charge = $_POST["charge"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$ext = $_POST["ext"];
		$cell = $_POST["cell"];
		$observation = $_POST["observation"];
		#id de usuario logeado
		$idUsuar = $_SESSION['usuario']['id'];

 		if ($id=="") {
 				$consult = new addDate();
 				$SaveDates = $consult->DateAdd($id, $code, $idUsuar, $date_call, $training, $city, $company, $sede, $segment, $name, $charge, $email, $phone, $ext, $cell, $observation);
	 			if ($SaveDates) {
	 				$MensajeSave = "Registro Guardado correctamente! ";
	 			}
	 		} else {
	 			$update = new updateDate();
	 			$UpdateDates = $update->updateAdd($id, $code, $idUsuar, $date_call, $training, $city, $company, $sede, $segment, $name, $charge, $email, $phone, $ext, $cell, $observation);
	 			if ($UpdateDates) {
	 				$MensajeSave = "Registro Modificado correctamente! ";
	 			}else{
	 				echo $SaveCalls;
	 			}
	 		}
		}
?>