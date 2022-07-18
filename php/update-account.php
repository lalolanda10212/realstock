<?php
require 'config.php';

if (isset($_POST['update'], $_GET['user_id'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];

    $user_id = $_GET['user_id'];

    $stmt = $conn->prepare("UPDATE tbl_usuario SET email = ?, nombres = ?, apellidos = ? WHERE usuario_id = '$user_id'");
    $stmt->bind_param('sss', $email, $name, $last_name);

    $stmt->execute();
    if (($stmt) && ($stmt->affected_rows == 1)) {
        echo '<script type="text/javascript">
        alert("Se actualizó la información del usuario");
        window.location.href = "../frm_editar-perfil.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Error al actualizar la información");
        window.location.href = "../frm_editar-perfil.php";
        </script>';
    }
    $stmt->close();
    $conn->close();
}
