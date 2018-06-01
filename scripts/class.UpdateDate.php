<?php 
require_once 'class.conn.php';
/**
 * Gurda información de citas por cumplir
 */
class updateDate extends conn 
{
	function __construct()
	{
		parent::__construct();
	}

	function ConsultDates($idUsuar, $id){
		
		$sql = parent::consulta('SELECT id, code, training, user_id, DATE_FORMAT(date_call, "%Y-%m-%d") as date_call,  city_id, company_id, sede_id, segmento_id, contact_name, contact_charge, phone1, ext, cellphone, email, observations, date_sys_creation, state, date_sys_update 
			FROM dates 
			WHERE user_id = "'.$idUsuar.'"
			AND id = "'.$id.'"
			AND state IN (1,2);');

			return $sql->fetch();
	}

	function updateAdd($id, $code, $idUsuar, $date_call, $training, $city, $company, $sede, $segment, $name, $charge, $email, $phone, $ext, $cell, $observation){

		$datesys = date("Y-m-d H:i:s");
		$state = 2;

		$sql = parent::consulta('UPDATE dates 
			SET date_call="'.$date_call.'",
				training="'.$training.'",
				city_id="'.$city.'",
				company_id="'.$company.'",
				sede_id="'.$sede.'",
				segmento_id="'.$segment.'",
				contact_name="'.$name.'",
				contact_charge="'.$charge.'",
				phone1="'.$phone.'",
				ext="'.$ext.'",
				cellphone="'.$cell.'",
				email="'.$email.'",
				observations="'.$observation.'",
				state="'.$state.'",
				date_sys_update="'.$datesys.'"
				WHERE id="'.$id.'" AND user_id="'.$idUsuar.'"');

		//var_dump($sql);
		
		#ejecuta el query
		if($sql->rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}
	
} ?>