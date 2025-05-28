<?php
session_start();
include('../conexion.php');

//Clientes registrados
$sqltotalCL =  "SELECT COUNT(*) AS totalclientes FROM clientes";
$resultadocl= $connec->query($sqltotalCL);
$fila = $resultadocl->fetch_assoc();
$totalclientes = $fila['totalclientes'];

//Zonas diferentes
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
$promedioVentas = "SELECT(SELECT SUM(monto) FROM ventas) + (SELECT SUM(monto)FROM vehiculos) AS promedio";
$resulprecio = $connec->query($promedioVentas);
$filapromedio = $resulprecio->fetch_assoc();
$totalprecio = $filapromedio['promedio'];

//Graficas
$sqlGCircule= "SELECT direccion_zona, COUNT(*) AS totalGrafica1 FROM ventas GROUP BY direccion_zona";
$resultGrafica1 = $connec->query($sqlGCircule);
$labelG1 = [];
$datosG1 = [];
while ($row = $resultGrafica1->fetch_assoc()){
    $labelG1[] = "Zona" . $row['direccion_zona'];
    $datosG1[] = $row['totalGrafica1'];
}

//Barras
$sqlTopAuto= "SELECT vehiculo, COUNT(*) AS totalauto FROM vehiculos GROUP BY vehiculo ORDER BY totalauto DESC LIMIT 3";
$resultAuto = $connec->query($sqlTopAuto);
$vehiculos = [];
$totalauto = [];
while ($rowauto = mysqli_fetch_assoc($resultAuto))
{
    $vehiculos [] = $rowauto['vehiculo'];
    $totalauto [] = $rowauto['totalauto'];
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
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
</head>
<body>
    <div>
        <form method="get" style="margin: 20px 0; padding: 10px; border: 1px solid #ccc; border-radius: 8px; display: flex; gap: 10px; align-items: center;">
        <label><strong>Rango de Fechas:</strong></label>
        <input type="date" name="fecha_inicio" value="<?= htmlspecialchars($fecha_inicio) ?>">
        <input type="date" name="fecha_fin" value="<?= htmlspecialchars($fecha_fin) ?>">

        <label><strong>Ubicación:</strong></label>
        <select name="zona">
            <option value="">Todas las ubicaciones</option>
            <?php for($i=1; $i<=25; $i++): ?>
                        <option value="<?= $i ?>">Zona <?= $i ?></option>
                    <?php endfor; ?>
        </select>

        <button type="submit" style="padding: 6px 12px; background-color: #007bff; color: white; border: none; border-radius: 5px;">Aplicar Filtros</button>
    </form>
    </div>
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
            <h4>Promedio de ventas productos y vehículos</h4>
            <h2>Q<?php echo number_format($totalprecio, 2);?></h2>
        </div>
    </div>
    <div>
        <div>
            <h2>Clientes por Ubicación</h2>
            <div style="width: 200px; height: 200px;">
            <canvas id="graficaZonas"></canvas>
            </div>
        </div>
        <div>
            <h2>Top 3 vehículos mas vendidos</h2>
            <div style="width: 600px; margin: auto;">
                <canvas id="graficaTopVehiculos"></canvas>
            </div>
        </div>
    </div>
    <div>
        <table border="1">
        <tr>
        <th>Cliente</th>
        <th>Total de Compras</th>
        <th>Total Gastado</th>
        <th>Última Compra</th>
    </tr>
    <?php
    $slqTopClientes = "SELECT nombre_cliente, COUNT(*) AS cant_compras,
                SUM(monto) AS total_monto,
                MAX(fecha) AS ulti_compra
                FROM (SELECT nombre_cliente, monto, fecha FROM vehiculoS
                UNION ALL
                SELECT nombre_cliente, monto, fecha FROM ventas)
                AS datos_compras GROUP BY nombre_cliente
                ORDER BY cant_compras DESC
                LIMIT 10";
        $resulTopClientes = $connec->query($slqTopClientes);
        while($filaTopclientes = mysqli_fetch_assoc($resulTopClientes))
        {
        echo"<tr>
            <td>{$filaTopclientes['nombre_cliente']}</td>
            <td>{$filaTopclientes['cant_compras']}</td>
            <td>Q " . number_format($filaTopclientes['total_monto'], 2) . "</td>
            <td>{$filaTopclientes['ulti_compra']}</td>
        </tr>";
        }
    ?>
    </div>
    <script>
        const ctx = document.getElementById('graficaZonas').getContext('2d');
        const grafica = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: <?= json_encode($labelG1) ?>,
      datasets: [{
        label: 'Clientes por zona',
        data: <?= json_encode($datosG1) ?>,
        backgroundColor: [
          '#FF6384','#36A2EB','#FFCE56','#8BC34A',
          '#9C27B0','#FF9800','#4CAF50','#00BCD4'
        ]
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        
        datalabels: {
          color: '#fff',
          font: {
            weight: 'bold',
            size: 12
          },

        }
      }
    },
    plugins: [ChartDataLabels]
  });


  const ctxbarauto = document.getElementById('graficaTopVehiculos').getContext('2d');
    const chart = new Chart(ctxbarauto, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($vehiculos); ?>,
            datasets: [{
                label: 'Top 3 Vehículos más vendidos',
                data: <?php echo json_encode($totalauto); ?>,
                backgroundColor: ['#4CAF50', '#FF9800', '#2196F3'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
    </script>
</body>
</html>