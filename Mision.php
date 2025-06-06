<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Misión | CarByte</title>
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="css/Menu.css" />
  <link rel="stylesheet" href="css/modal.css" />
  <link rel="stylesheet" href="css/ingreso.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to bottom right, #3b82a0, #225986);
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
      background-color: #fff;
      border-radius: 20px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
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

    .titulo-mision {
      font-size: 2em;
      text-align: center;
      color: #1a1a1a;
      margin-bottom: 30px;
    }

    .burbuja-contenido {
      background-color: #f7f7f7;
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

    .imagen-mision {
      flex: 1;
      min-height: 100%;
      max-height: 100%;
    }

    .imagen-mision img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    @media (max-width: 992px) {
      .contenedor-flex {
        flex-direction: column;
      }

      .imagen-mision {
        order: -1;
        height: 250px;
      }

      .imagen-mision img {
        border-radius: 0 0 20px 20px;
      }
    }
  </style>
</head>
<body>
  <?php include('barras/navbar-cliente.php'); ?>

  <main>
    <div class="contenedor-flex">
      <div class="contenido-texto">
        <h2 class="titulo-mision">Nuestra Misión</h2>
        <div class="burbuja-contenido">
          <p>En CarByte, lideramos la transformación digital del sector automotriz en Guatemala, conectando personas con oportunidades de movilidad confiables y modernas.</p>
          <p>Buscamos ser más que una plataforma de venta de vehículos: creamos un ecosistema digital seguro, transparente y accesible para compradores, vendedores y concesionarios.</p>
          <p>Priorizamos la experiencia del usuario, brindando asesoría, información verificada y herramientas para tomar decisiones inteligentes.</p>
          <p>Nuestro compromiso es llegar a cada rincón del país, democratizando el acceso a vehículos mediante tecnología intuitiva y soporte humano.</p>
          <p>Creemos en la sostenibilidad, la innovación y en construir relaciones a largo plazo con nuestros usuarios y aliados estratégicos.</p>
          <p>Nos proyectamos como la plataforma automotriz más influyente de Guatemala, ofreciendo servicios integrales como financiamiento, seguros y asistencia mecánica digital.</p>
          <p>En CarByte no solo vendemos carros: conectamos destinos y aceleramos el futuro de la movilidad en nuestro país.</p>

          <a href="#" class="btn-aprende-mas">Aprende más</a>
        </div>
      </div>
      <div class="imagen-mision">
        <img src="imagenes/imagenindex/Mision_imagen.jpg" alt="Imagen de misión CarByte">
      </div>
    </div>
  </main>

  <script src="js/Menu.js"></script>
</body>
</html>
