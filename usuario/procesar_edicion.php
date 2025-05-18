<?php
session_start();
require 'conexion.php';

// Validar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Obtener el usuario actual desde la sesión
$usuarioActual = $_SESSION['usuario'];

// Recoger datos del formulario
$nombre = trim($_POST['nombre']);
$correo = trim($_POST['correo']);
$password = $_POST['password']; // puede venir vacío si no la quiere cambiar

// Verificamos si se quiere actualizar la contraseña
if (!empty($password)) {
    // Hashear la contraseña antes de guardarla (por seguridad)
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE usuarios SET nombre = ?, correo = ?, password = ? WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $correo, $passwordHash, $usuarioActual);
} else {
    $sql = "UPDATE usuarios SET nombre = ?, correo = ? WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $correo, $usuarioActual);
}

// Ejecutar y verificar
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
