<?php
session_start();

$tipo = $_SESSION['tipo_usuario'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarByte | Venta de Autos</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/Menu.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/ingreso.css">
    <link rel="stylesheet" href="css/portada.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7339621b21.js" crossorigin="anonymous"></script>
</head>
<body class="body-index <?php echo ($tipo === 'cliente' || $tipo === 'usuario') ? 'con-sidebar' : ''; ?>">
    <?php 
    if ($tipo === 'cliente'){
        include('barras/navbar-cliente.php');
        include('barras/sidebar-cliente.php');
    }
    elseif ($tipo === 'usuario'){
        include('barras/navbar-usuario.php');
        include('barras/sidebar-usuario.php');
    }
    else {
        include('barras/navbar.php');
    }
    ?>
            <div class="tituloscontainer">
                <label for="" class="titlesucursales">Sucursales</label>
            </div>
            <div class="sucursales-container">
                <div class="sucursal">
                    <img src="/Proyecto-Web-CarByte/imagenes/imagenindex/republica.jpg" alt="Mapa Sucursales" class="mapa-sucursales">
                    <div class="info-sucursal">
                        <h3>CarByte La Republica</h3>
                        <p>Dirección: Zona 9 7Av 11-65</p>
                        <p>Teléfono: +502 2354-9635</p>
                    </div>
                </div>
                <div class="sucursal">
                    <img src="/Proyecto-Web-CarByte/imagenes/imagenindex/lasamericas.jpg" alt="Mapa Sucursales" class="mapa-sucursales">
                    <div class="info-sucursal">
                        <h3>CarByte Las Américas</h3>
                        <p>Dirección: Avenida las américas 21calle</p>
                        <p>Teléfono: +502 2335-8546</p>
                    </div>
                </div>
                <div class="sucursal">
                    <img src="/Proyecto-Web-CarByte/imagenes/imagenindex/santafe.jpg" alt="Mapa Sucursales" class="mapa-sucursales">
                    <div class="info-sucursal">
                        <h3>CarByte Santa Fe</h3>
                        <p>Dirección: 27 calle 10 avenida Colonia Santa Fe</p>
                        <p>Teléfono: +502 2456-5821</p>
                    </div>
                </div>
                <div class="sucursal">
                    <img src="/Proyecto-Web-CarByte/imagenes/imagenindex/cbzona10.jpg" alt="Mapa Sucursales" class="mapa-sucursales">
                    <div class="info-sucursal">
                        <h3>CarByte zona 10</h3>
                        <p>Dirección: 20 calle 15av zona 10</p>
                        <p>Teléfono: +502 2387-8925</p>
                    </div>
                </div>
                <div class="sucursal">
                    <img src="/Proyecto-Web-CarByte/imagenes/imagenindex/lasamericas.jpg" alt="Mapa Sucursales" class="mapa-sucursales">
                    <div class="info-sucursal">
                        <h3>CarByte CA Salvador</h3>
                        <p>Dirección: Km. 3.5 Carretera a El Salvador</p>
                        <p>Teléfono: +502 2356-9685</p>
                    </div>
                </div>
            </div>
<footer class="footerindex">
    <div class="footercontainer">
      <div class="footercol">
        <h4 class="footercoltitle">Contacto</h4>
        <p>info@carbyte.com.gt</p>
        <p>Lunes - Viernes, 8:00am - 4:00pm</p>
        <p>PBX: 2228-6100</p>
        <p>Whatsapp: +502 5638-9688</p>
      </div>

      <div class="footercol">
        <h4 class="footercoltitle">Agencias</h4>
        <ul>
          <li>CarByte La República</li>
          <li>CarByte Santa Fe</li>
          <li>CarByte Las Américas</li>
          <li>CarByte Zona 10</li>
          <li>CarByte CA Salvador</li>
        </ul>
      </div>

      <div class="footercol">
        <h4 class="footercoltitle">&copy; 2025 CarByte Guatemala</h4>
        <p>Derechos Reservados</p>
        <img src="/Proyecto-Web-CarByte/imagenes/CarByte.png" alt="Logo Toyota" class="footerlogo">
      </div>
    </div>
  </footer>
</body>
</html>