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