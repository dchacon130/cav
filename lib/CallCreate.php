<?php
	$consult = new CallsConsult();
	
	//Modo de la página
	//A - alta     (C)
	//S - consulta (R)
	//C - cambiar  (U)
	//B - borrar   (D)
	if (isset($_GET["m"])) {
		$m = $_GET["m"];
	} else {
		$m = "R";
	}

	if(isset($_POST["name"])){ #start data form
		
		$idUsuar = $_SESSION['usuario']['id'];
		#validación de campos enviados y traemos el id de la sesión
		$id = (isset($_POST["id"]))?$_POST["id"]:"";
		$code = (isset($_POST["code"]))?$_POST["code"]:"";
		$date = $_POST["fecha"];
		$company = $_POST["razonsocial"];
		$sede = $_POST["readsede"];
		$segmento = $_POST["segment"];;
		$name = $_POST["name"];
		$charge = $_POST["charge"];
		$phone = $_POST["phone"];
		$ext = $_POST["ext"];
		$cell = $_POST["cell"];
		$email = $_POST["email"];
		$observation = $_POST["observation"];
		$datesys = date("Y-m-d H:i:s");
		#end data form
		
		//validación
		if ($consult->validaFecha($date)==false) {
			array_push($errores, "Fecha errónea");
		} else if ($name=="") {
			array_push($errores, "El nombre es requerido");
		} else if ($charge=="") {
			array_push($errores, "El cargo es requerido");
		} else if ($email=="") {
			array_push($errores, "El correo es requerido");
		} else if ($cell=="") {
			array_push($errores, "El celular es requerido");
		} else if ($phone=="") {
			array_push($errores, "El telefono es requerido");
		} else if ($ext=="") {
			array_push($errores, "La extención es requerida");
		}  else {
			//
			$desc_escapado = $consult->escapaCadena($observation);
	 		//
	 		if ($id=="") {
	 			
	 			if ($code == "") {
	 				//Creo la variable unica de llamada
		 			$data = $consult->CountId($conn);
		 			$idCodigo  = $data["countid"];
		 			$idCodigo++;
		 			$code = $idCodigo.'-'.$consult->generarCodigo(10);
	 			}
	 			

	 			$estado = 1; #creado
	 			$SaveCalls = $consult->SaveCalls($conn, $idUsuar, $date, $company, $sede, $segmento, $name, $charge, $phone, $ext, $cell, $email, $desc_escapado, $datesys, $estado, $code);
	 			if ($SaveCalls) {
	 				$SaveOk = 'Registro guardado correctamente';
	 				//echo $SaveCalls;
	 			}else{
	 				echo $SaveCalls;
	 			}
	 		} else {
	 			$estado = 2; #modificado
	 			$SaveCalls = $consult->UpdateCalls($conn, $idUsuar, $id, $date, $company, $sede, $segmento, $name, $charge, $phone, $ext, $cell, $email, $desc_escapado, $datesys, $estado);
	 			if ($SaveCalls) {
	 				$SaveOk = 'Registro modificado correctamente';
	 			}else{
	 				echo $SaveCalls;
	 			}
	 		}
		}
	}

	//lee un producto
	if ($m=="U") {
		$idget = $_GET["id"];
		$data = $consult->ConsultCall($conn, $idUsuar, $idget);
		//Variables de trabajo
		$id  = $data["id"];
		$code  = $data["code"];
		$idUsuar  = $data["user_id"];
		$date_call  = $data["date1"];
		$company = $data["company_id"];
		$sede_id = $data["sede_id"];
		$segmento = $data["segmento_id"];
		$name = $data["contact_name"];
		$charge  = $data["contact_charge"];
		$phone = $data["phone1"];
		$ext = $data["ext"];
		$cell = $data["cellphone"];
		$email  = $data["email"];		
		$observation = $data["observations"];
	}else if ($m=="C") {
		//Variables de trabajo
		$id  = "";
		$code = (isset($_GET["code"]))?$_GET["code"]:"";
		$idUsuar  = "";
		$date_call  = "";
		$company = "";
		$sede_id = "";
		$segmento = "";
		$name = "";
		$charge  = "";
		$phone = "";
		$ext = "";
		$cell = "";
		$email  = "";
		$observation = "";
	}


	if (isset($_POST["ObservacionReg"])) {

	$id = (isset($_POST["id"]))?$_POST["id"]:"";
	$newcall = ($_POST["NewCall"]=="")?"0":"1";
	$sendcall = ($_POST["SendCat"]=="")?"0":"1";
	$dteage = ($_POST["DateAge"]=="")?"0":"1";
	$quoteid = ($_POST["QuoteId"]=="")?"0":"1";
	$ObservacionReg = $_POST["ObservacionReg"];

	$obs = $consult->escapaCadena($ObservacionReg);

	$state = 3; #modificado
	$date_end = date("Y-m-d H:i:s");
	$SaveCallCommitments = $consult->UpdateCommitments($conn, $state, $newcall, $sendcall, $dteage, $quoteid, $obs, $date_end, $id);
		if ($SaveCallCommitments) {
			if ($newcall == 1) {
				$data = $consult->SeeCode($conn, $id);
	 			$CodigoID  = $data["code"];
				header('location:calls.php?m=C&code='.$CodigoID);
			}else if($dteage == 1){
				$data = $consult->SeeCode($conn, $id);
	 			$CodigoID  = $data["code"];
				header('location:date.php?m=C&code='.$CodigoID);
			}else{
				$SaveOk = 'Compromisos Adquiridos Guardados correctamente';
			}
		}else{
			echo $SaveCallCommitments;
		}	
	}
?>