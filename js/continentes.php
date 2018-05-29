<?php

$conexion = mysqli_connect("localhost","root","","cavdb");

$query = $conexion->query("SELECT id, name as nombre FROM company");

echo '<option value="0">Seleccione</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['id']. '">' . $row['nombre'] . '</option>' . "\n";
}
