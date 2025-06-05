<?php
include 'conexion.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID del cliente no proporcionado.";
    exit;
}

$sql = "SELECT * FROM clientes WHERE Id = ?";
$stmt = $connec->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$cliente = $resultado->fetch_assoc();

if (!$cliente) {
    echo "Cliente no encontrado.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sqlEliminar = "DELETE FROM clientes WHERE Id = ?";
    $stmtEliminar = $connec->prepare($sqlEliminar);
    $stmtEliminar->bind_param("i", $id);

    if ($stmtEliminar->execute()) {
        header("Location: admin_clientes.php");
        exit;
    } else {
        echo "Error al eliminar el cliente: " . $stmtEliminar->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Cliente</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            background-color: #1b1f3a;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
        }

        .form-container {
            max-width: 500px;
            margin: 80px auto;
            background-color: #2e3856;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
            text-align: center;
        }

        h1 {
            color: #00c4cc;
            margin-bottom: 25px;
        }

        .cliente-info {
            margin-bottom: 25px;
        }

        .form-buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
        }

        .form-buttons form,
        .form-buttons a {
            display: inline-block;
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
            background-color: #e74c3c;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #c0392b;
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
    <div class="form-container">
        <h1>Eliminar Cliente</h1>
        <div class="cliente-info">
            <p><strong>Usuario:</strong> <?= htmlspecialchars($cliente['username']) ?></p>
            <p><strong>Nombre:</strong> <?= htmlspecialchars($cliente['nom_usuario']) ?></p>
            <p><strong>Avatar:</strong><br>
                <img src="<?= $cliente['avatar'] ?>" alt="Avatar" style="max-width: 100px; border-radius: 8px;">
            </p>
        </div>
        <p>¿Está seguro de que desea eliminar este cliente?</p>
        <div class="form-buttons">
            <form method="POST">
                <button type="submit">Sí, eliminar</button>
            </form>
            <a href="admin_clientes.php">Cancelar</a>
        </div>
    </div>
</body>
</html>
