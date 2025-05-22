<?php
include 'conexion.php';

$sql = "SELECT * FROM usuario";
$resultado = $connec->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administración de Usuarios</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body.admin-body {
            background-color: #1b1f3a;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .admin-container {
            max-width: 1000px;
            margin: 60px auto;
            background-color: #2e3856;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }

        .admin-title {
            text-align: center;
            color: #00c4cc;
            margin-bottom: 25px;
        }

        .admin-btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
            font-size: 14px;
        }

        .crear-btn {
            background-color: #00c4cc;
            color: #1b1f3a;
            margin-bottom: 20px;
        }

        .crear-btn:hover {
            background-color: #00a0a7;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #1b1f3a;
            border-radius: 8px;
            overflow: hidden;
        }

        .admin-table th, .admin-table td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #444b6e;
        }

        .admin-table th {
            background-color: #00c4cc;
            color: #1b1f3a;
        }

        .admin-table tr:hover {
            background-color: #2e3856;
        }

        .avatar-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .acciones a {
            margin: 0 4px;
        }

        .ver-btn {
            background-color: #444b6e;
            color: #fff;
        }

        .ver-btn:hover {
            background-color: #3a4060;
        }

        .editar-btn {
            background-color: #ffc107;
            color: #1b1f3a;
        }

        .editar-btn:hover {
            background-color: #e0a800;
        }

        .eliminar-btn {
            background-color: #dc3545;
            color: #fff;
        }

        .eliminar-btn:hover {
            background-color: #bd2130;
        }
    </style>
</head>
<body class="admin-body">

<div class="admin-container">
    <h1 class="admin-title">Panel de Administración de Usuarios</h1>

    <a href="crear_usuario.php" class="admin-btn crear-btn">➕ Crear Usuario</a>

    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Puesto</th>
                <th>Avatar</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($fila = $resultado->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $fila['Id1']; ?></td>
                    <td><?php echo $fila['username']; ?></td>
                    <td><?php echo $fila['nom_usuario']; ?></td>
                    <td><?php echo $fila['puesto']; ?></td>
                    <td><img src="<?php echo $fila['avatar']; ?>" alt="avatar" class="avatar-img"></td>
                    <td class="acciones">
                        <a href="ver_usuario.php?id=<?php echo $fila['Id1']; ?>" class="admin-btn ver-btn">👁️</a>
                        <a href="editar_usuario.php?id=<?php echo $fila['Id1']; ?>" class="admin-btn editar-btn">✏️</a>
                        <a href="eliminar_usuario.php?id=<?php echo $fila['Id1']; ?>" class="admin-btn eliminar-btn" onclick="return confirm('¿Deseas eliminar este usuario?');">🗑️</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
