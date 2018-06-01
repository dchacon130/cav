<?php
class conn
{
  var $conexion;
  function __construct()
  {
    try{
      $this->conexion = new PDO("mysql:host=localhost;dbname=cavdb","usucav","F34relfo");
      $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->conexion->exec("SET NAMES 'utf8'");
    }catch(Exception $e){
      echo "Conexión no disponible";
      exit;
    }

  }

  function consulta($consulta)
  {
    $resultado = $this->conexion->query($consulta);
  	if(!$resultado){
  		echo 'MySQL Error: ' . mysql_error();
	    exit;
	   }
  	 return $resultado; 
  }
}

/*Verificar conexión
$conexion = new conn();
$consulta = $conexion->consulta("SELECT * FROM user");
echo "<pre>";
var_dump($consulta->fetch(PDO::FETCH_ASSOC));
*/
?>