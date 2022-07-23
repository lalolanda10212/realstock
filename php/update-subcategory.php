<?php
if (isset($_POST['update'], $_GET['subcategory_id'])) {
    require 'config.php';

    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $description = $_POST['description'];

    $subcategory_id = $_GET['subcategory_id'];

    $stmt = $conn->prepare("UPDATE tbl_subcategoria SET nombre = ?, descripcion = ?, tbl_categoria_id = ? WHERE subcategoria_id = ?");
    $stmt->bind_param("ssss", $subcategory, $description, $category, $subcategory_id);

    $stmt->execute();
    if (($stmt) && ($stmt->affected_rows == 1)) {
        echo '<script type="text/javascript">
        alert("Se actualizó correctamente la subcategoría: ' . $subcategory . '");
        window.location.href = "../frm_crear-subcategorias.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Error al actualizar la subcategoría");
        window.location.href = "../frm_crear-subcategorias.php";
        </script>';
    }
    $stmt->close();
    $conn->close();
}
