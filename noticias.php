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
    <style>
        .header-noticias {
    background-color: #694516;
    color: white;
    padding: 20px;
    text-align: center;
}

.noticias-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
    max-width: 1000px;
    margin: 30px auto;
    padding: 0 15px;
}

.noticia {
    background:rgb(213, 195, 195);
    border-radius: 8px;
    overflow: hidden;
    display: flex;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.noticia:hover {
    transform: scale(1.01);
}

.noticia img {
    width: 150px;
    object-fit: cover;
}

.contenido {
    padding: 20px;
    flex: 1;
}

.contenido h2 {
    margin-top: 0;
    color: #694516;
}

.fecha {
    font-size: 0.9em;
    color: #777;
    margin-top: 10px;
}

.footer-noticias {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 15px;
    margin-top: 40px;
}

.footer-noticias i {
    margin: 0 5px;
}
    </style>
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
    <header class="header-noticias">
        <h1>Noticias CarByte Guatemala</h1>
        <p>Últimas novedades de nuestra empresa y el mundo automotriz</p>
    </header>

    <main class="noticias-container">
        <article class="noticia">
            <img src="/Proyecto-Web-CarByte/imagenes/imagenindex/ubicaciones.jpg" alt="Toyota 2024">
            <div class="contenido">
                <h2>🚗 Toyota 2024 ya disponible en CarByte</h2>
                <p>La nueva línea Toyota 2024 ha llegado a CarByte zona 10 con un diseño renovado y mejor rendimiento en combustible. ¡Ven a conocerla!</p>
                <p class="fecha">Publicado el 5 de junio de 2025</p>
            </div>
        </article>

        <article class="noticia">
            <img src="/Proyecto-Web-CarByte/imagenes/imagenindex/noticiasantafe.jpg" class="imgnoticias" alt="Sucursal Santa Fe">
            <div class="contenido">
                <h2>📍 Nueva sucursal en Santa Fe abre sus puertas</h2>
                <p>CarByte Guatemala inauguró su nueva sucursal en Santa Fe, ampliando la cobertura en la capital. Incluye showroom, taller y área de accesorios.</p>
                <p class="fecha">Publicado el 3 de junio de 2025</p>
            </div>
        </article>

        <article class="noticia">
            <img src="/Proyecto-Web-CarByte/imagenes/auto7.jpg" alt="Kia Sportage">
            <div class="contenido">
                <h2>🔥 Kia Sportage 2023: ahora con bono de Q10,000</h2>
                <p>Este mes, CarByte ofrece una promoción exclusiva: bono de Q10,000 en la compra del Kia Sportage 2023 en todas nuestras agencias.</p>
                <p class="fecha">Publicado el 2 de junio de 2025</p>
            </div>
        </article>

        <article class="noticia">
            <img src="/Proyecto-Web-CarByte/imagenes/imagenindex/equipotecnico.jpg" alt="Equipo CarByte">
            <div class="contenido">
                <h2>👨‍🔧 Reconocimiento al mejor equipo técnico</h2>
                <p>El equipo de taller de CarByte Las Américas fue galardonado como el más eficiente en atención y calidad del país en el 2025.</p>
                <p class="fecha">Publicado el 1 de junio de 2025</p>
            </div>
        </article>

        <article class="noticia">
            <img src="imagenes/auto9.jpg" alt="Hyundai Elantra">
            <div class="contenido">
                <h2>🚙 Hyundai Elantra 2025: elegancia e innovación</h2>
                <p>El nuevo Hyundai Elantra 2025 ya está en CarByte. Diseño futurista, asistencia de manejo inteligente y conectividad total.</p>
                <p class="fecha">Publicado el 31 de mayo de 2025</p>
            </div>
        </article>
    </main>
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