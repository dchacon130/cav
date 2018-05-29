<?php 

/**
 * Clase creada para ingresar empresas a la tabla Company
 */
class SedeCreate
{
	
	function __construct()
	{
		# code...
	}

	function ReadCompany($conn, $idUsuar){ #start ReadCompany
		$estado = "1";
		$DataCompany = array();

		try{
			$sql = "SELECT id, name FROM company WHERE state = 1 AND user_id = $idUsuar;";
			$r = mysqli_query($conn, $sql);
		}catch(Exception $e){
			return $e;
		}
		
		while($row = mysqli_fetch_assoc($r)){
			array_push($DataCompany, $row);
			}
		return $DataCompany;
	} #end ReadCompany

	function SaveSede($conn, $idUsuar, $company, $name, $addres, $phone, $datesys, $estado){

		try{
			$sql = "INSERT INTO sede VALUES(0,'".$company."', ";
			$sql .= "'".$name."', ";
			$sql .= "'".$phone."', ";
			$sql .= "'".$addres."', ";
			$sql .= "'".$datesys."', ";
			$sql .= "'".$estado."');";

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


	function ReadSede($conn, $idUsuar){ #read table calls and company
		$sql = "
		SELECT sede.id, company.name as company, sede.name as sede, sede.phone, sede.address 
			FROM sede, company 
			WHERE sede.company_id = company.id
			AND company.user_id = $idUsuar
			AND sede.state = 1;";
		$r = mysqli_query($conn, $sql);
		$sedes = array();
		while($row = mysqli_fetch_assoc($r)){
			array_push($sedes, $row);
		}
		return $sedes;
	} #end read table
}

 ?>