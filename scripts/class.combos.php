<?php
require_once 'class.conn.php';

class combos extends conn
{
	function __construct()
	{
		parent::__construct();
	}

	var $code = "";
	
	function getCity()
	{
		return $sql = parent::consulta("SELECT id, name FROM city WHERE state = 1 ORDER BY 2 ASC;");
	}

	function getRazonSocial()
	{
		return $sql = parent::consulta("SELECT id, name FROM company WHERE state = 1 ORDER BY 2 ASC;");
	}

	function getSede()
	{
		return $sql = parent::consulta("SELECT id, name FROM sede WHERE state = 1 ORDER BY 2 ASC;");
	}

	function getSegmento()
	{
		return $sql = parent::consulta("SELECT id, name FROM segmento WHERE state = 1 ORDER BY 2 ASC;");
	}			
}
?>