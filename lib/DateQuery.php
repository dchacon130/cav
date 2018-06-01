<?php 
/**
 * 	CRUD  de llamadas 
	//Modo de la página
	//A - alta     (C)
	//S - consulta (R)
	//C - cambiar  (U)
	//B - borrar   (D)
 */
class DateQuery 
{

	function __construct()
	{
		# code...
	}




	function ReadDB($conn, $idUsuar){ #read table calls and company
		$sql = "
		SELECT calls.id, DATE_FORMAT(date_call, '%d/%m/%Y') as date, company.name, CONCAT(calls.phone1, '-', calls.ext) as phone, calls.cellphone 
			FROM calls, company 
				WHERE calls.company_id = company.id
				AND calls.user_id = $idUsuar 
				AND calls.state IN (1,2) 
				AND company.state = 1;";
		$r = mysqli_query($conn, $sql);
		$productos = array();
		while($row = mysqli_fetch_assoc($r)){
			array_push($productos, $row);
		}
		return $productos;
	} #end read table

	function ReadCompany($conn){ #start ReadCompany
		$estado = "1";
		$DataCompany = array();

		try{
			$sql = "SELECT id, name FROM company WHERE state = 1 ;";
			$r = mysqli_query($conn, $sql);
		}catch(Exception $e){
			return $e;
		}
		
		while($row = mysqli_fetch_assoc($r)){
			array_push($DataCompany, $row);
			}
		return $DataCompany;
	} #end ReadCompany

	function ReadSede($conn, $idCompany){ #start ReadSede
		$estado = "1";
		$ReadSede = array();

		try{
			$sql = "
			SELECT id, name FROM sede WHERE state = 1;";
			$r = mysqli_query($conn, $sql);
		}catch(Exception $e){
			return $e;
		}
		
		while($row = mysqli_fetch_assoc($r)){
			array_push($ReadSede, $row);
			}
		return $ReadSede;
	} #end ReadSede

	function ReadSegmento($conn){ #start ReadSegmento
		$sql = "SELECT id, name FROM segmento WHERE state = 1;";
		$r = mysqli_query($conn, $sql);
		$DataSegmento = array();
		while($row = mysqli_fetch_assoc($r)){
			array_push($DataSegmento, $row);
		}
		return $DataSegmento;
	} #end ReadSegmento

	function ConsultCall($conn, $idUsuar, $id){ #start consulta llamada guardada
		$sql = 'SELECT *, DATE_FORMAT(date_call, "%Y-%m-%d") as date1 FROM calls WHERE user_id= '.$idUsuar.' AND id = '.$id.';';
		$r = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($r);
		return $data;
	} #end consulta llamada guardada


	function CountId($conn){
		$sql = "SELECT COUNT(id) as countid FROM calls ORDER BY id DESC";
		$r = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($r);
		return $data;
	}

	function escapaCadena($cadena){
		$cadena = escapeshellcmd($cadena);
		//print $cadena;
		$buscar  = array('^','delete', 'drop', 'truncate','exec','system');
		$reemplazar = array('-','de*le*te', 'dr*op', 'trun*cate','ex*ec','syst*em');
		$cadena = str_replace($buscar, $reemplazar, $cadena);
		//print $cadena;
		return $cadena;
	}

	function validaFecha($fecha){
		//aa-mm-dd
		$fecha_array = explode("-",$fecha);
		//mm, dd, aa
		return checkdate($fecha_array[1],$fecha_array[2],$fecha_array[0]);
	}

	function SaveCalls($conn,$idUsuar, $date, $company, $sede, $segmento, $name, $charge, $phone, $ext, $cell, $email, $desc_escapado, $datesys, $estado, $gencode){

		$id = 0;
		$date_sys_update = $datesys;
		$newcall = 0;
		$sendcall = 0; 
		$dteage = 0;
		$quoteid = 0;
		$observationsreg = "";
		$date_sys_manage = $datesys;

		$sql = "INSERT INTO calls VALUES (";
		$sql .= "'".$id."', ";
		$sql .= "'".$gencode."', ";
		$sql .= "'".$idUsuar."', ";
		$sql .= "'".$date."', ";
		$sql .= "'".$company."', ";
		$sql .= "'".$sede."', ";
		$sql .= "'".$segmento."', ";
		$sql .= "'".$name."', ";
		$sql .= "'".$charge."', ";
		$sql .= "'".$phone."', ";
		$sql .= "'".$ext."', ";
		$sql .= "'".$cell."', ";
		$sql .= "'".$email."', ";	
		$sql .= "'".$desc_escapado."', ";
		$sql .= "'".$datesys."', ";
		$sql .= "'".$estado."', ";
		$sql .= "'".$date_sys_update."', ";
		$sql .= "'".$newcall."', ";
		$sql .= "'".$sendcall."', ";
		$sql .= "'".$dteage."', ";
		$sql .= "'".$quoteid."', ";
		$sql .= "'".$observationsreg."', ";
		$sql .= "'".$date_sys_manage."'); ";

		#ejecuta el query
		if(mysqli_query($conn, $sql)){
			//print "El registro se insertó correctamente". $sql;
			return true;
		}else{
			return false;
		}
	}

	function generarCodigo($longitud) {
	 $key = '';
	 $pattern = '1234567890';
	 $max = strlen($pattern)-1;
	 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
	 return $key;
	}

	function UpdateCalls($conn, $idUsuar, $id, $date, $company, $sede, $segmento, $name, $charge, $phone, $ext, $cell, $email, $desc_escapado, $datesys, $estado){

		$sql = "UPDATE calls SET ";
		$sql .= "date_call = '".$date."', ";
		$sql .= "company_id = '".$company."', ";
		$sql .= "sede_id = '".$sede."', ";
		$sql .= "segmento_id = '".$segmento."', ";
		$sql .= "contact_name = '".$name."', ";
		$sql .= "contact_charge = '".$charge."', ";
		$sql .= "phone1 = '".$phone."', ";
		$sql .= "ext = '".$ext."', ";
		$sql .= "cellphone = '".$cell."', ";
		$sql .= "email = '".$email."', ";
		$sql .= "observations = '".$desc_escapado."', ";
		$sql .= "date_sys_update = '".$datesys."', ";
		$sql .= "state = '".$estado."' ";
		$sql .= "WHERE id=".$id;
		#ejecuta el query
		if(mysqli_query($conn, $sql)){
			//print "El registro se insertó correctamente";
			return true;
		} else {
			return "Error al insertar el registro ".$sql;
		}
	}

	function UpdateCommitments($conn, $state, $newcall, $sendcall, $dteage, $quoteid, $observationsreg, $date_sys_update, $id){

		$sql = "UPDATE calls SET ";
		$sql .= "state = '".$state."', ";
		$sql .= "newcall = '".$newcall."', ";
		$sql .= "sendcall = '".$sendcall."', ";
		$sql .= "dteage = '".$dteage."', ";
		$sql .= "quoteid = '".$quoteid."', ";
		$sql .= "observationsreg = '".$observationsreg."', ";
		$sql .= "date_sys_manage = '".$date_sys_update."' ";
		$sql .= "WHERE id = ".$id;
		#ejecuta el query
		if(mysqli_query($conn, $sql)){
			//print "El registro se insertó correctamente";
			return true;
		} else {
			return "Error al insertar el registro ".$sql;
		}
	}

	function SeeCode($conn, $id){
		$sql = "SELECT code FROM calls WHERE id = $id";
		$r = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($r);
		return $data;
	}

}

?>