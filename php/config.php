<?php 
$bd_host = "remotemysql.com";
$bd_user = "BAqqZT4d96";
$bd_password = "z8mFfNpya8";
$bd_name = "BAqqZT4d96";
$conn = new mysqli($bd_host, $bd_user, $bd_password);
if (mysqli_connect_errno()) {
	echo "Fallo al conectar con la base de datos";
	exit();
}
mysqli_select_db($conn, $bd_name) or die ("No se encontró la base de datos");
?>
