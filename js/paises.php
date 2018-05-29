<?php

$conexion = mysqli_connect("localhost","root","","cavdb");

$el_continente = $_POST['continente'];

$query = $conexion->query("SELECT id as id_pais, name as nombre FROM sede WHERE company_id = $el_continente;");

echo '<option value="0">'.$el_continente.'</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['id_pais']. '">' . $row['nombre'] . '</option>' . "\n";
}
