<?php
session_start();
include "conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $empleado   = mysqli_real_escape_string($connec, $_POST['empleados']);
    $cliente = mysqli_real_escape_string($connec, $_POST['cliente']);
    $telefono = mysqli_real_escape_string($connec, $_POST['telefono']);
    $email = mysqli_real_escape_string($connec, $_POST['email']);
    $zona = intval($_POST['zona']);
    $nit = mysqli_real_escape_string($connec, $_POST['nit']);
    $sucursal = mysqli_real_escape_string($connec, $_POST['age']);
    $productos = $_POST['productos'] ?? [];
    $precio = mysqli_real_escape_string($connec, $_POST['precio']);
    $pago = mysqli_real_escape_string($connec, $_POST['forma_pago']);
    $comentario = mysqli_real_escape_string($connec, $_POST['comentario']);

    $prod_list = implode(",", array_map(function($p) use ($connec) {
        return mysqli_real_escape_string($connec, $p);
    }, $productos));

    $sql = "INSERT INTO ventas 
        (vendedor, nombre_cliente, telefono_cliente, correo_cliente, direccion_zona, nit_cliente, sucursal, productos, monto, forma_pago, comentario)
        VALUES
        ('{$empleado}', '{$cliente}', '{$telefono}', '{$email}', {$zona}, '{$nit}', '{$sucursal}', '{$prod_list}', '{$precio}', '{$pago}', '{$comentario}')";

    if (mysqli_query($connec, $sql)) {
        echo "<p class='success'>Venta registrada con éxito.</p>";
    } else {
        echo "<p class='error'>Error al registrar venta: " . mysqli_error($connec) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Ventas</title>
    <link rel="stylesheet" href="./css/citas-compras.css">
</head>
<body>
    <div class="citas-container">
        <h3>Registro de ventas</h3>
        <p>Llena el formulario de registro de ventas de productos</p>
        <form action="" method="post">
            <div>
                <label for="empleados">Nombre del empleado</label>
                <select name="empleados" id="empleados" required>
                    <option value="">--Seleccione nombre del empleado--</option>
                    <option value="Luis Borrayo">Luis Borrayo</option>
                    <option value="Oscar Garcia">Oscar Garcia</option>
                    <option value="Wesley Lopez">Wesley Lopez</option>
                    <option value="Moise Cabrera">Moise Cabrera</option>
                    <option value="Lourdes Alvarado">Lourdes Alvarado</option>
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
                <label for="nit">NIT</label>
                <input type="text" name="nit" id="nit" placeholder="NIT" required>
            </div>
            <div>
                <label for="productos">Productos Vendidos</label>
                <select name="productos[]" id="productos" multiple size="5" required>
                    <option value="Rines Deportivos">Rines Deportivos</option>
                    <option value="Tapicería Premium">Tapicería Premium</option>
                    <option value="Alfombrilla">Alfombrilla</option>
                    <option value="Película Polarizada">Película Polarizada</option>
                    <option value="Sensores de Reversa">Sensores de Reversa</option>
                    <option value="Sistema de Navegación GPS">Sistema de Navegación GPS</option>
                    <option value="Portabicicletas">Portabicicletas</option>
                    <option value="Cargador Inalámbrico">Cargador Inalámbrico</option>
                    <option value="Fundas para Asientos">Fundas para Asientos</option>
                    <option value="Protector de Cajuela">Protector de Cajuela</option>
                    <option value="Deflectores de Viento">Deflectores de Viento</option>
                    <option value="Sistema de Alarma">Sistema de Alarma</option>
                    <option value="Rastreador Satelital">Rastreador Satelital</option>
                    <option value="Kit de Seguridad">Kit de Seguridad</option>
                    <option value="Luces LED Personalizadas">Luces LED Personalizadas</option>
                </select>
            </div>
            <div>
                <label for="precio">Precio por producto</label>
                <input type="text" name="precio" id="precio" placeholder="Precio total" required>
            </div>
            <div>
                <label for="forma_pago">Forma de pago</label>
                <select name="forma_pago" id="forma_pago" required>
                    <option value="">--Seleccione forma de pago--</option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Tarjeta">Tarjeta</option>
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
