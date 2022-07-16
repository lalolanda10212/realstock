<?php 
require 'config.php';

if (isset($_POST['register'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
    $confirm_pass = $_POST['confirm_pass'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $status = $_POST['status'];

    if ($password !== $confirm_pass) {
        echo '<script type="text/javascript">
        alert("Las contraseñas no coinciden. Intente de nuevo");
        window.location.href = "../frm_registrar-usuarios.php";
        </script>';
        exit();
    }
    $password = password_hash($password, PASSWORD_DEFAULT, array('cost' =>12));
    $stmt = $conn->prepare("INSERT INTO tbl_usuario (usuario, contrasena, estado, email, nombres, apellidos) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $user, $password, $status, $email, $name, $last_name);

    $stmt->execute();
    if (($stmt) && ($stmt -> affected_rows == 1)) {
        echo '<script type="text/javascript">
        alert("El usuario: '. $user .' se ha creado con exito");
        window.location.href = "../frm_registrar-usuarios.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Error al registrar el usuario");
        window.location.href = "../frm_registrar-usuarios.php";
        </script>';
    }
    $stmt->close();
    $conn->close();
}
