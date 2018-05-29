<?php

class selects extends conn
{
	var $code = "";
	
	function cargarEmpresas($idUsuar)
	{
		$consulta = parent::consulta("SELECT id, name FROM company WHERE state = 1 AND user_id = $idUsuar;");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$company = array();
			while($comp = parent::fetch_assoc($consulta))
			{
				$code = $comp["id"];
				$name = $comp["name"];				
				$company[$code]=$name;
			}
			return $company;
		}
		else
		{
			return false;
		}
	}
	function cargarProvincias()
	{
		$consulta = parent::consulta("SELECT nombre,prov_id FROM provincia WHERE com_id = '".$this->code."'");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$provincias = array();
			while($provincia = parent::fetch_assoc($consulta))
			{
				$code = $provincia["prov_id"];
				$name = $provincia["nombre"];				
				$provincias[$code]=$name;
			}
			return $provincias;
		}
		else
		{
			return false;
		}
	}
		
	function cargarLocalidades()
	{
		$consulta = parent::consulta("SELECT nombre,loc_id FROM localidad WHERE prov_id = '".$this->code."'");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$localidades = array();
			while($localidad = parent::fetch_assoc($consulta))
			{
				$code = $localidad["loc_id"];
				$name = $localidad["nombre"];				
				$localidades[$code]=$name;
			}
			return $localidades;
		}
		else
		{
			return false;
		}
	}		
}
?>