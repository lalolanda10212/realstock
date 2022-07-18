<?php
if (isset($_POST['save'])) {
    require './config.php';

    if (!isset($_POST['category'])) {
        echo '<script type="text/javascript">
        alert("Tiene que seleccionar una categoría");
        window.location.href = "../frm_crear-subcategorias.php";
        </script>';
        exit();
    }

    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO tbl_subcategoria (nombre, descripcion, tbl_categoria_id) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $subcategory, $description, $category);

    $stmt->execute();
    if (($stmt) && ($stmt->affected_rows == 1)) {
        echo '<script type="text/javascript">
        alert("Se creó la subcategoría: ' . $subcategory . ' correctamente");
        window.location.href = "../frm_crear-subcategorias.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Error al registrar la subcategoría");
        window.location.href = "../frm_crear-subcategorias.php";
        </script>';
    }
    $stmt->close();
    $conn->close();
}
