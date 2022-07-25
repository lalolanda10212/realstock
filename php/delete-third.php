<?php

if (isset($_GET['third_id'])) {
    require './config.php';

    $third_id = $_GET['third_id'];

    $stmt = $conn->prepare("DELETE FROM tbl_tercero WHERE tercero_id = ?");
    $stmt->bind_param("i", $third_id);

    $stmt->execute();
    if (($stmt) && ($stmt->affected_rows == 1)) {
        echo '<script type="text/javascript">
        alert("Se eliminó al tercero");
        window.location.href = "../frm_registrar-terceros.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Error al eliminar al tercero");
        window.location.href = "../frm_registrar-terceros.php";
        </script>';
    }
    $stmt->close();
    $conn->close();
}
