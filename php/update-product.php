<?php
if (isset($_POST['update'], $_GET['product_id'])) {
    require 'config.php';

    $serial = $_POST['serial'];
    $initial_counter = $_POST['initial_counter'];
    $annotation = $_POST['annotation'];
    $max_stock = $_POST['max_stock'];
    $min_stock = $_POST['min_stock'];
    $status = $_POST['status'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $description = $_POST['description'];
    $subcategory = $_POST['subcategory'];

    $product_id = $_GET['product_id'];

    $stmt = $conn->prepare("UPDATE tbl_producto SET no_serie = ?, contador_inicial = ?, anotacion = ?, stock_maximo = ?, stock_minimo = ?, estado = ?, marca_fabricante = ?, modelo = ?, descripcion = ?, tbl_subcategoria_id = ? WHERE producto_id = '$product_id'");
    $stmt->bind_param("ssssssssss", $serial, $initial_counter, $annotation, $max_stock, $min_stock, $status, $brand, $model, $description, $subcategory);

    $stmt->execute();
    if (($stmt) && ($stmt->affected_rows == 1)) {
        echo '<script type="text/javascript">
        alert("Se actualizó correctamente el producto: ' . $model . '");
        window.location.href = "../frm_registrar-productos.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Error al actualizar el modelo");
        window.location.href = "../frm_registrar-productos.php";
        </script>';
    }
    $stmt->close();
    $conn->close();
}
