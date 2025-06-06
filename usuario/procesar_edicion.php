<?php
session_start();
require 'conexion.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$usuarioActual = $_SESSION['usuario'];

$nombre = trim($_POST['nombre']);
$correo = trim($_POST['correo']);
$password = $_POST['password'];

if (!empty($password)) {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE usuarios SET nombre = ?, correo = ?, password = ? WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $correo, $passwordHash, $usuarioActual);
} else {
    $sql = "UPDATE usuarios SET nombre = ?, correo = ? WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $correo, $usuarioActual);
}

if ($stmt->execute()) {
    echo "<script>
        alert('Datos actualizados correctamente.');
        window.location.href = 'perfil.php';
    </script>";
} else {
    echo "<script>
        alert('Hubo un error al actualizar los datos.');
        window.history.back();
    </script>";
}

$stmt->close();
$conn->close();
?>
