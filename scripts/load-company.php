<?php
include("class.conn.php");
include("class.combos.php");
$selects = new selects();
$companies = $selects->cargarEmpresas($idUsuar);
foreach($companies as $key=>$value)
{
  echo "<option value=\"$key\">$value</option>";
}
?>