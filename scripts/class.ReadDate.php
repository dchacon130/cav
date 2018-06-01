<?php 
require_once 'class.conn.php';
/**
 * Leer información de citas por cumplir
 */
class readDate extends conn 
{
	function __construct()
	{
		parent::__construct();
	}

	function getDates($idUsuar){
		$sql = parent::consulta("
			SELECT dates.id, DATE_FORMAT(date_call, '%d/%m/%Y') as date, company.name, CONCAT(dates.phone1, '-', dates.ext) as phone, dates.cellphone as cel
			FROM dates, company 
			WHERE dates.company_id = company.id 
			AND dates.user_id = $idUsuar
			AND dates.state IN (1,2) 
			AND company.state = 1 ;");
		
		
		return $sql->fetchall();
	}
	
} ?>