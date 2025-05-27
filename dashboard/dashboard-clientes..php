<?php
session_start();
include('../conexion.php');

//Clientes registrados
$sqltotalCL =  "SELECT COUNT(*) AS totalclientes FROM clientes";
$resultadocl= $connec->query($sqltotalCL);
$fila = $resultadocl->fetch_assoc();
$totalclientes = $fila['totalclientes'];

//ZOnas diferentes
$sqlubiD = "SELECT COUNT(DISTINCT direccion_zona) AS ubicacion_dictinta FROM ventas";
$resultadoZona = $connec->query($sqlubiD);
$ubicaciones = 0;

if ($resultadoZona->num_rows > 0) {
    $filaZona = $resultadoZona->fetch_assoc();
    $ubicaciones = $filaZona['ubicacion_dictinta'];
}

//Cantidad de ventas
$sqlventastiempo = "SELECT COUNT(*) AS ventasperiodo FROM ventas";
$resutadoVentas = $connec->query($sqlventastiempo);
$filaventas = $resutadoVentas->fetch_assoc();
$totalventas = $filaventas['ventasperiodo'];

//Promedio de compras
$promedioVentas = "SELECT SUM(precios) AS promedio FROM ventas";
$resulprecio = $connec->query($promedioVentas);
$filapromedio = $resulprecio->fetch_assoc();
$totalprecio = $filapromedio['promedio'];

//Graficas
$sqlGCircule= "SELECT direccion_zona, COUNT(*) AS totalGrafica1 FROM ventas GROUP BY direccion_zona";
$resultGrafica1 = $connec->query($sqlGCircule);
$labelG1 = [];
$datosG1 = [];
while ($row = $resultGrafica1->fetch_assoc()){
    $labelG1[] = $row['direccion_zona'];
    $datosG1[] = $row['totalGrafica1'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Clientes | CarByte</title>
    <link rel="stylesheet" href="../css/dashboard-clientes.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div>
        <div class="tarjeta">
            <h4>Total de clientes Registrados</h4>
            <h2><?php echo $totalclientes; ?></h2>
        </div>
        <div class="tarjeta">
            <h4>Zonas Distintas</h4>
            <h2><?php echo $ubicaciones; ?></h2>
        </div>
        <div class="tarjeta">
            <h4>Ventas por cliente</h4>
            <h2><?php echo $totalventas;?></h2>
        </div>
        <div class="tarjeta">
            <h4>Promedio de ventas</h4>
            <h2><?php echo $totalprecio?></h2>
        </div>
    </div>
    <div>
        <div>
            <h2>Clientes por Ubicación</h2>
            <div style="width: 200px; height: 200px;">
            <canvas id="graficaZonas"></canvas>
            </div>
        </div>
    </div>
    <script>
        const ctx = document.getElementById('graficaZonas').getContext('2d');
        const grafica = new Chart(ctx, {
            type: 'pie',
            data: {
                labelG1: <?= json_encode($labelG1) ?>,
                datasets: [{
                    label: 'Clientes por zona',
                    data: <?= json_encode($datosG1) ?>,
                    backgroundColor: [
                        '#FF6384', '#36A2EB', '#FFCE56', '#8BC34A',
                        '#9C27B0', '#FF9800', '#4CAF50', '#00BCD4'
                    ]
                }]
            }
        });
    </script>
</body>
</html>