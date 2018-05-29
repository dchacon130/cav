<?php
//Iniciamos sesión
session_start();
//Si existe la variable usuario
if (isset($_SESSION['usuario'])){
	//Pasando los valores a variables de trabajo
	$idUsuar = $_SESSION['usuario']['id'];
	$nombre = $_SESSION['usuario']['name'];
	$apellido = $_SESSION['usuario']['lastname'];
	$profileid = $_SESSION['usuario']['profile_id'];
	if ($profileid==1) {
		$cargo = "GE";
	}else if ($profileid==2) {
		$cargo = "GC";
	}else if ($profileid==3) {
		$cargo = "VE";
	}else if ($profileid==4) {
		$cargo = "SC";
	}
}else{
	header("location:index");
}
?>