<?php 
session_start();
include "conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $empleado = mysqli_real_escape_string($connec, $_POST['empleados']);
    $cliente = mysqli_real_escape_string($connec, $_POST['cliente']);
    $telefono = mysqli_real_escape_string($connec, $_POST['telefono']);
    $email = mysqli_real_escape_string($connec, $_POST['email']);
    $direccion_zona = intval($_POST['zona']);
    $precio = mysqli_real_escape_string($connec, $_POST['precio']);
    $nit = mysqli_real_escape_string($connec, $_POST['nit']);
    $sucursal = mysqli_real_escape_string($connec, $_POST['age']);
    $comentario = mysqli_real_escape_string($connec, $_POST['comentario']);

    $vehiculos_raw = $_POST['productos'] ?? [];

    if (!is_array($vehiculos_raw)) {
        $vehiculos_raw = [];
    }

    $vehiculos = implode(", ", array_map(function($p) use ($connec) {
        return mysqli_real_escape_string($connec, $p);
    }, $vehiculos_raw));

    $vehiculos = mysqli_real_escape_string($connec, $vehiculos);

    $sql = "INSERT INTO vehiculos
    (vendedor, nombre_cliente, telefono, correo, direccion_zona, vehiculo, monto, nit, sucursal, comentario)
    VALUES
    ('{$empleado}', '{$cliente}', '{$telefono}', '{$email}', '{$direccion_zona}', '{$vehiculos}', '{$precio}', '{$nit}', '{$sucursal}', '{$comentario}')";

    if (mysqli_query($connec, $sql)) {
    echo "<script>alert('Venta registrada con éxito.'); window.location.href='vehiculos-ventas.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error al registrar venta: " . mysqli_error($connec) . "');</script>";
    }
}

// Obtener nombres de usuario para el combo de empleados
$queryEmpleados = mysqli_query($connec, "SELECT nom_usuario FROM usuario");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Facturación de Vehículos</title>
    <link rel="stylesheet" href="css/styles.css">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html, body {
        height: 100%;
        background-color: #1b1f3a !important;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #fff;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .ventas-container {
        max-width: 700px;
        margin: 60px auto;
        background-color: #2e3856;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0,0,0,0.3);
    }

    .ventas-container h3 {
        text-align: center;
        color: #00c4cc;
        margin-bottom: 10px;
        font-size: 24px;
    }

    .ventas-container p {
        text-align: center;
        color: #ccc;
        margin-bottom: 30px;
    }

    .ventas-container label {
        display: block;
        margin-top: 15px;
        margin-bottom: 5px;
        font-weight: bold;
        color: #ccc;
    }

    .ventas-container input,
    .ventas-container select,
    .ventas-container textarea {
        width: 100%;
        padding: 10px 12px;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        background-color: #1b1f3a;
        color: #fff;
        box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
    }

    .ventas-container textarea {
        resize: vertical;
    }

    .ventas-container button {
        background-color: #00c4cc;
        color: #1b1f3a;
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        font-size: 15px;
        cursor: pointer;
        margin-top: 25px;
        width: 100%;
        transition: background-color 0.3s ease;
    }

    .ventas-container button:hover {
        background-color: #00a0a7;
    }

    .ventas-container select[multiple] {
        height: auto;
    }
</style>

</head>
<body>
    <?php include('barras/navbar-usuario.php'); ?>
    <?php include('barras/sidebar-usuario.php'); ?>

    <div class="ventas-container">
        <h3>Facturación de vehículos</h3>
        <p>Llena el formulario de factura para registrar la venta de vehículos</p>
        <form action="" method="post">
            <label for="empleados">Nombre del empleado</label>
            <select name="empleados" id="empleados" required>
                <option value="">--Seleccione nombre del empleado--</option>
                <?php while ($row = mysqli_fetch_assoc($queryEmpleados)): ?>
                    <option value="<?= htmlspecialchars($row['nom_usuario']) ?>">
                        <?= htmlspecialchars($row['nom_usuario']) ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label for="cliente">Nombre completo del cliente</label>
            <input type="text" name="cliente" id="cliente" placeholder="Nombre completo" required>

            <label for="telefono">Teléfono del cliente</label>
            <input type="text" name="telefono" id="telefono" placeholder="Teléfono" required>

            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" id="email" placeholder="Correo Electrónico" required>

            <label for="zona">Zona del cliente</label>
            <select name="zona" id="zona" required>
                <option value="">--Seleccione la zona del cliente--</option>
                <?php for($i=1; $i<=25; $i++): ?>
                    <option value="<?= $i ?>">Zona <?= $i ?></option>
                <?php endfor; ?>
            </select>

            <label for="vehiculos">Vehículo vendido</label>
            <select name="productos[]" id="vehiculos" multiple size="5" required>
                <option value="Modelo Toyota 2025">Modelo Toyota 2025</option>
                <option value="Modelo Toyota 2024">Modelo Toyota 2024</option>
                <option value="Honda Civic 2023">Honda Civic 2023</option>
                <option value="Ford Mustang 2022">Ford Mustang 2022</option>
                <option value="Chevrolet Camaro 2024">Chevrolet Camaro 2024</option>
                <option value="Kia Sportage 2023">Kia Sportage 2023</option>
                <option value="Nissan Altima 2024">Nissan Altima 2024</option>
                <option value="Hyundai Elantra 2025">Hyundai Elantra 2025</option>
                <option value="BMW Serie 3 2023">BMW Serie 3 2023</option>
            </select>

            <label for="precio">Precio por producto</label>
            <input type="text" name="precio" id="precio" placeholder="Precio total" required>

            <label for="nit">NIT</label>
            <input type="text" name="nit" id="nit" placeholder="NIT" required>

            <label for="sucursal">Sucursal</label>
            <select name="age" id="age" required>
                <option value="">--Seleccione una opción--</option>
                <option value="CarByte La República">CarByte La República</option>
                <option value="CarByte Las Américas">CarByte Las Américas</option>
                <option value="CarByte CA Salvador">CarByte CA Salvador</option>
                <option value="CarByte Santa Fe">CarByte Santa Fe</option>
                <option value="CarByte Zona 10">CarByte Zona 10</option>
            </select>

            <label for="comentario">Comentario del pedido</label>
            <textarea name="comentario" id="comentario" placeholder="Añadir comentarios"></textarea>

            <button type="submit">Registrar Venta</button>
        </form>
    </div>
</body>
</html>
