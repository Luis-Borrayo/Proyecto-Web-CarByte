<?php
$host = 'localhost';
$nom = 'root';
$pass = '';
$bd = 'uspg';

$connec = mysqli_connect($host, $nom, $pass, $bd);

if (!$connec) {
    die("Error de conexión con la base de datos: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = mysqli_real_escape_string($connec, $_POST['usuario']);
    $correo = mysqli_real_escape_string($connec, $_POST['correo']);
    $telefono = mysqli_real_escape_string($connec, $_POST['telefono']);
    $asunto = mysqli_real_escape_string($connec, $_POST['asunto']);
    $mensaje = mysqli_real_escape_string($connec, $_POST['mensaje']);

    $sql = "INSERT INTO contacto (nombre_completo, correo, telefono, asunto, mensaje)
            VALUES ('$usuario', '$correo', '$telefono', '$asunto', '$mensaje')";

    if (mysqli_query($connec, $sql)) {
        echo "<script>alert('Mensaje enviado correctamente.');</script>";
    } else {
        echo "<script>alert('Error al enviar el mensaje.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Toyota | Venta de Autos</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>

<div class="container">
    <!-- Lado izquierdo -->
    <div class="contact-info">
     <h2 style="text-align: center;">Contáctanos</h2>
      <div class="info-item">
        <i class="fas fa-clock"></i>
        <div>
          <strong>Horario de apertura</strong><br>
          Lunes - Viernes, 8:00 - 9:00
        </div>
      </div>
      <div class="info-item">
        <i class="fas fa-phone"></i>
        <div>
          <strong>Llàmanos</strong><br>
          +012 345 6789
        </div>
      </div>
      <div class="info-item">
        <i class="fas fa-envelope"></i>
        <div>
          <strong>Envíenos un correo electrónico</strong><br>
          info@ejemplo.com
        </div>
      </div>
    </div>
    
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
            <a href="usuario.php">Usuario</a>
            <a href="./logout.php" onclick="return confirm('¿Desea cerrar sesión?')">Cerrar sesión</a>
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
                            <button>Ver detalles</button>
                            <button>Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="vehiculo">
                    <img src="imagenes/auto2.jpg" alt="Auto 2" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Modelo Toyota 2024</h3>
                        <div class="vehiculo-botones">
                            <button>Ver detalles</button>
                            <button>Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="vehiculo">
                    <img src="imagenes/auto3.jpg" alt="Auto 3" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Modelo Toyota 2024</h3>
                        <div class="vehiculo-botones">
                            <button>Ver detalles</button>
                            <button>Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="sucursales">
            <h1>Sucursales</h1>
            <div class="sucursales-container">
                <div class="sucursal">
                    <img src="imagenes/mapa_sucursales.jpg" alt="Mapa Sucursales" class="mapa-sucursales">
                    <div class="info-sucursal">
                        <h3>Sucursal Central</h3>
                        <p>Dirección: Calle Ficticia 123, Ciudad X</p>
                        <p>Teléfono: (123) 456-7890</p>
                    </div>
                </div>
                <div class="sucursal">
                    <img src="imagenes/mapa_sucursales.jpg" alt="Mapa Sucursales" class="mapa-sucursales">
                    <div class="info-sucursal">
                        <h3>Sucursal Norte</h3>
                        <p>Dirección: Avenida Imaginary 45, Ciudad Y</p>
                        <p>Teléfono: (987) 654-3210</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="accesorios">
            <h1>Accesorios</h1>
            <div class="accesorios-container">
                <div class="accesorio-card">
                    <img src="imagenes/accesorio1.jpg" alt="Accesorio 1">
                    <div class="accesorio-info">
                        <h3>Rines Deportivos</h3>
                        <p>Personaliza tu auto con estilo y resistencia.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio2.jpg" alt="Accesorio 2">
                    <div class="accesorio-info">
                        <h3>Tapicería Premium</h3>
                        <p>Mejora el confort y la elegancia interior.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
            </div>
        </section>

        <section id="contacto">
            <h1>Contáctanos</h1>
            <form class="form-contacto" method="post" action="#">
                <div class="form-group">
                    <label for="usuario">Nombre_Completo</label>
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

</body>
</html>
