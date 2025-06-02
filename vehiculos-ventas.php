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

    $sql = "INSERT INTO vehiculos
    (vendedor, nombre_cliente, telefono, correo, direccion_zona, vehiculo, monto, nit, sucursal, comentario)
    VALUES
    ('{$empleado}', '{$cliente}', '{$telefono}', '{$email}', '{$direccion_zona}', '{$vehiculos}', '{$precio}', '{$nit}', '{$sucursal}', '{$comentario}')";

    if (mysqli_query($connec, $sql)) {
        echo "<p class='success'>Venta registrada con éxito.</p>";
    } else {
        echo "<p class='error'>Error al registrar venta: " . mysqli_error($connec) . "</p>";
    }
}

$queryEmpleados = mysqli_query($connec, "SELECT nom_usuario FROM usuario");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Facturación de Vehículos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(to bottom right, #1e1e2f, #2c2c3c);
        color: #f0f0f0;
        min-height: 100vh;
    }

    .ventas-container {
        max-width: 800px;
        background-color: #2d2d3a;
        margin: 80px auto;
        padding: 40px;
        border-radius: 16px;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.4);
    }

    h3 {
        text-align: center;
        margin-bottom: 10px;
        font-size: 28px;
        color: #00e5ff;
    }

    p {
        text-align: center;
        margin-bottom: 30px;
        color: #ccc;
    }

    form div {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #e0e0e0;
    }

    input[type="text"],
    input[type="email"],
    select,
    textarea {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 8px;
        background-color: #3a3a4a;
        color: #fff;
        font-size: 15px;
    }

    textarea {
        resize: vertical;
    }

    select[multiple] {
        height: 120px;
    }

    button {
        background-color: #00bcd4;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        background-color: #0097a7;
    }

    .success {
        background-color: #2e7d32;
        color: white;
        padding: 10px;
        text-align: center;
        border-radius: 8px;
        margin: 20px auto;
        width: 80%;
    }

    .error {
        background-color: #c62828;
        color: white;
        padding: 10px;
        text-align: center;
        border-radius: 8px;
        margin: 20px auto;
        width: 80%;
    }
</style>
</head>
<body>
    <?php include('barras/navbar-usuario.php'); ?>
    <?php include('barras/sidebar-usuario.php'); ?>

    <div class="ventas-container">
        <h3>Facturación de Vehículos</h3>
        <p>Llena el formulario de factura para registrar la venta de vehículos</p>
        <form action="" method="post">
            <div>
                <label for="empleados">Nombre del empleado</label>
                <select name="empleados" id="empleados" required>
                    <option value="">--Seleccione nombre del empleado--</option>
                    <?php while ($row = mysqli_fetch_assoc($queryEmpleados)): ?>
                        <option value="<?= htmlspecialchars($row['nom_usuario']) ?>">
                            <?= htmlspecialchars($row['nom_usuario']) ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div>
                <label for="cliente">Nombre completo del cliente</label>
                <input type="text" name="cliente" id="cliente" placeholder="Nombre completo" required>
            </div>
            <div>
                <label for="telefono">Teléfono del cliente</label>
                <input type="text" name="telefono" id="telefono" placeholder="Teléfono" required>
            </div>
            <div>
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email" placeholder="Correo Electrónico" required>
            </div>
            <div>
                <label for="zona">Zona del cliente</label>
                <select name="zona" id="zona" required>
                    <option value="">--Seleccione la zona del cliente--</option>
                    <?php for($i=1; $i<=25; $i++): ?>
                        <option value="<?= $i ?>">Zona <?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div>
                <label for="vehiculos">Vehículos vendidos</label>
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
            </div>
            <div>
                <label for="precio">Precio por producto</label>
                <input type="text" name="precio" id="precio" placeholder="Precio total" required>
            </div>
            <div>
                <label for="nit">NIT</label>
                <input type="text" name="nit" id="nit" placeholder="NIT" required>
            </div>
            <div>
                <label for="age">Sucursal</label>
                <select name="age" id="age" required>
                    <option value="">--Seleccione una sucursal--</option>
                    <option value="CarByte La República">CarByte La República</option>
                    <option value="CarByte Las Américas">CarByte Las Américas</option>
                    <option value="CarByte CA Salvador">CarByte CA Salvador</option>
                    <option value="CarByte Santa Fe">CarByte Santa Fe</option>
                    <option value="CarByte Zona 10">CarByte Zona 10</option>
                </select>
            </div>
            <div>
                <label for="comentario">Comentario</label>
                <textarea name="comentario" id="comentario" placeholder="Añadir comentarios"></textarea>
            </div>
            <div>
                <button type="submit">Registrar Venta</button>
            </div>
        </form>
    </div>
</body>
</html>
