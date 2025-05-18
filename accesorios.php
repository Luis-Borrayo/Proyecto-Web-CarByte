<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Accesorios</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/Menu.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/ingreso.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7339621b21.js" crossorigin="anonymous"></script>
</head>
  <style>
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color:rgb(29, 0, 215);
      color: white;
      padding: 10px 30px;
    }

    .navbar .logo {
      display: flex;
      align-items: center;
    }

    .navbar .logo img {
      height: 40px;
      margin-right: 10px;
    }

    .navbar nav a {
      margin-left: 20px;
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    .navbar nav a.activo {
      text-decoration: underline;
    }

    .contenedor-accesorios {
      max-width: 1200px;
      margin: auto;
      padding: 40px 20px;
      text-align: center;
    }

    .contenedor-accesorios h2 {
      margin-bottom: 30px;
      font-size: 2rem;
    }

    .grid-accesorios {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
      gap: 20px;
    }

    .card-accesorio {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      padding: 20px;
      transition: transform 0.2s ease;
    }

    .card-accesorio:hover {
      transform: translateY(-5px);
    }

    .card-accesorio img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
    }

    .card-accesorio h3 {
      font-size: 1.1rem;
      margin: 15px 0 10px;
    }

    .card-accesorio p {
      font-size: 0.95rem;
      color: #444;
      margin-bottom: 15px;
    }

    .card-accesorio button {
      background-color:rgb(0, 0, 0);
      color: #fff;
      border: none;
      padding: 10px 15px;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    .card-accesorio button:hover {
      background-color: #a00000;
    }

    .footer {
      background-color: #f2f2f2;
      padding: 20px;
      text-align: center;
      color: #333;
      font-size: 0.9rem;
      margin-top: 40px;
    }
  </style>
</head>
<body class="body-index">
<?php include('barras/navbar-cliente.php')?>
    <?php ?>
        <div class="space"></div>
  <main class="contenedor-accesorios">
    
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

      <div  class="accesorio-card">
        <img src="imagenes/accesorio11.jpg" alt="Accesorio 11">
        <div class="accesorio-info">
        <h3>Deflectores de Viento</h3>
        <p>Circulación de aire sin entrada de agua o polvo.</p>
        <button>Agregar al carrito</button>
          </div>
      </div>

      <div  class="accesorio-card">
        <img src="imagenes/accesorio12.jpg" alt="Accesorio 12">
        <div class="accesorio-info">
        <h3>Sistema de Alarma</h3>
        <p>Protege tu vehículo contra robos.</p>
        <button>Agregar al carrito</button>
          </div>
      </div>

      <div  class="accesorio-card">
        <img src="imagenes/accesorio13.jpg" alt="Accesorio 13">
        <div class="accesorio-info">
        <h3>Rastreador Satelital</h3>
        <p>Ubica tu auto en tiempo real en caso de emergencia.</p>
        <button>Agregar al carrito</button>
          </div>
      </div>

      <div  class="accesorio-card">
        <img src="imagenes/accesorio14.jpg" alt="Accesorio 14">
        <div class="accesorio-info">
        <h3>Kit de Seguridad</h3>
        <p>Incluye extintor, triángulo y botiquín básico.</p>
        <button>Agregar al carrito</button>
          </div>
      </div>

      <div  class="accesorio-card">
        <img src="imagenes/accesorio15.jpg" alt="Accesorio 15">
        <div class="accesorio-info">
        <h3>Luces LED Personalizadas</h3>
        <p>Ilumina con estilo el interior o exterior del auto.</p>
        <button>Agregar al carrito</button>
          </div>
      </div>

    </div>
  </main>

  <footer class="footer">
    <p>&copy; 2025 CarByte Guatemala - Todos los derechos reservados</p>
  </footer>
</body>
</html>
