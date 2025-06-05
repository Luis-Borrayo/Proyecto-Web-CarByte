<?php
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['user']);
    $nombre = trim($_POST['nombre']);
    $nueva_contraseña = trim($_POST['pass']);

    $stmt = $connec->prepare("SELECT Id FROM clientes WHERE username = ? AND nom_usuario = ?");
    $stmt->bind_param("ss", $usuario, $nombre);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $nueva_contraseña_hash = password_hash($nueva_contraseña, PASSWORD_DEFAULT);
        $stmt2 = $connec->prepare("UPDATE clientes SET password = ? WHERE username = ?");
        $stmt2->bind_param("ss", $nueva_contraseña_hash, $usuario);
        $stmt2->execute();

        echo "<script>
            alert('Contraseña actualizada correctamente');
            window.location.href='../index.php?login=1';
        </script>";
    } else {
        echo "<script>alert('Usuario o nombre incorrecto'); window.location.href='../index.php';</script>";
    }
}
?>
