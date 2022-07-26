<?php
if (isset($_POST['save'])) {
    require './config.php';

    $type_movement = $_POST['type_movement'];
    $subtype_movement = $_POST['subtype_movement'];
    $amount = $_POST['amount'];
    $unit_cost = $_POST['unit_cost'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $product = $_POST['product'];
    $third = $_POST['third'];

    $stmt = $conn->prepare("INSERT INTO tbl_movimiento (tipo_movimiento, subtipo_movimiento, cantidad, costo_unitario, fecha, descripcion, tbl_producto_id, tbl_tercero_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssss', $type_movement, $subtype_movement, $amount, $unit_cost, $date, $description, $product, $third);

    $stmt->execute();
    if (($stmt) && ($stmt->affected_rows == 1)) {
        echo '<script type="text/javascript">
        alert("Se registro el movimiento: ' . $type_movement . ' correctamente");
        window.location.href = "../frm_registrar-movimientos.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Error al registrar el movimiento");
        window.location.href = "../frm_registrar-movimientos.php";
        </script>';
    }
    $stmt->close();
    $conn->close();
}
