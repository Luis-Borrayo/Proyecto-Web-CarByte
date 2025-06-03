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
  background: linear-gradient(to bottom right,rgb(66, 112, 153),rgb(33, 86, 146)); /* Desvanecido azul intermedio */
  margin: 0;
  padding: 0;
}


    .contenido-estatico {
      display: flex;
      justify-content: center;
      padding: 60px 20px;
    }

    .contenedor-flex {
      display: flex;
      flex-wrap: wrap;
      background-color: white;
      border-radius: 20px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      max-width: 1100px;
      overflow: hidden;
      width: 100%;
    }

    .contenido-texto {
      flex: 1;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background-color: #ffffff;
      position: relative;
    }

    .burbuja-contenido {
      background-color: #ffffff;
      border-radius: 60px 60px 60px 0;
      padding: 30px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
      position: relative;
    }

    .img-persona {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 50%;
      display: block;
      margin: 0 auto 20px;
    }

    .titulo-mision {
      text-align: center;
      font-size: 1.5em;
      color: #333;
      margin-bottom: 20px;
    }

    .burbuja-contenido p {
      font-size: 1em;
      line-height: 1.6;
      color: #555;
      text-align: center;
    }

    .btn-aprende-mas {
      display: inline-block;
      background-color: #ff6b00;
      color: white;
      text-decoration: none;
      padding: 12px 25px;
      border-radius: 30px;
      font-weight: bold;
      margin: 20px auto 0;
      text-align: center;
    }

    .creditos {
      font-size: 0.8em;
      color: #999;
      text-align: center;
      margin-top: 10px;
    }

    .imagen-mision {
      flex: 1;
      min-height: 300px;
    }

    .imagen-mision img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    @media screen and (max-width: 992px) {
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

  <main class="contenido-estatico">
    <div class="contenedor-flex">
      <div class="contenido-texto">
        <div class="burbuja-contenido">
          <h2 class="titulo-mision">Nuestra Misión</h2>
          <p>
                    En CarByte, nuestra misión es liderar la transformación digital del sector automotriz en Guatemala, estableciendo un nuevo estándar en la forma en que los guatemaltecos compran y venden vehículos. Somos más que una plataforma de venta de carros: somos un ecosistema digital que conecta personas, impulsa sueños y abre caminos hacia nuevas oportunidades de movilidad personal y profesional.
                </p>
                <p>
                    Nos hemos propuesto crear un espacio confiable, accesible y tecnológicamente avanzado, donde cada usuario —ya sea comprador, vendedor, concesionario o particular— pueda interactuar con plena confianza, sabiendo que encontrará transparencia, seguridad y respaldo en cada paso del proceso. En un mercado saturado de desinformación, trámites complejos y opciones poco confiables, CarByte nace con el firme propósito de ser el puente entre la necesidad y la solución, entre la intención de compra y la satisfacción plena del usuario.
                </p>
                <p>
                    Reconocemos que la movilidad es esencial para el progreso económico, la independencia personal y el desarrollo social. Por ello, nos esforzamos día a día en ofrecer un servicio que no solo facilite la compra o venta de un automóvil, sino que acompañe a cada usuario en su camino, brindando asesoría especializada, información verificada y herramientas que le permitan tomar decisiones inteligentes, basadas en datos reales y procesos simples.
                </p>
                <p>
                    Nuestro compromiso se extiende a todo el territorio guatemalteco, desde la ciudad hasta las áreas rurales, democratizando el acceso a vehículos mediante una plataforma digital que prioriza la inclusión, la facilidad de uso y la optimización del tiempo y los recursos. Creemos firmemente en el poder de la tecnología para transformar realidades, y por eso invertimos constantemente en innovación, desarrollo de software, inteligencia de mercado y atención al cliente multicanal.
                </p>
                <p>
                    En CarByte, fomentamos una cultura organizacional basada en los valores de honestidad, integridad, responsabilidad social, servicio al cliente, trabajo en equipo y mejora continua. Nuestro equipo humano, conformado por guatemaltecos comprometidos con el país, es el corazón de nuestra operación, y está capacitado para ofrecer un servicio profesional, empático y adaptado a las necesidades del mercado local.
                </p>
                <p>
                    Aspiramos a construir relaciones a largo plazo con nuestros usuarios, clientes y aliados estratégicos, basadas en la confianza mutua, la eficiencia de nuestros servicios y la calidad de las soluciones que brindamos. Además, promovemos prácticas comerciales sostenibles, cuidando el impacto ambiental de nuestras operaciones y fomentando el uso de vehículos eficientes y ecológicos siempre que sea posible.
                </p>
                <p>
                    Nuestra misión también contempla una visión de futuro: convertirnos en la plataforma automotriz más influyente y utilizada en Guatemala, expandiendo nuestros servicios hacia nuevas áreas como financiamiento digital, seguros personalizados, asistencia vial, y asesoría mecánica preventiva, todo desde un mismo entorno digital accesible desde cualquier dispositivo.
                </p>
                <p>
                    Porque en CarByte no solo vendemos carros, conectamos personas con su próximo destino, impulsamos historias, aceleramos cambios y trabajamos todos los días por una Guatemala más conectada, más ágil y con más oportunidades para todos.
                </p>
        </div>
      </div>
      <div class="imagen-mision">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUnyDCoad43Ora59fM7VLsiRkT8b4iCeHOEw&s" alt="Imagen de misión CarByte" />
      </div>
    </div>
  </main>

  <script src="js/Menu.js"></script>
</body>
</html>
