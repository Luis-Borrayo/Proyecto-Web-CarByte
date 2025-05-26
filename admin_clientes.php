<?php
include 'conexion.php';

// Parámetros de búsqueda y paginación
$busqueda = isset($_GET['buscar']) ? $_GET['buscar'] : '';
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$por_pagina = 10;
$inicio = ($pagina - 1) * $por_pagina;

// Filtro de búsqueda
$filtro = $busqueda ? "WHERE username LIKE '%$busqueda%' OR nom_usuario LIKE '%$busqueda%'" : "";

// Total de registros
$total_query = "SELECT COUNT(*) as total FROM clientes $filtro";
$total_result = $connec->query($total_query);
$total = $total_result->fetch_assoc()['total'];
$total_paginas = ceil($total / $por_pagina);

// Consulta paginada
$sql = "SELECT * FROM clientes $filtro LIMIT $inicio, $por_pagina";
$resultado = $connec->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administración de Clientes</title>
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

        .search-form {
            margin-bottom: 20px;
            text-align: center;
        }

        .search-form input[type="text"] {
            padding: 8px;
            border-radius: 6px;
            border: none;
            width: 250px;
            margin-right: 8px;
        }

        .search-form button {
            padding: 8px 16px;
            border-radius: 6px;
            background-color: #00c4cc;
            color: #1b1f3a;
            font-weight: bold;
            cursor: pointer;
        }

        .search-form button:hover {
            background-color: #00a0a7;
        }

        .paginacion {
            text-align: center;
            margin-top: 20px;
        }

        .paginacion a {
            margin: 0 5px;
            padding: 6px 12px;
            background-color: #00c4cc;
            color: #1b1f3a;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .paginacion a:hover {
            background-color: #00a0a7;
        }

        .total-registros {
            text-align: right;
            font-size: 14px;
            color: #ccc;
            margin-top: 10px;
        }
    </style>
</head>
<body class="admin-body">

<div class="admin-container">
    <h1 class="admin-title">Panel de Administración de Clientes</h1>

    <form class="search-form" method="GET" action="admin_clientes.php">
        <input type="text" name="buscar" placeholder="Buscar por usuario o nombre" value="<?php echo htmlspecialchars($busqueda); ?>">
        <button type="submit">🔍 Buscar</button>
    </form>

    <a href="crear_cliente.php" class="admin-btn crear-btn">➕ Crear Cliente</a>

    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Avatar</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($fila = $resultado->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $fila['Id']; ?></td>
                    <td><?php echo $fila['username']; ?></td>
                    <td><?php echo $fila['nom_usuario']; ?></td>
                    <td><img src="<?php echo $fila['avatar']; ?>" alt="avatar" class="avatar-img"></td>
                    <td class="acciones">
                        <a href="ver_cliente.php?id=<?php echo $fila['Id']; ?>" class="admin-btn ver-btn">👁️</a>
                        <a href="editar_cliente.php?id=<?php echo $fila['Id']; ?>" class="admin-btn editar-btn">✏️</a>
                        <a href="eliminar_cliente.php?id=<?php echo $fila['Id']; ?>" class="admin-btn eliminar-btn" onclick="return confirm('¿Deseas eliminar este cliente?');">🗑️</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="total-registros">
        Total de clientes: <?php echo $total; ?>
    </div>

    <div class="paginacion">
        <?php if ($pagina > 1) { ?>
            <a href="?pagina=<?php echo $pagina - 1; ?>&buscar=<?php echo urlencode($busqueda); ?>">⬅️ Anterior</a>
        <?php } ?>
        <?php if ($pagina < $total_paginas) { ?>
            <a href="?pagina=<?php echo $pagina + 1; ?>&buscar=<?php echo urlencode($busqueda); ?>">Siguiente ➡️</a>
        <?php } ?>
    </div>
</div>

</body>
</html>
