<?php
session_start();
include('../conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($connec, trim($_POST['user']));
    $password = mysqli_real_escape_string($connec, trim($_POST['pass']));

    $sql = "SELECT Id, username, nom_usuario, password, avatar FROM clientes WHERE username = ?";
    $stmt = mysqli_prepare($connec, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($fila = mysqli_fetch_assoc($resultado)) {
        if (password_verify($password, $fila['password'])) {
            $_SESSION['usuarioingresando'] = true;
            $_SESSION['id'] = $fila['Id'];
            $_SESSION['username'] = $fila['username'];
            $_SESSION['nom_usuario'] = $fila['nom_usuario'];
            $_SESSION['avatar'] = $fila['avatar'];
            $_SESSION['tipo_usuario'] = 'cliente';

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
