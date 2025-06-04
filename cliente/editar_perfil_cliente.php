<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit;
}

include('../conexion.php');

$id = $_SESSION['id'];

// Obtener datos del cliente
$sql = "SELECT username, nom_usuario FROM clientes WHERE Id = ?";
$stmt = $connec->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$cliente = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevo_username = trim($_POST['username']);
    $nuevo_nombre = trim($_POST['nom_usuario']);
    $nueva_contra = trim($_POST['password']);

    if (!empty($nueva_contra)) {
        $password_hash = password_hash($nueva_contra, PASSWORD_DEFAULT);
        $update_sql = "UPDATE clientes SET username = ?, nom_usuario = ?, password = ? WHERE Id = ?";
        $update_stmt = $connec->prepare($update_sql);
        $update_stmt->bind_param("sssi", $nuevo_username, $nuevo_nombre, $password_hash, $id);
    } else {
        $update_sql = "UPDATE clientes SET username = ?, nom_usuario = ? WHERE Id = ?";
        $update_stmt = $connec->prepare($update_sql);
        $update_stmt->bind_param("ssi", $nuevo_username, $nuevo_nombre, $id);
    }

    if ($update_stmt->execute()) {
        header("Location: editar_perfil_cliente.php?exito=1");
        exit;
    } else {
        $error = "Error al actualizar el perfil.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Perfil | CarByte</title>
    <link rel="stylesheet" href="../assets/estilos.css">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #0d1721;
            color: #fff;
        }

        .contenido {
            margin-left: 220px;
            padding: 30px;
            margin-top: 70px;
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            background-color: #1e2a38;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #fff;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #ddd;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #555;
            background-color: #2a3749;
            color: #fff;
        }

        .btn-guardar {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background-color: #06b6d4;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-guardar:hover {
            background-color: #0891b2;
        }

        .mensaje-exito, .mensaje-error {
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .mensaje-exito {
            background-color: #155724;
            color: #d4edda;
        }

        .mensaje-error {
            background-color: #721c24;
            color: #f8d7da;
        }
    </style>
</head>
<body>

<?php include('../barras/navbar-cliente.php'); ?>
<?php include('../barras/sidebar-cliente.php'); ?>

<div class="contenido">
    <div class="form-container">
        <h2>Editar Perfil</h2>

        <?php if (isset($_GET['exito'])): ?>
            <div class="mensaje-exito">Perfil actualizado correctamente.</div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <div class="mensaje-error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="username">Nombre de usuario</label>
                <input type="text" id="username" name="username" 
                    value="<?php echo htmlspecialchars($cliente['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                    required>
            </div>

            <div class="form-group">
                <label for="nom_usuario">Nombre completo</label>
                <input type="text" id="nom_usuario" name="nom_usuario" 
                    value="<?php echo htmlspecialchars($cliente['nom_usuario'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                    required>
            </div>

            <div class="form-group">
                <label for="password">Nueva contraseña (dejar vacío si no desea cambiarla)</label>
                <input type="password" id="password" name="password">
            </div>

            <button type="submit" class="btn-guardar">Guardar Cambios</button>
        </form>
    </div>
</div>

</body>
</html>
