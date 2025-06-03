<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include('../conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user'], $_POST['pass'], $_POST['cod'])) {
    $username = mysqli_real_escape_string($connec, trim($_POST['user']));
    $password = mysqli_real_escape_string($connec, trim($_POST['pass']));
    $codigo   = mysqli_real_escape_string($connec, trim($_POST['cod']));

    $sql = "SELECT Id1, username, nom_usuario, password, codigo_seguridad, avatar FROM usuario WHERE username = ?";
    $stmt = mysqli_prepare($connec, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($fila = mysqli_fetch_assoc($resultado)) {
        if ($codigo !== $fila['codigo_seguridad']) {
            echo "<script>alert('Código incorrecto'); window.location.href='../index.php';</script>";
            exit();
        }

        if (password_verify($password, $fila['password'])) {
            $_SESSION['usuarioingresando'] = true;
            $_SESSION['id'] = $fila['Id1'];
            $_SESSION['username'] = $fila['username'];
            $_SESSION['nom_usuario'] = $fila['nom_usuario'];
            $_SESSION['avatar'] = $fila['avatar'];
            $_SESSION['tipo_usuario'] = 'usuario';

            header("Location: ../index.php");
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta'); window.location.href='../index.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Usuario no encontrado'); window.location.href='../index.php';</script>";
        exit();
    }

    mysqli_stmt_close($stmt);
}
?>
