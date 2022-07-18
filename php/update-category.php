<?php
require 'config.php';

if (isset($_POST['update'], $_GET['category_id'])) {
    $category = $_POST['category'];
    $description = $_POST['description'];

    $category_id = $_GET['category_id'];

    $stmt = $conn->prepare("UPDATE tbl_categoria SET nombre = ?, descripcion = ? WHERE categoria_id = '$category_id'");
    $stmt->bind_param("ss", $category, $description);

    $stmt->execute();
    if (($stmt) && ($stmt->affected_rows == 1)) {
        echo '<script type="text/javascript">
        alert("Se actualizó correctamente la categoría: ' . $category . '");
        window.location.href = "../frm_crear-categorias.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Error al actualizar la categoría");
        window.location.href = "../frm_crear-categorias.php";
        </script>';
    }
    $stmt->close();
    $conn->close();
}
