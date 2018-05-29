<?php 

/**
 * Clase creada para ingresar empresas a la tabla Company
 */
class CompanyCreate
{
	
	function __construct()
	{
		# code...
	}

	function TypeDocument($conn){ #start ReadSegmento
		$sql = "SELECT id, name FROM document_type WHERE state = 1;";
		$r = mysqli_query($conn, $sql);
		$TypeDoc = array();
		while($row = mysqli_fetch_assoc($r)){
			array_push($TypeDoc, $row);
		}
		return $TypeDoc;
	} #end ReadSegmento

	function CityName($conn){ #start ReadSegmento
		$sql = "SELECT id, name FROM city WHERE state = 1;";
		$r = mysqli_query($conn, $sql);
		$cityname = array();
		while($row = mysqli_fetch_assoc($r)){
			array_push($cityname, $row);
		}
		return $cityname;
	} #end ReadSegmento

	function SaveCompany($conn, $idUsuar, $name, $doctype, $rut, $dv, $addres, $city, $phone, $datesys, $estado){

		try{
			$sql = "INSERT INTO company VALUES(0,'".$idUsuar."', ";
			$sql .= "'".$name."', ";
			$sql .= "'".$doctype."', ";
			$sql .= "'".$rut."', ";
			$sql .= "'".$dv."', ";
			$sql .= "'".$addres."', ";
			$sql .= "'".$city."', ";
			$sql .= "'".$phone."', ";
			$sql .= "'".$datesys."', ";
			$sql .= "'".$estado."')";

		}catch(Exception $e){
			return "Error al insertar el registro ".$sql." Error: ".$e;
		}

		#ejecuta el query
		if(mysqli_query($conn, $sql)){
			//print "El registro se insertó correctamente";
			return "El registro se insertó correctamente";
		}else{
			return 'Error al guardare el registro: '.$sql;
		}
	}


	function ReadCompany($conn, $idUsuar){ #read table calls and company
		$sql = "
		SELECT id, CONCAT(document,'-', dv) as doc, name, address, phone FROM company WHERE user_id = $idUsuar AND state = 1;";
		$r = mysqli_query($conn, $sql);
		$rCompany = array();
		while($row = mysqli_fetch_assoc($r)){
			array_push($rCompany, $row);
		}
		return $rCompany;
	} #end read table
}

 ?>