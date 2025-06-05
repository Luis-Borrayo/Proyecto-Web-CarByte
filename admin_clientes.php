<?php
ob_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuarioingresando'])) {
    header("Location: login.php");
    exit();
}

require_once 'conexion.php';

$limit = 10;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$buscar = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';
$search_condition = '';
$params = [];
$types = '';

if (!empty($buscar)) {
    $search_condition = "WHERE username LIKE ? OR nom_usuario LIKE ?";
    $search_term = "%$buscar%";
    $params = array_fill(0, 2, $search_term);
    $types = str_repeat('s', count($params));
}

$count_query = "SELECT COUNT(*) as total FROM clientes $search_condition";
$stmt_count = $connec->prepare($count_query);
if (!empty($params)) {
    $stmt_count->bind_param($types, ...$params);
}
$stmt_count->execute();
$total_result = $stmt_count->get_result();
$total_clientes = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_clientes / $limit);
$stmt_count->close();

$query = "SELECT * FROM clientes $search_condition LIMIT ? OFFSET ?";
$params[] = $limit;
$params[] = $offset;
$types .= 'ii';

$stmt = $connec->prepare($query);
$stmt->bind_param($types, ...$params);
$stmt->execute();
$resultado = $stmt->get_result();

$clientes = [];
while ($fila = $resultado->fetch_assoc()) {
    $clientes[] = $fila;
}

$stmt->close();

ob_end_clean();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Clientes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body.admin-body {
            background-color: #1b1f3a;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            opacity: 0;
            transition: opacity 0.5s ease;
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
            opacity: 0;
            transition: opacity 0.3s;
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
            border: none;
            transition: background-color 0.3s;
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
            transition: background-color 0.3s;
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

        .loaded {
            opacity: 1 !important;
        }
        .avatar-loaded {
            opacity: 1 !important;
        }
    </style>
</head>
<body class="admin-body">
    <?php include('barras/navbar-usuario.php'); ?>
    <?php include('barras/sidebar-usuario.php'); ?>
    
    <div class="admin-container">
        <h1 class="admin-title">Panel de Administración de Clientes</h1>

        <form class="search-form" method="GET" action="admin_clientes.php">
            <input type="text" name="buscar" placeholder="Buscar por usuario o nombre" 
                   value="<?php echo htmlspecialchars($buscar ?? ''); ?>">
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
                <?php foreach ($clientes as $fila): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($fila['Id'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($fila['username'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($fila['nom_usuario'] ?? ''); ?></td>
                        <td>
                            <img src="<?php echo htmlspecialchars($fila['avatar'] ?? 'avatars/default-avatar.png'); ?>" 
                                 alt="Avatar" class="avatar-img"
                                 loading="lazy"
                                 onload="this.classList.add('avatar-loaded')"
                                 onerror="this.src='avatars/default-avatar.png';this.onerror=null;">
                        </td>
                        <td class="acciones">
                            <a href="ver_cliente.php?id=<?php echo $fila['Id'] ?? ''; ?>" class="admin-btn ver-btn">👁️</a>
                            <a href="editar_cliente.php?id=<?php echo $fila['Id'] ?? ''; ?>" class="admin-btn editar-btn">✏️</a>
                            <a href="eliminar_cliente.php?id=<?php echo $fila['Id'] ?? ''; ?>" class="admin-btn eliminar-btn" 
                               onclick="return confirm('¿Deseas eliminar este cliente?');">🗑️</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="total-registros">
            Total de clientes: <?php echo $total_clientes; ?>
        </div>

        <div class="paginacion">
            <?php if ($page > 1): ?>
                <a href="admin_clientes.php?page=<?php echo $page - 1; ?>&buscar=<?php echo urlencode($buscar ?? ''); ?>">⬅️ Anterior</a>
            <?php endif; ?>
            
            <?php if ($page < $total_pages): ?>
                <a href="admin_clientes.php?page=<?php echo $page + 1; ?>&buscar=<?php echo urlencode($buscar ?? ''); ?>">Siguiente ➡️</a>
            <?php endif; ?>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.body.classList.add('loaded');
        
        const avatarImages = document.querySelectorAll('.avatar-img');
        avatarImages.forEach(img => {
            const tempImg = new Image();
            tempImg.src = img.src;
            tempImg.onload = function() {
                img.classList.add('avatar-loaded');
            };
            tempImg.onerror = function() {
                img.src = 'avatars/default-avatar.png';
                img.classList.add('avatar-loaded');
            };
        });
    });
    </script>
</body>
</html>