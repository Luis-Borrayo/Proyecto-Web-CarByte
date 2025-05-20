<?php
$host = 'localhost';
$nom = 'root';
$pass = '';
$bd = 'uspg';

$connec = mysqli_connect($host, $nom, $pass, $bd);

if (!$connec) {
    die("Error de conexión con la base de datos: " . mysqli_connect_error());
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
    <title>Toyota | Venta de Autos</title>
    <link rel="stylesheet" href="./css/contac.css">
</head>
<body class="contac-body">
  <div class="contac-container">
    <!-- Lado izquierdo -->
    <div class="contact-info">
      <h2 style="text-align: center;">Contáctanos</h2>
      <div class="info-itemcontact">
        <i class="fas fa-clock"></i>
        <div>
          <strong>Horario de apertura</strong><br>
          Lunes - Viernes, 8:00 - 9:00
        </div>
      </div>
      <div class="info-itemcontact">
        <i class="fas fa-phone"></i>
        <div>
          <strong>Llàmanos</strong><br>
          +012 345 6789
        </div>
      </div>
      <div class="info-itemcontact">
        <i class="fas fa-envelope"></i>
        <div>
          <strong>Envíenos un correo electrónico</strong><br>
          info@ejemplo.com
        </div>
      </div>
      <h2 style="text-align: center;">Sucursales</h2>
      <h3>Central</h3>
      <div class="info-itemcontact">
        <p>Dirección: Calle Ficticia 123, Ciudad X</p>
        <p>Teléfono: (123) 456-7890</p>
      </div>
      <h3>Norte</h3>
      <div class="info-itemcontact">
        <p>Dirección: Calle Ficticia 123, Ciudad X</p>
        <p>Teléfono: (123) 456-7890</p>
      </div>
    </div>

    <!-- Lado derecho -->
    <div id="contacto" class="form-container">
      <h1>Contáctanos Para Cualquier Consulta</h1>
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
  </div>
</body>
</html>
