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
<body class="body-index">
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
          <label class="titlesucursales">Accesorios</label>
        </div>
            <div class="accesorios-container">
                <div class="accesorio-card">
                    <img src="imagenes/accesorio1.jpg" alt="Accesorio 1">
                    <div class="accesorio-info">
                        <h3>Rines Deportivos</h3>
                        <p>Personaliza tu auto con estilo y resistencia.</p>
                        <a href="citas.php">Agendar cita</a>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio2.jpg" alt="Accesorio 2">
                    <div class="accesorio-info">
                        <h3>Tapicería Premium</h3>
                        <p>Mejora el confort y la elegancia interior.</p>
                        <a href="citas.php">Agendar cita</a>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio3.jpg" alt="Accesorio 3">
                    <div class="accesorio-info">
                        <h3>Alfombrilla</h3>
                        <p>Para cuidar el interior de vehiculo.</p>
                        <a href="citas.php">Agendar cita</a>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio4.jpg" alt="Accesorio 4">
                    <div class="accesorio-info">
                        <h3>Película Polarizada</h3>
                        <p>Protección solar y privacidad para tu vehículo.</p>
                        <a href="citas.php">Agendar cita</a>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio5.jpg" alt="Accesorio 5">
                    <div class="accesorio-info">
                        <h3>Sensores de Reversa</h3>
                        <p>Mayor seguridad al estacionarte.</p>
                        <a href="citas.php">Agendar cita</a>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio6.jpg" alt="Accesorio 6">
                    <div class="accesorio-info">
                        <h3>Sistema de Navegación GPS</h3>
                        <p>Llega a tu destino sin perderte.</p>
                        <a href="citas.php">Agendar cita</a>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio7.jpg" alt="Accesorio 7">
                    <div class="accesorio-info">
                        <h3>Portabicicletas</h3>
                        <p>Ideal para tus viajes y aventuras al aire libre.</p>
                        <a href="citas.php">Agendar cita</a>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio8.jpg" alt="Accesorio 8">
                    <div class="accesorio-info">
                        <h3>Cargador Inalámbrico</h3>
                        <p>Recarga tu celular sin cables mientras conduces.</p>
                        <a href="citas.php">Agendar cita</a>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio9.jpg" alt="Accesorio 9">
                    <div class="accesorio-info">
                        <h3>Fundas para Asientos</h3>
                        <p>Protege y renueva el interior de tu auto.</p>
                        <a href="citas.php">Agendar cita</a>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio10.jpg" alt="Accesorio 10">
                    <div class="accesorio-info">
                        <h3>Protector de Cajuela</h3>
                        <p>Mantén limpia y ordenada la cajuela de tu auto.</p>
                        <a href="citas.php">Agendar cita</a>
                    </div>
                </div>
                <div  class="accesorio-card">
                    <img src="imagenes/accesorio11.jpg" alt="Accesorio 11">
                    <div class="accesorio-info">
                      <h3>Deflectores de Viento</h3>
                      <p>Circulación de aire sin entrada de agua o polvo.</p>
                      <a href="citas.php">Agendar cita</a>
                    </div>
                </div>
                <div  class="accesorio-card">
                    <img src="imagenes/accesorio12.jpg" alt="Accesorio 12">
                    <div class="accesorio-info">
                      <h3>Sistema de Alarma</h3>
                      <p>Protege tu vehículo contra robos.</p>
                      <a href="citas.php">Agendar cita</a>
                    </div>
                </div>
                <div  class="accesorio-card">
                  <img src="imagenes/accesorio13.jpg" alt="Accesorio 13">
                  <div class="accesorio-info">
                    <h3>Rastreador Satelital</h3>
                    <p>Ubica tu auto en tiempo real en caso de emergencia.</p>
                    <a href="citas.php">Agendar cita</a>
                    </div>
                </div>
                <div  class="accesorio-card">
                  <img src="imagenes/accesorio14.jpg" alt="Accesorio 14">
                  <div class="accesorio-info">
                    <h3>Kit de Seguridad</h3>
                    <p>Incluye extintor, triángulo y botiquín básico.</p>
                    <a href="citas.php">Agendar cita</a>
                  </div>
                </div>
                <div  class="accesorio-card">
                  <img src="imagenes/accesorio15.jpg" alt="Accesorio 15">
                  <div class="accesorio-info">
                    <h3>Luces LED Personalizadas</h3>
                    <p>Ilumina con estilo el interior o exterior del auto.</p>
                    <a href="citas.php">Agendar cita</a>
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
