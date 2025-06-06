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
                <label class="titulo-Vehiculo">Catálogo de Vehículos</label>
            </div>
            <div class="catalogo">

                <div class="vehiculo">
                <div class="vehiculo-contenido">
                    <img src="imagenes/auto1.jpg" alt="Auto 1" class="vehiculo-img">
                    <div class="vehiculo-info">
                    <h3>Modelo Toyota 2025</h3>
                    <div class="vehiculo-botones">
                        <button class="btn-detalles">Ver detalles</button>
                        <a href="citas.php">Agendar cita</a>
                    </div>
                    </div>
                </div>
                <div class="detalle-popup">
                    Vehículo confiable, ideal para quienes buscan eficiencia y durabilidad. 
                    Motor de bajo consumo y excelente rendimiento urbano, perfecto para el tráfico de la Ciudad de Guatemala.
                    Precio estimado: Q189,000.
                </div>
                </div>


                <div class="vehiculo">
                <div class="vehiculo-contenido">
                    <img src="imagenes/auto2.jpg" alt="Auto 2" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Modelo Toyota 2024</h3>
                        <div class="vehiculo-botones">
                             <button class="btn-detalles">Ver detalles</button>
                            <a href="citas.php">Agendar cita</a>
                        </div>
                    </div>
                </div>
                  <div class="detalle-popup">
                    Un sedán moderno con enfoque en seguridad y estabilidad. Incluye frenos ABS, cámara trasera y sensores de proximidad. Opción ideal para familias guatemaltecas.
                    Precio estimado: Q175,000
                </div>
                </div>

                <div class="vehiculo">
                <div class="vehiculo-contenido">
                    <img src="imagenes/auto3.jpg" alt="Auto 3" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Modelo Toyota 2024</h3>
                        <div class="vehiculo-botones">
                             <button class="btn-detalles">Ver detalles</button>
                            <a href="citas.php">Agendar cita</a>
                        </div>
                    </div>
                </div> 
                  <div class="detalle-popup">
                    Compacto pero espacioso, ofrece comodidad y tecnología accesible. Equipado con conectividad Bluetooth y asistencia de conducción. Excelente opción para jóvenes profesionales.
                    Precio estimado: Q172,000                
                </div>
                </div>
                <div class="vehiculo">
                <div class="vehiculo-contenido">
                    <img src="imagenes/auto4.jpg" alt="Auto 4" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Honda Civic 2023</h3>
                        <div class="vehiculo-botones">
                             <button class="btn-detalles">Ver detalles</button>
                            <a href="citas.php">Agendar cita</a>
                        </div>
                    </div>
                </div>
                  <div class="detalle-popup">
                    Elegante, aerodinámico y con gran eficiencia de combustible. Muy buscado por su balance entre rendimiento y diseño. Popular en zonas urbanas como Mixco o la zona 10.
                    Precio estimado: Q165,000
                </div>
                </div>

                <div class="vehiculo">
                <div class="vehiculo-contenido">
                    <img src="imagenes/auto5.jpg" alt="Auto 5" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Ford Mustang 2022</h3>
                        <div class="vehiculo-botones">
                             <button class="btn-detalles">Ver detalles</button>
                            <a href="citas.php">Agendar cita</a>
                        </div>
                    </div>
                </div>
                  <div class="detalle-popup">
                    Potencia americana con diseño deportivo. Motor V8, ideal para quienes buscan adrenalina y presencia en carretera. No pasa desapercibido en ningún lugar de Guatemala.
                    Precio estimado: Q315,000
                </div>
                </div>

                <div class="vehiculo">
                <div class="vehiculo-contenido">
                    <img src="imagenes/auto6.jpg" alt="Auto 6" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Chevrolet Camaro 2024</h3>
                        <div class="vehiculo-botones">
                            <button class="btn-detalles">Ver detalles</button>
                            <a href="citas.php">Agendar cita</a>
                        </div>
                    </div>
                </div>
                  <div class="detalle-popup">
                    Ícono del músculo automotriz, ahora con tecnología moderna. Tracción excelente y diseño agresivo. Apto para rutas como Carretera a El Salvador o autopista Palín.
                    Precio estimado: Q299,000
                    </div>
                    </div>

                <div class="vehiculo">
                <div class="vehiculo-contenido">
                    <img src="imagenes/auto7.jpg" alt="Auto 7" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Kia Sportage 2023</h3>
                        <div class="vehiculo-botones">
                            <button class="btn-detalles">Ver detalles</button>
                            <a href="citas.php">Agendar cita</a>
                        </div>
                    </div>
                </div>
                  <div class="detalle-popup">
                    SUV confiable, con gran espacio interior y rendimiento en carretera. Ideal para familias o para viajes a departamentos como Quetzaltenango o Petén.
                    Precio estimado: Q185,000
                    </div>
                    </div>

                <div class="vehiculo">
                <div class="vehiculo-contenido">
                    <img src="imagenes/auto8.jpg" alt="Auto 8" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Nissan Altima 2024</h3>
                        <div class="vehiculo-botones">
                            <button class="btn-detalles">Ver detalles</button>
                            <a href="citas.php">Agendar cita</a>
                        </div>
                    </div>
                </div>
                  <div class="detalle-popup">
                    Sedán ejecutivo con diseño moderno y excelente suspensión. Perfecto para ejecutivos que viajan entre zonas céntricas y periféricas.
                    Precio estimado: Q195,000
                    </div>
                    </div>

                <div class="vehiculo">
                <div class="vehiculo-contenido">
                    <img src="imagenes/auto9.jpg" alt="Auto 9" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Hyundai Elantra 2025</h3>
                        <div class="vehiculo-botones">
                            <button class="btn-detalles">Ver detalles</button>
                            <a href="citas.php">Agendar cita</a>
                        </div>
                    </div>
                        </div>
                        <div class="detalle-popup">
                    Moderno, eficiente y accesible. Cuenta con pantalla táctil y control de estabilidad. Muy buscado por su relación calidad/precio.
                    Precio estimado: Q178,000
                    </div>
                    </div>

                <div class="vehiculo">
                <div class="vehiculo-contenido">
                    <img src="imagenes/auto10.jpg" alt="Auto 10" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>BMW Serie 3 2023</h3>
                        <div class="vehiculo-botones">
                            <button class="btn-detalles">Ver detalles</button>
                            <a href="citas.php">Agendar cita</a>
                        </div>
                    </div>
                </div>
                  <div class="detalle-popup">
                    Lujo alemán con tecnología de punta. Motor turbo, interiores premium y conducción suave. Ideal para empresarios o profesionales de alto perfil.
                    Precio estimado: Q365,000
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
<script>
  document.querySelectorAll('.btn-detalles').forEach(btn => {
    btn.addEventListener('click', () => {
      const veh = btn.closest('.vehiculo');
      const popup = veh.querySelector('.detalle-popup');

      document.querySelectorAll('.detalle-popup.mostrar')
        .forEach(p => { if(p!==popup) p.classList.remove('mostrar'); });

      popup.classList.toggle('mostrar');
    });
  });

  document.addEventListener('click', e => {
    if (!e.target.closest('.vehiculo')) {
      document.querySelectorAll('.detalle-popup.mostrar')
              .forEach(p => p.classList.remove('mostrar'));
    }
  });
</script>
</body>
</html>