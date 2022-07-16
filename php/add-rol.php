<?php 
require 'config.php';

if (isset($_POST['save'])) {
    $rol = $_POST['rol'];
    $permissions = $_POST['permissions'];
    $per_json = json_encode($permissions);

    $stmt = $conn->prepare("INSERT INTO tbl_rol (nombre, permisos) VALUES (?, ?)");
    $stmt->bind_param('ss', $rol, $per_json);

    $stmt->execute();
    if (($stmt) && ($stmt -> affected_rows == 1)) {
        echo '<script type="text/javascript">
        alert("Se creo el rol: '. $rol .' correctamente");
        window.location.href = "../frm_crear-roles.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Error al registrar el rol");
        window.location.href = "../frm_crear-roles.php";
        </script>';
    }
    $stmt->close();
    $conn->close();
}

?>