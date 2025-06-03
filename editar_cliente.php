<?php
session_start();
include('conexion.php');

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID de cliente no proporcionado.";
    exit;
}

$sql = "SELECT * FROM clientes WHERE Id = ?";
$stmt = $connec->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$cliente = $resultado->fetch_assoc();

if (!$cliente) {
    echo "Cliente no encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .bodyeditarcliente {
            background-color: #1b1f3a;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
            margin: 0;
            margin-top: 140px;
            margin-left: 70px;
        }

        .form-container {
            max-width: 500px;
            margin: 60px auto;
            background-color: #2e3856;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
            flex-wrap: wrap;
            height: auto;
            min-height: 700px;
        }

        .form-container h1 {
            margin-bottom: 25px;
            font-size: 24px;
            text-align: center;
            color: #00c4cc;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
            color: #ccc;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            background-color: #1b1f3a;
            color: #fff;
            box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 25px;
        }

        .form-buttons button,
        .form-buttons a {
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .form-buttons button {
            background-color: #00c4cc;
            color: #1b1f3a;
            cursor: pointer;
        }

        .form-buttons button:hover {
            background-color: #00a0a7;
        }

        .form-buttons a {
            background-color: #444b6e;
            color: #fff;
        }

        .form-buttons a:hover {
            background-color: #3a4060;
        }
    </style>
</head>
<body class="bodyeditarcliente">
    <?php include('barras/navbar-usuario.php'); ?>
    <?php include('barras/sidebar-usuario.php'); ?>
    <div class="form-container">
        <h1>Editar Cliente</h1>
        <form action="actualizar_cliente.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="Id" value="<?= $cliente['Id'] ?>">
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" name="username" id="username" value="<?= htmlspecialchars($cliente['username']) ?>" required>
            </div>
            <div class="form-group">
                <label for="nom_usuario">Nombre</label>
                <input type="text" name="nom_usuario" id="nom_usuario" value="<?= htmlspecialchars($cliente['nom_usuario']) ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" value="<?= htmlspecialchars($cliente['password']) ?>" required>
            </div>
            <div class="form-group">
                <label for="avatar">Avatar actual</label><br>
                <img src="<?= $cliente['avatar'] ?>" alt="Avatar actual" style="max-width: 100px; border-radius: 8px;"><br><br>

                <label for="avatar">Cambiar Avatar (opcional)</label>
                <input type="file" name="avatar" id="avatar" accept="image/*">
                <input type="hidden" name="avatar_actual" value="<?= $cliente['avatar'] ?>">
            </div>

            <div class="form-buttons">
                <button type="submit">Actualizar</button>
                <a href="admin_clientes.php">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
