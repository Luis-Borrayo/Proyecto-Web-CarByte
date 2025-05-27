<?php
session_start();
include('../conexion.php');

$sql =  "SELECT COUNT(*) AS totalclientes FROM clientes";
$resultadocl= $connec->query($sql);
$fila = $resultadocl->fetch_assoc();
$totalclientes = $fila['totalclientes'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Clientes | CarByte</title>
    <link rel="stylesheet" href="../css/dashboard-clientes.css">
</head>
<body>
    <div>
        <div class="tarjeta">
            <h4>Total de clientes Registrados</h4>
            <h2><?php echo $totalclientes; ?></h2>
        </div>
    </div>
</body>
</html>