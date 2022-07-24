<?php
if (isset($_POST['save'])) {

    require './config.php';

    $category = $_POST['category'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO tbl_categoria (nombre, descripcion) VALUES (?, ?)");
    $stmt->bind_param('ss', $category, $description);

    $stmt->execute();
    if (($stmt) && ($stmt->affected_rows == 1)) {
        echo '<script type="text/javascript">
        alert("Se creó la categoría: ' . $category . ' correctamente");
        window.location.href = "../frm_crear-categorias.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Error al registrar la categoría");
        window.location.href = "../frm_crear-categorias.php";
        </script>';
    }
    $stmt->close();
    $conn->close();
}
