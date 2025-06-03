<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $nom_usuario = $_POST['nom_usuario'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $nombre_archivo = $_FILES['avatar']['name'];
    $archivo_tmp = $_FILES['avatar']['tmp_name'];
    $ruta_destino = 'imagenes/clientes/' . uniqid() . '_' . basename($nombre_archivo);
    $es_imagen = getimagesize($archivo_tmp);

    if ($es_imagen && move_uploaded_file($archivo_tmp, $ruta_destino)) {
        $sql = "INSERT INTO clientes (username, nom_usuario, password, avatar)
                VALUES ('$username', '$nom_usuario', '$password', '$ruta_destino')";

        if ($connec->query($sql) === TRUE) {
            header("Location: admin_clientes.php");
            exit();
        } else {
            echo "Error al crear cliente: " . $connec->error;
        }
    } else {
        echo "Error al subir el avatar. Asegúrese de que sea una imagen válida.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cliente</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .creadclientecontainer {
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
            box-sizing: border-box;
            flex-wrap: wrap;
            height: auto;
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
        input[type="password"],
        input[type="file"] {
            width: 100%;
            padding: 10px 12px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            background-color: #1b1f3a;
            color: #fff;
            box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
        }
        input::placeholder {
            color: #aaa;
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
<body class="creadclientecontainer">
    <?php include('barras/navbar-usuario.php'); ?>
    <?php include('barras/sidebar-usuario.php'); ?>
    <div class="form-container">
        <h1>Crear Nuevo Cliente</h1>
        <form action="crear_cliente.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Nombre de Usuario</label>
                <input type="text" name="username" id="username" required>
            </div>

            <div class="form-group">
                <label for="nom_usuario">Nombre Completo</label>
                <input type="text" name="nom_usuario" id="nom_usuario" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label for="avatar">Avatar (imagen)</label>
                <input type="file" name="avatar" id="avatar" accept="image/*" required>
            </div>

            <div class="form-buttons">
                <button type="submit">Guardar</button>
                <a href="admin_clientes.php">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>