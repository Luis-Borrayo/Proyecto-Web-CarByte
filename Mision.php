<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misión | CarByte</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/Menu.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/ingreso.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
        }

        .contenido-estatico {
            margin-top: 100px;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        }

        .contenedor-flex {
            display: flex;
            gap: 40px;
            max-width: 1200px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 40px;
            width: 100%;
        }

        .contenido-texto {
            flex: 2;
        }

        .contenido-texto h1 {
            color: #c00;
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .contenido-texto p {
            font-size: 1.1em;
            line-height: 1.8;
            text-align: justify;
        }

        .imagen-mision {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .imagen-mision img {
            max-width: 100%;
            height: ;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        @media screen and (max-width: 992px) {
            .contenedor-flex {
                flex-direction: column;
                padding: 30px;
            }

            .imagen-mision {
                margin-top: 30px;
            }
        }
    </style>
</head>
<body>
    <?php include('barras/navbar-cliente.php'); ?>

    <main class="contenido-estatico">
        <div class="contenedor-flex">
            <div class="contenido-texto">
                <h1>Nuestra Misión</h1>
                <p>
                    En CarByte, nuestra misión es liderar la transformación digital del sector automotriz en Guatemala, estableciendo un nuevo estándar en la forma en que los guatemaltecos compran y venden vehículos. Somos más que una plataforma de venta de carros: somos un ecosistema digital que conecta personas, impulsa sueños y abre caminos hacia nuevas oportunidades de movilidad personal y profesional.
                </p>
                <p>
                    Nos hemos propuesto crear un espacio confiable, accesible y tecnológicamente avanzado, donde cada usuario —ya sea comprador, vendedor, concesionario o particular— pueda interactuar con plena confianza, sabiendo que encontrará transparencia, seguridad y respaldo en cada paso del proceso. En un mercado saturado de desinformación, trámites complejos y opciones poco confiables, CarByte nace con el firme propósito de ser el puente entre la necesidad y la solución, entre la intención de compra y la satisfacción plena del usuario.
                </p>
                <p>
                    Reconocemos que la movilidad es esencial para el progreso económico, la independencia personal y el desarrollo social. Por ello, nos esforzamos día a día en ofrecer un servicio que no solo facilite la compra o venta de un automóvil, sino que acompañe a cada usuario en su camino, brindando asesoría especializada, información verificada y herramientas que le permitan tomar decisiones inteligentes, basadas en datos reales y procesos simples.
                </p>
                <p class="p">
                    <label for="" class="titulos">Nuestro</label> compromiso se extiende a todo el territorio guatemalteco, desde la ciudad hasta las áreas rurales, democratizando el acceso a vehículos mediante una plataforma digital que prioriza la inclusión, la facilidad de uso y la optimización del tiempo y los recursos. Creemos firmemente en el poder de la tecnología para transformar realidades, y por eso invertimos constantemente en innovación, desarrollo de software, inteligencia de mercado y atención al cliente multicanal.
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
                <p class = "body">Wesly y Stephanie por siempre</p>
                <a href="" class="btn-ver-mas">Wesly</a>
            </div>
            <div class="imagen-mision">
                <!-- Puedes cambiar esta imagen por una tuya -->
                <img src="imagenes/mision.jpg" alt="Nuestra Misión en CarByte">
            </div>
        </div>
    </main>

    <script src="js/Menu.js"></script>
</body>
</html>
