<?php
session_start();
include('../conexion.php');

// Captura de filtros
$fecha_inicio = isset($_GET['fecha_inicio']) ? $_GET['fecha_inicio'] : '';
$fecha_fin = isset($_GET['fecha_fin']) ? $_GET['fecha_fin'] : '';
$zona = isset($_GET['zona']) ? $_GET['zona'] : '';

// Armado de condiciones
$condiciones = [];
if (!empty($fecha_inicio) && !empty($fecha_fin)) {
    $condiciones[] = "(fecha BETWEEN '$fecha_inicio' AND '$fecha_fin')";
}
if (!empty($zona)) {
    $condiciones[] = "direccion_zona = '$zona'";
}
$where = (count($condiciones) > 0) ? 'WHERE ' . implode(' AND ', $condiciones) : '';

// Clientes registrados (no depende de filtro)
$sqltotalCL = "SELECT COUNT(*) AS totalclientes FROM clientes";
$resultadocl = $connec->query($sqltotalCL);
$fila = $resultadocl->fetch_assoc();
$totalclientes = $fila['totalclientes'];

// Zonas diferentes filtradas
$sqlubiD = "SELECT COUNT(DISTINCT direccion_zona) AS ubicacion_dictinta FROM ventas $where";
$resultadoZona = $connec->query($sqlubiD);
$ubicaciones = $resultadoZona->fetch_assoc()['ubicacion_dictinta'] ?? 0;

// Cantidad de ventas filtradas
$sqlventastiempo = "SELECT COUNT(*) AS ventasperiodo FROM ventas $where";
$resutadoVentas = $connec->query($sqlventastiempo);
$totalventas = $resutadoVentas->fetch_assoc()['ventasperiodo'] ?? 0;

// Promedio de compras (ventas + vehículos)
$whereVehiculos = '';
if (!empty($fecha_inicio) && !empty($fecha_fin)) {
    $whereVehiculos = "WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
}
$promedioVentas = "
SELECT (
    (SELECT IFNULL(SUM(monto),0) FROM ventas $where) +
    (SELECT IFNULL(SUM(monto),0) FROM vehiculos $whereVehiculos)
) AS promedio";
$resulprecio = $connec->query($promedioVentas);
$totalprecio = $resulprecio->fetch_assoc()['promedio'] ?? 0;

// Gráfica circular
$sqlGCircule = "SELECT direccion_zona, COUNT(*) AS totalGrafica1 FROM ventas $where GROUP BY direccion_zona";
$resultGrafica1 = $connec->query($sqlGCircule);
$labelG1 = [];
$datosG1 = [];
while ($row = $resultGrafica1->fetch_assoc()) {
    $labelG1[] = "Zona " . $row['direccion_zona'];
    $datosG1[] = $row['totalGrafica1'];
}

