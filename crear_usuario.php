<?php
session_start();
include('conexion.php');

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $nom_usuario = trim($_POST['nom_usuario']);
    $puesto = $_POST['puesto'];
    $password = $_POST['password'];
    $codigo_seguridad = $_POST['codigo_seguridad'];
    $avatar = $_FILES['avatar'];

    if (strlen($password) < 6) {
        $error = "La contraseña debe tener al menos 6 caracteres.";
    } elseif ($avatar['error'] !== 0) {
        $error = "Error al subir el avatar.";
    } else {
        $extensiones_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
        $nombre_archivo = $avatar['name'];
        $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

        if (!in_array($extension, $extensiones_permitidas)) {
            $error = "Formato de avatar no permitido.";
        } else {
            $nuevo_nombre = uniqid() . "." . $extension;
            $ruta_destino = "avatars/" . $nuevo_nombre;
            if (!is_dir("avatars")) mkdir("avatars");

            if (move_uploaded_file($avatar['tmp_name'], $ruta_destino)) {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                $stmt = $connec->prepare("INSERT INTO usuario (username, nom_usuario, puesto, password, codigo_seguridad, avatar) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $username, $nom_usuario, $puesto, $password_hash, $codigo_seguridad, $ruta_destino);

                if ($stmt->execute()) {
                    $success = "Usuario creado exitosamente.";
                } else {
                    $error = "Error al insertar en la base de datos.";
                }
                $stmt->close();
            } else {
                $error = "Error al mover el archivo del avatar.";
            }
        }
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
        .crearusuariocontainer {
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
        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }
        .alert-error {
            background-color: #ff6b6b;
            color: #fff;
        }
        .alert-success {
            background-color: #51cf66;
            color: #fff;
        }
    </style>
</head>
<body class="crearusuariocontainer">
    <?php include('barras/navbar-usuario.php'); ?>
    <?php include('barras/sidebar-usuario.php'); ?>
    <div class="form-container">
        <h1>Crear Nuevo Usuario</h1>
        
        <?php if ($error): ?>
            <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>
        
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
                    <option value="Vendedor">Vendedor</option>
                    <option value="Admin">Admin</option>
                    <option value="Gerente">Gerente</option>
                    <option value="Jefe">Jefe</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" required minlength="6">
                <small style="color: #aaa;">Mínimo 6 caracteres</small>
            </div>

            <div class="form-group">
                <label for="codigo_seguridad">Código de Seguridad</label>
                <input type="text" name="codigo_seguridad" id="codigo_seguridad" required>
            </div>

            <div class="form-group">
                <label for="avatar">Subir Avatar (Imagen)</label>
                <input type="file" name="avatar" id="avatar" accept="image/jpeg, image/png, image/gif" required>
                <small style="color: #aaa;">Formatos aceptados: JPG, PNG, GIF</small>
            </div>

            <div class="form-buttons">
                <button type="submit">Guardar</button>
                <a href="admin_usuarios.php">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>