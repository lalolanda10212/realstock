<?php
require 'config.php';
if (isset($_GET['rol_id'])) {
    $rol_id = $_GET['rol_id'];

    $stmt = $conn->prepare("DELETE FROM tbl_rol WHERE rol_id = ?");
    $stmt->bind_param("i", $rol_id);

    $stmt->execute();
    if (($stmt) && ($stmt->affected_rows == 1)) {
        echo '<script type="text/javascript">
        alert("Se eliminó el rol");
        window.location.href = "../frm_crear-roles.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Error al eliminar el rol");
        window.location.href = "../frm_crear-roles.php";
        </script>';
    }
    $stmt->close();
    $conn->close();
}
