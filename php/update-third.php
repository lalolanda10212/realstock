<?php
if (isset($_POST['update'], $_GET['third_id'])) {
    require 'config.php';

    $document_type = $_POST['document_type'];
    $document = $_POST['document'];
    $business_name = $_POST['business_name'];
    $status = $_POST['status'];
    $contact_name = $_POST['contact_name'];
    $phone = $_POST['phone'];
    $web_page = $_POST['web_page'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    $third_id = $_GET['third_id'];

    $stmt = $conn->prepare("UPDATE tbl_tercero SET tipo_de_documento = ?, no_documento = ?, razon_social = ?, estado = ?, nombre_contacto = ?, telefono = ?, pagina_web = ?, email = ?, departamento = ?, ciudad = ?, direccion = ? WHERE tercero_id = ?");
    $stmt->bind_param("ssssssssssss", $document_type, $document, $business_name, $status, $contact_name, $phone, $web_page, $email, $department, $city, $address, $third_id);

    $stmt->execute();
    if (($stmt) && ($stmt->affected_rows == 1)) {
        echo '<script type="text/javascript">
        alert("Se actualizó correctamente al tercero: ' . $contact_name . '");
        window.location.href = "../frm_registrar-terceros.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Error al actualizar al tercero");
        window.location.href = "../frm_registrar-terceros.php";
        </script>';
    }
    $stmt->close();
    $conn->close();
}
