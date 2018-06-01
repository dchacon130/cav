<?php 
require_once 'class.conn.php';
/**
 * Gurda información de citas por cumplir
 */
class addDate extends conn 
{
	function __construct()
	{
		parent::__construct();
	}

	function DateAdd($id, $code, $idUsuar, $date_call, $trading, $city, $company, $sede, $segment, $name, $charge, $email, $phone, $ext, $cell, $observation){

		$datesys = date("Y-m-d H:i:s");
		$state = 1;

		$sql = parent::consulta('INSERT INTO dates(id, code, user_id, date_call, training, city_id, company_id, sede_id, segmento_id, contact_name, contact_charge, phone1, ext, cellphone, email, observations, date_sys_creation, state, date_sys_update) 
			VALUES ("'.$id.'", 
					"'.$code.'", 
					"'.$idUsuar.'", 
					"'.$date_call.'", 
					"'.$trading.'", 
					"'.$city.'", 
					"'.$company.'", 
					"'.$sede.'", 
					"'.$segment.'", 
					"'.$name.'", 
					"'.$charge.'", 
					"'.$phone.'", 
					"'.$ext.'", 
					"'.$cell.'", 
					"'.$email.'", 
					"'.$observation.'", 
					"'.$datesys.'", 
					"'.$state.'", 
					"'.$datesys.'" );');

		#ejecuta el query
		if($sql->rowCount() == 1){
			return true;
		}else{
			return false;
		}
	}
	
} ?>