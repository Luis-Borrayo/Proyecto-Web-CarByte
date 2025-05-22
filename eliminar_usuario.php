<?php
include 'conexion.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID de usuario no proporcionado.";
    exit;
}

$sql = "SELECT * FROM usuario WHERE Id1 = ?";
$stmt = $connec->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

if (!$usuario) {
    echo "Usuario no encontrado.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Eliminar avatar si existe físicamente
    if (!empty($usuario['avatar']) && file_exists($usuario['avatar'])) {
        unlink($usuario['avatar']);
    }

    $deleteSql = "DELETE FROM usuario WHERE Id1 = ?";
    $stmtDelete = $connec->prepare($deleteSql);
    $stmtDelete->bind_param("i", $id);
    $stmtDelete->execute();

    header("Location: admin_usuarios.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            background-color: #1b1f3a;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
        }

        .container {
            max-width: 480px;
            margin: 80px auto;
            background-color: #2e3856;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
            text-align: center;
        }

        h1 {
            color: #00c4cc;
            margin-bottom: 20px;
        }

        img {
            max-width: 120px;
            border-radius: 50%;
            margin: 15px 0;
            border: 2px solid #00c4cc;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            justify-content: space-around;
        }

        button, a {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        button {
            background-color: #ff4f4f;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #cc3a3a;
        }

        a {
            background-color: #444b6e;
            color: #fff;
        }

        a:hover {
            background-color: #3a4060;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>¿Eliminar este usuario?</h1>
        <p><strong><?= $usuario['nom_usuario'] ?></strong> (<?= $usuario['username'] ?>)</p>
        <img src="<?= $usuario['avatar'] ?>" alt="Avatar">
        <p>Esta acción no se puede deshacer.</p>
        <form method="POST">
            <button type="submit">Sí, eliminar</button>
            <a href="admin_usuarios.php">Cancelar</a>
        </form>
    </div>
</body>
</html>
