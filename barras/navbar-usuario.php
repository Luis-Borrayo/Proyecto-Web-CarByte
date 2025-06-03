<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbyte | Distribuidor de Autos</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/Menu.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/ingreso.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            margin-top: 110px;
            }
            .logo-text {
        font-size: 2rem;
        font-weight: bold;
        color: #ffffff;
}
    </style>

</head>
<body>
    <header class="navbar">
        <div class="logo-container">
            <img src="../imagenes/CarByte.png" alt="Logo CarByte" class="logo-img">
            <span class="logo-text">CarByte</span>
        </div>
        <nav class="nav-links">
            <a href="./index.php">Inicio</a>
            <a href="Mision.php">Mision</a>
            <a href="Vision.php">Vision</a>
            <a href="accesorios.php">Productos</a>

            <div class="user-menu dropdown">
                <?php if (isset($_SESSION['username'])): ?>
                    <a class="dropdown-trigger" href="#">
                        <span class="welcome-text">Bienvenido: <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    </a>
                    <ul class="dropdown-content">
                        <li class="logmenu">
                            <a href="perfil.php">
                                <i class="material-icons">person</i> Mi Perfil
                            </a>
                        </li>
                        <li class="logmenu">
                            <a href="crudWeb/logout.php" onclick="return confirm('¿Desea cerrar sesión?')">
                                <i class="material-icons">logout</i> Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </nav>
    </header>