<?php
session_start();
require 'conexion.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$usuarioActual = $_SESSION['usuario'];

$sql = "SELECT nombre, correo FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuarioActual);
$stmt->execute();
$stmt->bind_result($nombre, $correo);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil del Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            padding: 20px;
        }
        .perfil-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            margin: auto;
            box-shadow: 0px 0px 10px #ccc;
        }
        h2 {
            text-align: center;
        }
        .perfil-info {
            margin: 15px 0;
        }
        .btn {
            display: block;
            margin: 20px auto;
            padding: 10px;
            background-color: #0a74da;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 80%;
            text-align: center;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="perfil-container">
        <h2>Perfil del Usuario</h2>
        <div class="perfil-info"><strong>Usuario:</strong> <?php echo htmlspecialchars($usuarioActual); ?></div>
        <div class="perfil-info"><strong>Nombre:</strong> <?php echo htmlspecialchars($nombre); ?></div>
        <div class="perfil-info"><strong>Correo:</strong> <?php echo htmlspecialchars($correo); ?></div>
        
        <a href="editar_usuario.php" class="btn">Editar Información</a>
        <a href="logout.php" class="btn" style="background-color: #e74c3c;">Cerrar sesión</a>
    </div>
</body>
</html>
