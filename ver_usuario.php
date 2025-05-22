<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuario WHERE Id1 = $id";
    $result = mysqli_query($conn, $sql);
    $usuario = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ver Usuario</title>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Detalles del Usuario</h2>
    <div class="usuario-detalle">
        <p><strong>Nombre de Usuario:</strong> <?= $usuario['username'] ?></p>
        <p><strong>Nombre Completo:</strong> <?= $usuario['nom_usuario'] ?></p>
        <p><strong>Puesto:</strong> <?= $usuario['puesto'] ?></p>
        <p><strong>Código de Seguridad:</strong> <?= $usuario['codigo_seguridad'] ?></p>
        <p><strong>Avatar:</strong><br>
            <img src="<?= $usuario['avatar'] ?>" alt="Avatar" width="100">
        </p>
    </div>
    <a href="index.php">← Volver</a>
</body>
</html>
