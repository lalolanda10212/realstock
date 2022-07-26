<?php 
session_start();
session_destroy();

echo '<script type="text/javascript">
alert("Cerro sesión 👋");
window.location.href="../index.php";
</script>';
?>