<?php
require 'class.ReadDate.php';

$rDate = new readDate();
$productos = $rDate->getDates($idUsuar);

for ($i=0; $i < count($productos) ; $i++) { 
	$row = $i+1;
	$datesys = date("d/m/Y");
	if ($productos[$i]["date"] < $datesys) {
		print '<tr class="table-danger">';
	}else{
		print '<tr class="table-success">';
	}
		print '<th scope="row" class="warning">'.$row.'</th>';
		print '<td>'.$productos[$i]["date"].'</td>';
		print '<td>'.$productos[$i]["name"].'</td>';
		print '<td>'.$productos[$i]["phone"].' - '.$productos[$i]["cel"].'</td>';
		print '<td><a class="btn btn-outline-link btn-sm" href="date.php?m=U&id='.$productos[$i]["id"].'"><i class="fas fa-search-plus"></i></a></td>';
		print '</tr>';
	}
?>