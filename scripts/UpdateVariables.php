<?php 
	include_once 'class.UpdateDate.php';
	//Consulta cita y carga las variables.
	if ($m=="U") {
		#hidden
		$id = $_GET["id"];
		$consult = new updateDate();
		$data = $consult->ConsultDates($idUsuar, $id);
		$code = $data["code"];
		#check
		$training = $data["training"];
		#drop down box
		$city = $data["city_id"];
		$company = $data["company_id"];
		$sede = $data["sede_id"];
		$segmento = $data["segmento_id"];
		#text
		$date_call  = $data["date_call"];
		$name = $data["contact_name"];
		$charge  = $data["contact_charge"];
		$email  = $data["email"];
		$phone = $data["phone1"];
		$ext = $data["ext"];
		$cell = $data["cellphone"];
		$observation = $data["observations"];
		#id de usuario logeado
		$idUsuar = $_SESSION['usuario']['id'];
	}
?>