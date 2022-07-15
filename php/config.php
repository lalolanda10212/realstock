<?php 
$bd_host = "localhost";
$bd_user = "root";
$bd_password = "";
$bd_name = "bd_realstock";
$conn = new mysqli($bd_host, $bd_user, $bd_password);
if (mysqli_connect_errno()) {
	echo "Fallo al conectar con la base de datos";
	exit();
}
mysqli_select_db($conn, $bd_name) or die ("No se encontró la base de datos");
?>