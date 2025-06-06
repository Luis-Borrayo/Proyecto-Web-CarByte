<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
            <img src="/Proyecto-Web-CarByte/imagenes/CarByte.png" alt="Logo Toyota" class="logo-img">
            <span class="logo-text">CarByte</span>
        </div>
        <nav class="nav-links">
            <a href="./index.php" class="navbarlinka">Inicio</a>
            <a href="Mision.php" class="navbarlinka">Mision</a>
            <a href="Vision.php" class="navbarlinka">Vision</a>
            <a href="accesorios.php" class="navbarlinka">Productos</a>
            <a href="contacto.php" class="navbarlinka">Contacto</a>
            <a href="./citas.php" class="navbarlinka">Citas</a>

            <div class="user-menu dropdown">
                <?php if (isset($_SESSION['username'])): ?>
                    <a class="dropdown-trigger" href="#">
                        <span class="welcome-text">Bienvenido: <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    </a>
                    <ul class="dropdown-content">
                        <li class="logmenu">
                            <a href="/Proyecto-Web-CarByte/crudWeb/logout.php" onclick="return confirm('¿Desea cerrar sesión?')">
                                <i class="material-icons">logout</i> Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </nav>
    </header>