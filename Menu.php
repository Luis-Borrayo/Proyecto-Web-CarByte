<?php
session_start();
// Verificar la conexión a la base de datos
require_once 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toyota | Venta de Autos</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/Menu.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <header class="navbar">
        <div class="logo-container">
            <img src="imagenes/logo_toyota.png" alt="Logo Toyota" class="logo-img">
            <span class="logo-text">TOYOTA</span>
        </div>
        <nav class="nav-links">
            <a href="#vehiculos">Vehículos</a>
            <a href="#sucursales">Sucursales</a>
            <a href="#accesorios">Accesorios</a>
            <a href="#contacto">Contáctanos</a>

            <div class="user-menu dropdown">
                <?php if (isset($_SESSION['username'])): ?>
                    <a class="dropdown-trigger" href="#">
                        <span class="welcome-text">Bienvenido: <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    </a>
                    <ul class="dropdown-content">
                        <li class="logmenu">
                            <a href="Web/logout.php" onclick="return confirm('¿Desea cerrar sesión?')">
                                <i class="material-icons">logout</i> Cerrar Sesión
                            </a>
                        </li>
                        <li class="logmenu">
                            <a href="perfil.php">
                                <i class="material-icons">person</i> Mi Perfil
                            </a>
                        </li>
                        <li class="logmenu">
                            <a href="mis_pedidos.php">
                                <i class="material-icons">shopping_cart</i> Mis Pedidos
                            </a>
                        </li>
                    </ul>
                <?php else: ?>
                    <a class="dropdown-trigger" href="#">
                        <i class="material-icons">account_circle</i> Usuario
                    </a>
                    <ul class="dropdown-content">
                    <li class="logmenu">
                        <a href="Web/login.php">
                            <i class="material-icons"><button>login</button></i> Iniciar Sesión
                        </a>
                    </li>
                        <li class="logmenu">
                            <a href="registro.php">
                                <i class="material-icons">person_add</i> Registrarse
                            </a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <main>
        <section id="vehiculos">
            <h1>Catálogo de Vehículos</h1>
            <div class="catalogo">
                <div class="vehiculo">
                    <img src="imagenes/auto1.jpg" alt="Auto 1" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Modelo Toyota 2025</h3>
                        <div class="vehiculo-botones">
                            <button onclick="verDetalles(1)">Ver detalles</button>
                            <button onclick="agregarAlCarrito(1)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                </div>
        </section>

        <section id="contacto">
            <h1>Contáctanos</h1>
            <form class="form-contacto" method="post" action="procesar_contacto.php">
                <div class="form-group">
                    <label for="usuario">Nombre de Usuario</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>
                <div class="form-group">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" id="correo" name="correo" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" required>
                </div>
                <div class="form-group">
                    <label for="asunto">Asunto</label>
                    <input type="text" id="asunto" name="asunto" required>
                </div>
                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn-enviar">Enviar</button>
            </form>
        </section>
    </main>

    <script src="js/Menu.js"></script>
    <script>
    // Funciones JavaScript básicas para la interactividad
    function verDetalles(id) {
        // Implementar lógica para ver detalles
        alert('Ver detalles del vehículo ' + id);
    }

    function agregarAlCarrito(id) {
        // Implementar lógica para agregar al carrito
        alert('Producto agregado al carrito');
    }
    </script>
</body>
</html>