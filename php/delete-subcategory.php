<?php

if (isset($_GET['subcategory_id'])) {
    require './config.php';

    $subcategory_id = $_GET['subcategory_id'];

    $stmt = $conn->prepare("DELETE FROM tbl_subcategoria WHERE subcategoria_id = ?");
    $stmt->bind_param("i", $subcategory_id);

    $stmt->execute();
    if (($stmt) && ($stmt->affected_rows == 1)) {
        echo '<script type="text/javascript">
        alert("Se eliminó la categoria");
        window.location.href = "../frm_crear-subcategorias.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Error al eliminar la categoria");
        window.location.href = "../frm_crear-subcategorias.php";
        </script>';
    }
    $stmt->close();
    $conn->close();
}
