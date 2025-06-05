<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1b1f3a;
            color: #fff;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #2e3856;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0,0,0,0.5);
        }

        .sidebar h2 {
            color: #00c4cc;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 8px;
        }

        .sidebar a:hover {
            background-color: #00c4cc;
            color: #1b1f3a;
        }

        .content {
            margin-left: 270px;
            padding: 20px;
        }

        iframe {
            width: 100%;
            height: 90vh;
            border: none;
            border-radius: 10px;
            background-color: #2e3856;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin</h2>
        <a href="#" onclick="cargarContenido('admin_usuarios.php')">Usuarios</a>
        <a href="#" onclick="cargarContenido('admin_clientes.php')">Clientes</a>
        <a href="#" onclick="cargarContenido('admin_compras.php')">Compras</a>
        <a href="#" onclick="cargarContenido('admin_estadisticas.php')">Estadísticas</a>
    </div>

    <div class="content">
        <iframe id="contenido" src="admin_usuarios.php"></iframe>
    </div>

    <script>
        function cargarContenido(ruta) {
            document.getElementById('contenido').src = ruta;
        }
    </script>
</body>
</html>
