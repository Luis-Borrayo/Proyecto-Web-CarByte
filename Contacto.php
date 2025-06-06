<?php
session_start();
include('conexion.php');

$tipo = $_SESSION['tipo_usuario'] ?? null;
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = mysqli_real_escape_string($connec, $_POST['usuario']);
    $correo = mysqli_real_escape_string($connec, $_POST['correo']);
    $telefono = mysqli_real_escape_string($connec, $_POST['telefono']);
    $asunto = mysqli_real_escape_string($connec, $_POST['asunto']);
    $mensaje = mysqli_real_escape_string($connec, $_POST['mensaje']);

    $sql = "INSERT INTO contacto (nombre_completo, correo, telefono, asunto, mensaje)
            VALUES ('$usuario', '$correo', '$telefono', '$asunto', '$mensaje')";

    if (mysqli_query($connec, $sql)) {
        echo "<script>alert('Mensaje enviado correctamente.');</script>";
    } else {
        echo "<script>alert('Error al enviar el mensaje.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carbyte | Contacto</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/contac.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="body-index <?php echo ($tipo === 'cliente' || $tipo === 'usuario') ? 'con-sidebar' : ''; ?>">
  <div class="contac-container">

    <!-- Lado izquierdo -->
    <div class="contact-info">
      <h2 style="text-align: center;">Contáctanos</h2>
      <p class="descripcontac">Llama o visitanos por nuestros medios de comunicacion o completa el formulario
        y uno de nuestros representantes se pondrá en contacto contigo lo antes posible. <br>
        Tu opinión, preguntas o sugerencias son muy importantes para nosotros.</p>
      <div class="contac-bloc">
        <div class="bloque-contac1">
        <div class="info-itemcontact">
        <i class="fas fa-clock"></i>
        <div>
          <strong>Horario de apertura</strong><br>
          Lunes - Viernes, 8:00am - 4:00pm
        </div>
      </div>
      <div class="info-itemcontact">
        <i class="fa fa-phone"></i>
        <div>
          <strong>Llàmanos</strong><br>
          PBX: 2228-6100
        </div>
      </div>
      </div>
      <div class="bloque-contac2">
        <div class="info-itemcontact">
        <i class="fa fa-envelope"></i>
        <div>
          <strong>Envíenos un correo electrónico</strong><br>
          info@carbyte.com.gt
        </div>
      </div>
      <div class="info-itemcontact">
        <i class="fab fa-whatsapp"></i>
        <div>
          <strong>WHATSAPP</strong><br>
          +502 5638-9688
        </div>
      </div>
      </div>
      </div>
      <h2 style="text-align: center;">Visítanos</h2>
    <div class="contac-bloc">
        <div class="bloque-contac1">
        <h3>CarByte La Republica</h3>
      <div class="info-sucursal">
        <p>Zona 9 7Av 11-65</p>
        <p>Teléfono: +502 2354-9635</p>
      </div>
      <h3>CarByte Las Américas</h3>
      <div class="info-sucursal">
        <p>Avenida las américas 21calle</p>
        <p>Teléfono: +502 2335-8546</p>
      </div>
      <h3>CarByte CA Salvador</h3>
      <div class="info-sucursal">
        <p>Km. 3.5 Carretera a El Salvador</p>
        <p>Teléfono: +502 2356-9685</p>
      </div>
        </div>
        <div class="bloque-contac2">
            <h3>CarByte Santa Fe</h3>
      <div class="info-sucursal">
        <p>27 calle 10 avenida Colonia Santa Fe</p>
        <p>Teléfono: +502 2456-5821</p>
      </div>
      <h3>CarByte zona 10</h3>
      <div class="info-sucursal">
        <p>20 calle 15av zona 10</p>
        <p>Teléfono: +502 2387-8925</p>
      </div>
        </div>
    </div>
    </div>

    <!-- Lado derecho -->
    <div id="contacto" class="form-container">
      <h1>Envía un mensaje</h1>
      <form class="formContac-container" method="post" action="#">
        <div class="form-group">
          <label for="usuario">Nombre_Completo</label>
          <input type="text" id="usuario" name="usuario" required>
        </div>
        <div class="form-group">
          <label for="correo">Correo Electrónico</label>
          <input type="email" id="correo" name="correo" required>
        </div>
        <div class="form-group">
          <label for="telefono">Teléfono</label>
          <input type="tel" id="telefono" name="telefono" required>
        </div>
        <div class="form-group">
          <label for="asunto">Asunto</label>
          <input type="text" id="asunto" name="asunto" required>
        </div>
        <div class="form-group">
          <label for="mensaje">Mensaje</label>
          <textarea id="mensaje" name="mensaje" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn-enviar">Enviar</button>
      </form>
    </div>

  </div> <!-- Aquí sí se cierra correctamente contac-container -->
</body>
</html>
