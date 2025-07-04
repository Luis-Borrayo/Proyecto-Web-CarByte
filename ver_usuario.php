<?php
include 'conexion.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID de usuario no proporcionado.";
    exit;
}

$sql = "SELECT * FROM usuario WHERE Id1 = ?";
$stmt = $connec->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

if (!$usuario) {
    echo "Usuario no encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Usuario</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            background-color: #1b1f3a;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
        }

        .container {
            max-width: 500px;
            margin: 60px auto;
            background-color: #2e3856;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
            text-align: center;
        }

        h1 {
            color: #00c4cc;
            margin-bottom: 25px;
        }

        img {
            max-width: 120px;
            border-radius: 50%;
            border: 2px solid #00c4cc;
            margin-bottom: 20px;
        }

        .info-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .info-group strong {
            color: #00c4cc;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            border-radius: 8px;
            background-color: #444b6e;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .back-link:hover {
            background-color: #3a4060;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalle del Usuario</h1>
        <img src="<?= $usuario['avatar'] ?>" alt="Avatar del usuario">
        <div class="info-group"><strong>Usuario:</strong> <?= $usuario['username'] ?></div>
        <div class="info-group"><strong>Nombre:</strong> <?= $usuario['nom_usuario'] ?></div>
        <div class="info-group"><strong>Puesto:</strong> <?= $usuario['puesto'] ?></div>
        <div class="info-group"><strong>Contraseña:</strong> <?= $usuario['password'] ?></div>
        <div class="info-group"><strong>Código de seguridad:</strong> <?= $usuario['codigo_seguridad'] ?></div>
        <a class="back-link" href="admin_usuarios.php">← Volver</a>
    </div>
</body>
</html>