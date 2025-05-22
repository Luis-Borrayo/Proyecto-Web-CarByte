<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $nom_usuario = $_POST['nom_usuario'];
    $puesto = $_POST['puesto'];
    $password = $_POST['password']; // Contraseña sin hash
    $codigo_seguridad = $_POST['codigo_seguridad'];

    $nombre_archivo = $_FILES['avatar']['name'];
    $archivo_tmp = $_FILES['avatar']['tmp_name'];
    $ruta_destino = 'imagenes/avatars/' . uniqid() . '_' . basename($nombre_archivo);
    $es_imagen = getimagesize($archivo_tmp);

    if ($es_imagen && move_uploaded_file($archivo_tmp, $ruta_destino)) {
        $sql = "INSERT INTO usuario (username, nom_usuario, puesto, password, codigo_seguridad, avatar)
                VALUES ('$username', '$nom_usuario', '$puesto', '$password', '$codigo_seguridad', '$ruta_destino')";

        if ($connec->query($sql) === TRUE) {
            header("Location: admin_usuarios.php");
            exit();
        } else {
            echo "Error al crear usuario: " . $connec->error;
        }
    } else {
        echo "Error al subir el archivo. Asegúrese de que sea una imagen válida.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            background-color: #1b1f3a;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
        }
        .form-container {
            max-width: 500px;
            margin: 60px auto;
            background-color: #2e3856;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
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
        input[type="file"],
        select {
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
<body>
    <div class="form-container">
        <h1>Crear Nuevo Usuario</h1>
        <form action="crear_usuario.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" name="username" id="username" required>
            </div>

            <div class="form-group">
                <label for="nom_usuario">Nombre</label>
                <input type="text" name="nom_usuario" id="nom_usuario" required>
            </div>

            <div class="form-group">
                <label for="puesto">Puesto</label>
                <select name="puesto" id="puesto" required>
                    <option value="">Seleccione un puesto</option>
                    <option value="Cliente">Cliente</option>
                    <option value="Vendedor">Vendedor</option>
                    <option value="Admin">Admin</option>
                    <option value="Gerente">Gerente</option>
                    <option value="Jefe">Jefe</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label for="codigo_seguridad">Código de Seguridad</label>
                <input type="text" name="codigo_seguridad" id="codigo_seguridad" required>
            </div>

            <div class="form-group">
                <label for="avatar">Subir Avatar (Imagen)</label>
                <input type="file" name="avatar" id="avatar" accept="image/*" required>
            </div>

            <div class="form-buttons">
                <button type="submit">Guardar</button>
                <a href="admin_usuarios.php">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
