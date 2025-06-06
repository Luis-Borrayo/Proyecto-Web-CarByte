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


<div class="contenedor-principal">
    <div class="rutascontainerizquierda">
        <div class="imagenportada">
            <a href="ubicaciones.php" class="imagenportadalink">
                <img src="/Proyecto-Web-CarByte/imagenes/imagenindex/ubicaciones.jpg" class="imgmenu" alt="ImagenUbicaciones">
                <div class="textmenu">
                    <div><strong>Ubicaciones &gt;</strong></div>
                    <div style="font-weight: normal;">Agencias</div>
                </div>
            </a>
        </div>
        <div class="imagenportada">
            <a href="Mision.php" class="imagenportadalink">
                <img src="/Proyecto-Web-CarByte/imagenes/imagenindex/ConoceMas.jpg" class="imgmenu" alt="ImagenUbicaciones">
                <div class="textmenu">
                    <div><strong>Conoce Más &gt;</strong></div>
                    <div style="font-weight: normal;">Misión y visión</div>
                </div>
            </a>
        </div>
        <div class="imagenportada">
            <a href="catalogo-vehiculos.php" class="imagenportadalink">
                <img src="/Proyecto-Web-CarByte/imagenes/imagenindex/Contacto.jpg" class="imgmenu" alt="ImagenUbicaciones">
                <div class="textmenu">
                    <div><strong>Vehículos &gt;</strong></div>
                    <div style="font-weight: normal;">Conoce nustros modelos disponibles</div>
                </div>
            </a>
        </div>
        <div class="imagenportada">
            <a href="accesorios.php" class="imagenportadalink">
                <img src="/Proyecto-Web-CarByte/imagenes/imagenindex/accesorios.jpg" class="imgmenu" alt="ImagenUbicaciones">
                <div class="textmenu">
                    <div><strong>Nuestros Accesorios &gt;</strong></div>
                    <div style="font-weight: normal;">Herramientas y más...</div>
                </div>
            </a>
        </div>
    </div>

    <div class="rutascontainerderecha">
        <div class="videoportadaleft">
            <a href="noticias.php" class="videoportadalinkleft">
                <video class="imgmenuleft" autoplay muted loop playsinline>
                    <source src="/Proyecto-Web-CarByte/imagenes/imagenindex/Modeloportada.mp4" type="video/mp4">
                </video>
                <div class="textmenu">
                    <div><strong>Noticias &gt;</strong></div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="containercintaportada">
    <div class="textcinta"><strong>Visita nuestras redes sociales como CarByte_Guatemala</strong></div>
    <div class="iconosportada">
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-youtube"></i>
    </div>
</div>
<div >
    <img src="/Proyecto-Web-CarByte/imagenes/imagenindex/cintaportada.jpg" class="cintaportadaimg" alt="">
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


    </main>

    <script src="js/Menu.js"></script>
    <script>
        const navbar = document.querySelector('.navbar');
        let lastScrollTop = 0;

        window.addEventListener('scroll', function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > lastScrollTop) {

                navbar.classList.add('navbar-hidden');
            } else {
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

<script>
  const carrusel = document.getElementById('conteItemsCarrusel');
  let index = 0;

  function moverCarrusel() {
    const totalItems = carrusel.children.length;
    index = (index + 1) % totalItems; 
    carrusel.scrollTo({
      left: carrusel.clientWidth * index,
      behavior: 'smooth'
    });
  }

  setInterval(moverCarrusel, 4000);
</script>

</body>
</html>