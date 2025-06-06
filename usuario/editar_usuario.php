<?php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Helvetica Neue', sans-serif;
            margin: 0;
            padding: 0;
        }

        .header-principal {
            background-color: #d60000;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .editar-container {
            max-width: 600px;
            margin: 60px auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }

        .editar-container h2 {
            text-align: center;
            color: #d60000;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        .btn-guardar {
            width: 100%;
            padding: 14px;
            background-color: #d60000;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-guardar:hover {
            background-color: #a40000;
        }
    </style>
</head>
<body>

<div class="header-principal">
    <h1>Editar Perfil</h1>
    <a href="index.php" style="color:white; text-decoration:none;">Menu</a>
</div>

<div class="editar-container">
    <h2>Actualiza tu información</h2>
    <form method="POST" action="procesar_edicion.php">
        <div class="form-group">
            <label for="nombre">Nombre completo</label>
            <input type="text" id="nombre" name="nombre" value="" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo electrónico</label>
            <input type="email" id="correo" name="correo" value="" required>
        </div>
        <div class="form-group">
            <label for="password">Nueva contraseña</label>
            <input type="password" id="password" name="password">
        </div>
        <button type="submit" class="btn-guardar">Guardar Cambios</button>
    </form>
</div>

</body>
</html>
