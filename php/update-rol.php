<?php 
require 'config.php';

if (isset($_POST['update'], $_GET['rol_id'])) {
    $rol = $_POST['rol'];
    $permissions = $_POST['permissions'];
    $per_json = json_encode($permissions);

    $rol_id = $_GET['rol_id'];

    $stmt = $conn->prepare("UPDATE tbl_rol SET nombre = ?, permisos = ? WHERE rol_id = '$rol_id'");
    $stmt->bind_param("ss", $rol, $per_json);

    $stmt->execute();
    if (($stmt) && ($stmt -> affected_rows == 1)) {
        echo '<script type="text/javascript">
        alert("Se actualizo correctamente'. $rol .'");
        window.location.href = "../frm_crear-roles.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Error al actualizar el usuario");
        window.location.href = "../frm_crear-roles.php";
        </script>';
    }
    $stmt->close();
    $conn->close();
}
