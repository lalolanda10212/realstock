<?php
require './config.php';

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];

    $stmt = $conn->prepare("DELETE FROM tbl_categoria WHERE categoria_id = ?");
    $stmt->bind_param("i", $category_id);

    $stmt->execute();
    if (($stmt) && ($stmt->affected_rows == 1)) {
        echo '<script type="text/javascript">
        alert("Se eliminó la categoria");
        window.location.href = "../frm_crear-categorias.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Error al eliminar la categoria");
        window.location.href = "../frm_crear-categorias.php";
        </script>';
    }
    $stmt->close();
    $conn->close();
}
