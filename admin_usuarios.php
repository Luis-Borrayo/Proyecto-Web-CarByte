<?php
include 'conexion.php';
$consulta = "SELECT * FROM usuario";
$resultado = $conexion->query($consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Usuarios</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="contenedor-admin">
        <h1>Administrar Usuarios</h1>
        <a class="boton crear" href="crear_usuario.php">Crear nuevo usuario</a>
        <table class="tabla-usuarios">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($fila = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?= $fila['Id1'] ?></td>
                    <td><?= $fila['username'] ?></td>
                    <td><?= $fila['nom_usuario'] ?></td>
                    <td><?= $fila['puesto'] ?></td>
                    <td>
                        <a class="boton ver" href="ver_usuario.php?id=<?= $fila['Id1'] ?>">Ver</a>
                        <a class="boton editar" href="editar_usuario.php?id=<?= $fila['Id1'] ?>">Editar</a>
                        <a class="boton eliminar" href="eliminar_usuario.php?id=<?= $fila['Id1'] ?>" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
