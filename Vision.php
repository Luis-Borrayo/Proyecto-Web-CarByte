<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Visión - CarByte</title>
  <link rel="stylesheet" href="estilos.css">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
    }

    .contenido-vision {
      margin-top: 120px; /* Desplaza el contenido para que no lo tape el header */
      padding: 40px;
      max-width: 1200px;
      margin-left: auto;
      margin-right: auto;
      display: flex;
      align-items: flex-start;
      gap: 40px;
      background-color: #ffffff;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      border-radius: 12px;
    }

    .texto-vision {
      flex: 1.5;
    }

    .texto-vision h1 {
      font-size: 36px;
      color: #007BFF;
      margin-bottom: 20px;
    }

    .texto-vision p {
      font-size: 18px;
      line-height: 1.7;
      color: #444;
      margin-bottom: 16px;
    }

    .imagen-vision {
      flex: 1.2;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .imagen-vision img {
      width: 100%;
      max-width: 500px;
      height: auto;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 992px) {
      .contenido-vision {
        flex-direction: column;
        padding: 20px;
      }
      .imagen-vision {
        order: -1;
      }
    }
  </style>
</head>
<body>

  <?php include('barras/navbar-cliente.php'); ?>

  <div class="contenido-vision">
    <div class="texto-vision">
      <h1>Nuestra Visión</h1>
      <p>Nuestra visión en CarByte es convertirnos en la plataforma automotriz digital más reconocida, confiable e innovadora de Guatemala y Centroamérica, siendo un referente regional en la transformación de la experiencia de compra, venta y gestión de vehículos. Aspiramos a liderar un cambio cultural en la forma en que los guatemaltecos se relacionan con la movilidad, pasando de modelos tradicionales a experiencias digitales ágiles, transparentes y centradas en el usuario.</p>
      <p>Visualizamos un futuro donde cada persona en el país pueda acceder, desde cualquier lugar y dispositivo, a un ecosistema completo de soluciones automotrices. Desde encontrar el vehículo ideal, obtener opciones de financiamiento adaptadas a su realidad, contratar seguros personalizados, hasta agendar servicios mecánicos, todo a través de una única plataforma digital integral: CarByte.</p>
      <p>Buscamos evolucionar constantemente para anticipar las necesidades de un mercado que está en transformación. Con el avance de la tecnología, los cambios en los hábitos de consumo y la creciente importancia de la movilidad sustentable, nuestra visión se expande más allá de la compraventa de autos. Queremos ser parte activa de un país más conectado, más eficiente y más consciente del impacto que tienen nuestras decisiones de movilidad en la economía, el ambiente y la calidad de vida.</p>
      <p>Nos proyectamos como una empresa que impulsa el desarrollo económico nacional, promoviendo la formalización del sector automotriz, integrando a talleres, agencias, vendedores independientes, aseguradoras y entidades financieras dentro de un entorno digital justo y equitativo. En este futuro, CarByte será sinónimo de oportunidades: para emprendedores que deseen ofrecer vehículos o servicios, para familias que buscan su primer carro, para empresas que necesitan flotas eficientes, y para jóvenes que sueñan con su independencia.</p>
      <p>A nivel tecnológico, nuestra visión incluye el desarrollo de herramientas inteligentes basadas en inteligencia artificial y análisis de datos que permitan recomendar vehículos según estilos de vida, comparar precios en tiempo real, verificar historiales con trazabilidad segura, y ofrecer asistencia automatizada con atención humana cuando realmente importa.</p>
      <p>Nos imaginamos como una marca reconocida por su compromiso con la ética, la innovación continua y la experiencia del usuario. Una marca cercana, moderna, útil y confiable. Queremos que CarByte sea la primera opción que viene a la mente cuando alguien en Guatemala piense en cambiar de carro, buscar un auto usado, conocer el valor de mercado de su vehículo actual o simplemente explorar opciones de movilidad para el futuro.</p>
      <p>En nuestra visión también hay un espacio importante para la sostenibilidad. A medida que el mundo avanza hacia tecnologías limpias, queremos ser pioneros en Guatemala promoviendo la adquisición de vehículos eléctricos, híbridos y eficientes en consumo energético. Desde ya trabajamos en alianzas con importadores y concesionarios comprometidos con un futuro más verde.</p>
      <p>De igual manera, aspiramos a contribuir al desarrollo social por medio de la educación en movilidad segura, la promoción de prácticas responsables al volante, y la difusión de contenido útil sobre trámites, mantenimiento y uso responsable del automóvil. Nuestro éxito no será solo comercial, sino también humano: medido por la cantidad de personas a las que ayudamos a avanzar en sus vidas a través de una movilidad accesible, segura y digna.</p>
      <p>En resumen, la visión de CarByte es clara: ser líderes en innovación automotriz digital en Guatemala, crear impacto positivo en la vida de nuestros usuarios y en el entorno, y construir el futuro de la movilidad con pasión, tecnología y propósito. Porque donde otros ven autos, nosotros vemos caminos, proyectos, metas y el comienzo de algo nuevo para cada uno de nuestros usuarios.</p>
    </div>
    <div class="imagen-vision">
      <img src="imagenes/vision.png" alt="Visión CarByte">
    </div>
  </div>

</body>
</html>
