<?php 
	require 'conn/conn.php';

if (isset($_POST["user"])) {
	# code...Recibimos los datos de usuario
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	# consultamos en la base de datos
	$sql = "SELECT * FROM user WHERE user = '".$user."' AND password = '".$pass."'";
	$r = mysqli_query($conn, $sql);
	$n = mysqli_num_rows($r);
	#verificamos que es correcto el usuario y contraseña
	if ($n==1) {
		# code...pasamos los datos a un objeto
		$objetoSesion = mysqli_fetch_assoc($r);
		#iniciamos sesion
		session_start();
		#creamos variable de sesión
		$_SESSION['usuario'] = $objetoSesion;
		#ingresamos a la aplicación
		$saltaPagina = "home";
		header("location: ".$saltaPagina);
	}else{
		$error = "Clave de acceso o correo electrónico incorrectos";
	}
}
?>