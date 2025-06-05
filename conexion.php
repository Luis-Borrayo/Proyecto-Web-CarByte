<?php
$host = 'localhost';
$nom = 'root';
$pass = '';
$bd = 'uspg';

$connec = mysqli_connect($host, $nom, $pass, $bd);

if(!$connec)
{
    die("Error de conexion con la base de datos".mysqli_connect_error());
}
?>
<?php
$conexion = mysqli_connect("localhost", "root", "", "uspg");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
