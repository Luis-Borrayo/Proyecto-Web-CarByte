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
    <main>
        <div id= "conteItemsCarrusel">
            <div class="ItemCarrusel" id="ItemCarrusel1">
            <div class="tarjetaCarrusel" id="tarjetaCarrusel1">
                <img src="./imagenes/imagenindex/Portada.png" alt="Portada" class="img-carrusel">
            </div>
            <div class="flechaCarrusel">
                <a href="#ItemCarrusel5" class="carrusel-a">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
                <a href="#ItemCarrusel2" class="carrusel-a">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
                </div>
            </div>
            <div class="ItemCarrusel" id="ItemCarrusel2">
            <div class="tarjetaCarrusel" id="tarjetaCarrusel2">
                <img src="./imagenes/imagenindex/Auto1.jpg" alt="Auto1" class="img-carrusel">
            </div>
            <div class="flechaCarrusel">
                <a href="#ItemCarrusel1" class="carrusel-a">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
                <a href="#ItemCarrusel3" class="carrusel-a">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
                </div>
            </div>
            <div class="ItemCarrusel" id="ItemCarrusel3">
            <div class="tarjetaCarrusel" id="tarjetaCarrusel3">
                <img src="./imagenes/imagenindex/Auto2.jpg" alt="Auto2" class="img-carrusel">
            </div>
            <div class="flechaCarrusel">
                <a href="#ItemCarrusel2" class="carrusel-a">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
                <a href="#ItemCarrusel4" class="carrusel-a">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
                </div>
            </div>
            <div class="ItemCarrusel" id="ItemCarrusel4">
            <div class="tarjetaCarrusel" id="tarjetaCarrusel4">
                <img src="./imagenes/imagenindex/Auto3.jpg" alt="Auto3" class="img-carrusel">
            </div>
            <div class="flechaCarrusel">
                <a href="#ItemCarrusel3" class="carrusel-a">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
                <a href="#ItemCarrusel5" class="carrusel-a">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
                </div>
            </div>
            <div class="ItemCarrusel" id="ItemCarrusel5">
            <div class="tarjetaCarrusel" id="tarjetaCarrusel5">
                <img src="./imagenes/imagenindex/Auto4.jpg" alt="Auto4" class="img-carrusel">
            </div>
            <div class="flechaCarrusel">
                <a href="#ItemCarrusel4" class="carrusel-a">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
                <a href="#ItemCarrusel1" class="carrusel-a">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
                </div>
            </div>
        </div>
        <div id="contepuntos">
            <a href="#ItemCarrusel1" class="pntcarrutcel">●</a>
            <a href="#ItemCarrusel2" class="pntcarrutcel">●</a>
            <a href="#ItemCarrusel3" class="pntcarrutcel">●</a>
            <a href="#ItemCarrusel4" class="pntcarrutcel">●</a>
            <a href="#ItemCarrusel5" class="pntcarrutcel">●</a>
        </div>
        <section id="vehiculos">
            <label class="titulo-Vehiculo">Catálogo de Vehículos</label>
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
                <!-- Popup de detalles -->
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
                <div class="accesorio-card">
                    <img src="imagenes/accesorio3.jpg" alt="Accesorio 3">
                    <div class="accesorio-info">
                        <h3>Alfombrilla</h3>
                        <p>Para cuidar el interior de vehiculo.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio4.jpg" alt="Accesorio 4">
                    <div class="accesorio-info">
                        <h3>Película Polarizada</h3>
                        <p>Protección solar y privacidad para tu vehículo.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio5.jpg" alt="Accesorio 5">
                    <div class="accesorio-info">
                        <h3>Sensores de Reversa</h3>
                        <p>Mayor seguridad al estacionarte.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio6.jpg" alt="Accesorio 6">
                    <div class="accesorio-info">
                        <h3>Sistema de Navegación GPS</h3>
                        <p>Llega a tu destino sin perderte.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio7.jpg" alt="Accesorio 7">
                    <div class="accesorio-info">
                        <h3>Portabicicletas</h3>
                        <p>Ideal para tus viajes y aventuras al aire libre.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio8.jpg" alt="Accesorio 8">
                    <div class="accesorio-info">
                        <h3>Cargador Inalámbrico</h3>
                        <p>Recarga tu celular sin cables mientras conduces.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio9.jpg" alt="Accesorio 9">
                    <div class="accesorio-info">
                        <h3>Fundas para Asientos</h3>
                        <p>Protege y renueva el interior de tu auto.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio10.jpg" alt="Accesorio 10">
                    <div class="accesorio-info">
                        <h3>Protector de Cajuela</h3>
                        <p>Mantén limpia y ordenada la cajuela de tu auto.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
                <div style="text-align: center; margin-top: 20px;">
    <a href="accesorios.php" class="btn-ver-mas">Ver más accesorios</a>
</div>

            </div>
        </section>
    </main>

    <script src="js/Menu.js"></script>
    <script>
        const navbar = document.querySelector('.navbar');
        let lastScrollTop = 0;

        window.addEventListener('scroll', function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > lastScrollTop) {
                // Scrolling down
                navbar.classList.add('navbar-hidden');
            } else {
                // Scrolling up
                navbar.classList.remove('navbar-hidden');
            }
            lastScrollTop = scrollTop;
        });
    </script>
<script>
  document.querySelectorAll('.btn-detalles').forEach(btn => {
    btn.addEventListener('click', () => {
      const veh = btn.closest('.vehiculo');
      const popup = veh.querySelector('.detalle-popup');

      // Oculta cualquier otro popup abierto
      document.querySelectorAll('.detalle-popup.mostrar')
        .forEach(p => { if(p!==popup) p.classList.remove('mostrar'); });

      // Alterna el seleccionado
      popup.classList.toggle('mostrar');
    });
  });

  // Cierra popup al hacer clic fuera
  document.addEventListener('click', e => {
    if (!e.target.closest('.vehiculo')) {
      document.querySelectorAll('.detalle-popup.mostrar')
              .forEach(p => p.classList.remove('mostrar'));
    }
  });
</script>

<script>
  const carrusel = document.getElementById('conteItemsCarrusel');
  let index = 0;

  function moverCarrusel() {
    const totalItems = carrusel.children.length;
    index = (index + 1) % totalItems; // Avanza y vuelve al inicio
    carrusel.scrollTo({
      left: carrusel.clientWidth * index,
      behavior: 'smooth'
    });
  }

  // Cambia cada 4 segundos, ajusta si quieres más rápido o lento
  setInterval(moverCarrusel, 4000);
</script>

</body>
</html>