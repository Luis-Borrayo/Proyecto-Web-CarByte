<?php
session_start();

$tipo = $_SESSION['tipo_usuario'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Visión - CarByte</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/Menu.css" />
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to bottom right,rgb(15, 55, 95),rgb(12, 53, 107));
      margin: 0;
      padding: 0;
    }

    main {
      display: flex;
      justify-content: center;
      padding: 60px 20px;
    }

    .contenedor-flex {
      display: flex;
      flex-wrap: wrap;
      background-color:rgb(100, 152, 161);
      border-radius: 30px;
      box-shadow:  0 4px 15px rgb(0, 0, 0);
      max-width: 1100px;
      width: 100%;
      overflow: hidden;
    }

    .contenido-texto {
      flex: 1;
      padding: 40px;
      background-color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .titulo-vision {
      font-size: 2em;
      text-align: center;
      color: #1a1a1a;
      margin-bottom: 30px;
    }

    .burbuja-contenido {
      background: linear-gradient(to bottom right,rgb(143, 176, 208),rgb(48, 81, 124));
      border-radius: 20px;
      padding: 25px 30px;
      box-shadow: 0 8px 18px rgba(0, 0, 0, 0.05);
    }

    .burbuja-contenido p {
      font-size: 1.05em;
      line-height: 1.8;
      color: #444;
      margin-bottom: 20px;
    }

    .btn-aprende-mas {
      display: block;
      background-color: #ff6b00;
      color: white;
      text-decoration: none;
      padding: 14px 28px;
      border-radius: 50px;
      font-weight: bold;
      width: fit-content;
      margin: 30px auto 0;
      transition: background-color 0.3s ease;
    }

    .btn-aprende-mas:hover {
      background-color: #e55c00;
    }

    .imagen-vision {
      flex: 1;
      min-height: 100%;
      max-height: 100%;
    }

    .imagen-vision img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    @media (max-width: 992px) {
      .contenedor-flex {
        flex-direction: column;
      }

      .imagen-vision {
        order: -1;
        height: 250px;
      }

      .imagen-vision img {
        border-radius: 0 0 20px 20px;
      }
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
  <main>
    <div class="contenedor-flex">
      <div class="contenido-texto">
        <h2 class="titulo-vision">Nuestra Visión</h2>
        <div class="burbuja-contenido">
          <p>Nuestra visión en CarByte es convertirnos en la plataforma automotriz digital más reconocida, confiable e innovadora de Guatemala y Centroamérica, siendo un referente regional en la transformación de la experiencia de compra, venta y gestión de vehículos.</p>
          <p>Visualizamos un futuro donde cada persona en el país pueda acceder, desde cualquier lugar y dispositivo, a un ecosistema completo de soluciones automotrices.</p>
          <p>Buscamos evolucionar constantemente para anticipar las necesidades de un mercado que está en transformación.</p>
          <p>Nos proyectamos como una empresa que impulsa el desarrollo económico nacional, promoviendo la formalización del sector automotriz.</p>
          <p>A nivel tecnológico, nuestra visión incluye el desarrollo de herramientas inteligentes basadas en inteligencia artificial y análisis de datos.</p>
          <p>Nos imaginamos como una marca reconocida por su compromiso con la ética, la innovación continua y la experiencia del usuario.</p>
          <p>En nuestra visión también hay un espacio importante para la sostenibilidad y la educación en movilidad segura.</p>
          <p>En resumen, la visión de CarByte es clara: ser líderes en innovación automotriz digital en Guatemala, crear impacto positivo y construir el futuro de la movilidad con pasión, tecnología y propósito.</p>

          <a href="#" class="btn-aprende-mas">Aprende más</a>
        </div>
      </div>
      <div class="imagen-vision">
        <img src="imagenes/imagenindex/Vision_imagen.jpg" alt="Imagen de visión CarByte">
      </div>
    </div>
  </main>

  <script src="js/Menu.js"></script>
</body>
</html>