// Gráfica de barras: top vehículos
$sqlTopAuto = "SELECT vehiculo, COUNT(*) AS totalauto FROM vehiculos $whereVehiculos GROUP BY vehiculo ORDER BY totalauto DESC LIMIT 3";
$resultAuto = $connec->query($sqlTopAuto);
$vehiculos = [];
$totalauto = [];
while ($rowauto = mysqli_fetch_assoc($resultAuto)) {
    $vehiculos[] = $rowauto['vehiculo'];
    $totalauto[] = $rowauto['totalauto'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Clientes | CarByte</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/Menu.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
</head>
<body class="body-dashboard">
    <?php include('../barras/navbar-usuario.php');?>
    <?php include('../barras/sidebar-usuario.php');?>
    <div class="contenedor-dashboard">
        <div class="titutlo-dash">
            <h2>Dashboard Clientes</h2>
        </div>
        <div class="contenedor-filtros">
        <form method="get">
            <label><strong>Rango de Fechas:</strong></label>
            <label for=""><strong>De:</strong></label><input type="date" name="fecha_inicio" value="<?= htmlspecialchars($fecha_inicio) ?>">
            <label for=""><strong>Hasta:</strong></label><input type="date" name="fecha_fin" value="<?= htmlspecialchars($fecha_fin) ?>">

            <label><strong>Ubicación:</strong></label>
            <select name="zona">
                <option value="">Todas las ubicaciones</option>
                <?php for($i=1; $i<=25; $i++): ?>
                    <option value="<?= $i ?>" <?= $zona == $i ? 'selected' : '' ?>>Zona <?= $i ?></option>
                <?php endfor; ?>
            </select>

            <button type="submit">Aplicar Filtros</button>
            <button type="button" onclick="window.location.href='dashboard-clientes.php'">Borrar filtros</button>
        </form>
    </div>

        <div class="tarjetas-container">
        <div class="tarjeta-dash">
            <h4>Clientes Registrados Totales</h4>
            <h2><?= $totalclientes; ?></h2>
        </div>
        <div class="tarjeta-dash">
            <h4>Zonas Distintas</h4>
            <h2><?= $ubicaciones; ?></h2>
        </div>
        <div class="tarjeta-dash">
            <h4>Ventas por cliente</h4>
            <h2><?= $totalventas; ?></h2>
        </div>
        <div class="tarjeta-dash">
            <h4>Ingresos totales</h4>
            <h2>Q<?= number_format($totalprecio, 2); ?></h2>
        </div>
    </div>

    <div class="graficas-container">
        <div class="grafica">
        <h2>Clientes por Ubicación</h2>
        <div style="width: 240px; height: 240px; padding: 0; margin: 0;">
            <canvas id="graficaZonas"></canvas>
        </div>
    </div>

    <div class="grafica">
        <h2>Top 3 vehículos más vendidos</h2>
        <div style="width: 520px; margin: auto;">
            <canvas id="graficaTopVehiculos"></canvas>
        </div>
    </div>
    </div>

    <div class="tabla-container">
        <div>
        <h2>Top 10 Clientes Frecuentes</h2>
        <table border="1">
            <tr>
                <th>Cliente</th>
                <th>Total de Compras</th>
                <th>Total Gastado</th>
                <th>Última Compra</th>
            </tr>
            <?php
            $subqueryVentas = "SELECT nombre_cliente, monto, fecha FROM ventas $where";
            $subqueryVehiculos = "SELECT nombre_cliente, monto, fecha FROM vehiculos $whereVehiculos";

            $slqTopClientes = "
                SELECT nombre_cliente, COUNT(*) AS cant_compras,
                       SUM(monto) AS total_monto,
                       MAX(fecha) AS ulti_compra
                FROM (
                    $subqueryVentas
                    UNION ALL
                    $subqueryVehiculos
                ) AS datos_compras
                GROUP BY nombre_cliente
                ORDER BY cant_compras DESC
                LIMIT 10";
            $resulTopClientes = $connec->query($slqTopClientes);
            while($filaTopclientes = mysqli_fetch_assoc($resulTopClientes)) {
                echo "<tr>
                        <td>{$filaTopclientes['nombre_cliente']}</td>
                        <td>{$filaTopclientes['cant_compras']}</td>
                        <td>Q " . number_format($filaTopclientes['total_monto'], 2) . "</td>
                        <td>{$filaTopclientes['ulti_compra']}</td>
                    </tr>";
            }
            ?>
        </table>
    </div>
    </div>
    </div>
    <script>
    const ctx = document.getElementById('graficaZonas').getContext('2d');
    new Chart(ctx, {
    type: 'pie',
    data: {
        labels: <?= json_encode($labelG1) ?>,
        datasets: [{
            label: 'Clientes por zona',
            data: <?= json_encode($datosG1) ?>,
            backgroundColor: ['#E39A78','#B97972','#A99BAE','#71555C','#68442C','#7E8988','#A75953','#B27F84'],
            borderColor: 'transparent' // ← Elimina borde blanco entre secciones
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        layout: {
            padding: 0 // Quita padding interno del gráfico
        },
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    color: '#fff', // Color del texto de leyenda
                    boxWidth: 12,   // Tamaño del cuadrado de color
                    padding: 8
                }
            },
            datalabels: {
                color: '#fff',
                font: {
                    weight: 'bold',
                    size: 12
                },
                padding: 0
            }
        },
        elements: {
            arc: {
                borderWidth: 0 // ← Esto elimina cualquier borde entre secciones
            }
        }
    },
    plugins: [ChartDataLabels]
    });

    const ctxbarauto = document.getElementById('graficaTopVehiculos').getContext('2d');
    new Chart(ctxbarauto, {
        type: 'bar',
        data: {
            labels: <?= json_encode($vehiculos); ?>,
            datasets: [{
                label: 'Top 3 Vehículos más vendidos',
                data: <?= json_encode($totalauto); ?>,
                backgroundColor: ['#A3AAA6', '#B27F84', '#BCA2E7'],
                borderWidth: 1
            }]
        },
        options: {
    layout: {
        padding: 0
    },
    scales: {
        x: {
            ticks: {
                color: '#fff'
            }
        },
        y: {
            beginAtZero: true,
            ticks: {
                stepSize: 1,
                color: '#fff'
            }
        }
    },
    plugins: {
        legend: {
            labels: {
                color: '#fff'
            }
        }
    }
}

    });
    </script>
</body>
</html>
