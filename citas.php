<?php
session_start();
ob_start();
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($connec, $_POST['nom']);
    $telefono = mysqli_real_escape_string($connec, $_POST['tel']);
    $correo = mysqli_real_escape_string($connec, $_POST['email']);
    $date = mysqli_real_escape_string($connec, $_POST['fecha']);
    $time = mysqli_real_escape_string($connec, $_POST['hora']);
    $agencia = mysqli_real_escape_string($connec, $_POST['age']);
    $asunto = mysqli_real_escape_string($connec, $_POST['asunto']);
    $comentario = mysqli_real_escape_string($connec, $_POST['coment']);

    if (empty($nombre) || empty($telefono) || empty($correo) || empty($date) || empty($time) || empty($agencia) || empty($asunto)) {
        echo "<script>alert('Por favor completa todos los campos obligatorios.');</script>";
        exit;
    }

    $sql = "INSERT INTO citas (Nombre, Telefono, Correo, Fecha, Hora, Agencia, Asunto, Comentario)
            VALUES ('$nombre', '$telefono', '$correo', '$date', '$time', '$agencia', '$asunto', '$comentario')";

    if (mysqli_query($connec, $sql)) {
        header("Location: ".$_SERVER['PHP_SELF']."?enviado=1");
        exit;
    } else {
        echo "<script>alert('Error al enviar el mensaje.');</script>";
    }
}

if (isset($_GET['enviado']) && $_GET['enviado'] == 1) {
    echo "<script>alert('Cita registrada con éxito.');</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/citas-compras.css">
    <title>Document</title>
</head>
<body class="body-index <?php echo ($tipo === 'cliente' || $tipo === 'usuario') ? 'con-sidebar' : ''; ?>">
    <?php if (isset($_GET['enviado'])): ?>
    <script>alert('Mensaje enviado correctamente.');</script>
    <?php endif; ?>
    <div class="citas-container">
    <h2>Programa tu cita</h2>
    <p>Completa el siguiente formulario para agendar tu cita. <br>
       Uno de nuestros asesores se pondrá en contacto contigo para confirmar disponibilidad.</p>

    <form action="" method="POST">
        <div>
            <input type="text" id="nom" name="nom" class="datoscl" placeholder="Nombre completo" required>
        </div>
        <div>
            <input type="text" id="tel" name="tel" class="datoscl" placeholder="Teléfono" required>
        </div>
        <div>
            <input type="email" id="email" name="email" class="datoscl" placeholder="Correo Electrónico" required>
        </div>
        <div>
            <label for="fecha">Fecha y hora de la cita</label>
            <input type="date" id="fecha" name="fecha" required>
            <input type="time" id="hora" name="hora" required>
        </div>
        <div class="etiquetas-dobles">
            <label for="age" class="subtitle">Agencia que desea visitar</label>
            <label for="asunto" class="subtitle">Asunto de la visita</label>
        </div>
        <div>
            <select name="age" id="age" class="datoslocal" required>
                <option value="">--Seleccione una opción--</option>
                <option value="CarByte La República">CarByte La República</option>
                <option value="CarByte Las Américas">CarByte Las Américas</option>
                <option value="CarByte CA Salvador">CarByte CA Salvador</option>
                <option value="CarByte Santa Fe">CarByte Santa Fe</option>
                <option value="CarByte Zona 10">CarByte Zona 10</option>
            </select>
            <select name="asunto" id="asunto" class="datoslocal" required>
                <option value="">--Seleccione una opción--</option>
                <option value="Cotización de vehículos">Cotización de vehículos</option>
                <option value="Proceso de compra de vehículo">Proceso de compra de vehículo</option>
                <option value="Solicitar información">Solicitar información</option>
                <option value="Pago de cuotas o enganche">Pago de cuotas o enganche</option>
                <option value="docRecibir documentos de compraumentos">Recibir documentos de compra</option>
                <option value="Recoger placa">Recoger placa</option>
                <option value="Pago de impuestos u otros">Pago de impuestos u otros</option>
            </select>
        </div>
        <div>
            <label for="coment">Comentarios</label>
            <textarea name="coment" id="coment" maxlength="255" class="datoscl" placeholder="Especificaciones de su visita"></textarea>
        </div>
        <div>
            <input type="submit" name="btnenviar" id="btnenviar" value="Agendar cita">
            <a href="contacto.php">Solicitar información en línea</a>
        </div>
    </form>
    </div>
</body>
</html>
<?php ob_end_flush(); ?>
