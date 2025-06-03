<?php
session_start();
include "conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $empleado = mysqli_real_escape_string($connec, $_POST['empleados']);
    $cliente = mysqli_real_escape_string($connec, $_POST['cliente']);
    $telefono = mysqli_real_escape_string($connec, $_POST['telefono']);
    $email = mysqli_real_escape_string($connec, $_POST['email']);
    $zona = intval($_POST['zona']);
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
        ('{$empleado}', '{$cliente}', '{$telefono}', '{$email}', '{$zona}', '{$vehiculos}', '{$precio}', '{$nit}', '{$sucursal}', '{$comentario}')";

    if (mysqli_query($connec, $sql)) {
    echo "<script>alert('Venta registrada con éxito.'); window.location.href='vehículos-ventas.php';</script>";
    exit;
        } else {
    echo "<script>alert('Error al registrar venta: " . mysqli_error($connec) . "');</script>";
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h3>Facturación de vehículos</h3>
        <p>Llena el formulario de factura para registrar la venta de vehículos</p>
        <form action="" method="post">
            <div>
                <label for="empleados">Nombre del empleado</label>
                <select name="empleados" id="empleados" required>
                    <option value="">--Seleccione nombre del empleado--</option>
                    <option value="Luis Borrayo">Luis Borrayo</option>
                    <option value="Oscar Garcia">Oscar Garcia</option>
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
                <label for="sucursal">Sucursal</label>
                <select name="age" id="age"  name="age" class="datoslocal" required>
                <option value="">--Seleccione una opción--</option>
                <option value="CarByte La República">CarByte La República</option>
                <option value="CarByte Las Américas">CarByte Las Américas</option>
                <option value="CarByte CA Salvador">CarByte CA Salvador</option>
                <option value="CarByte Santa Fe">CarByte Santa Fe</option>
                <option value="CarByte Zona 10">CarByte Zona 10</option>
            </select>
            </div>
            <div>
                <label for="comentario">Comentario del pedido</label>
                <textarea name="comentario" id="comentario" placeholder="Añadir comentarios"></textarea>
            </div>
            <div>
                <button type="submit">Registrar Venta</button>
            </div>
        </form>
    </div>
</body>
</html>