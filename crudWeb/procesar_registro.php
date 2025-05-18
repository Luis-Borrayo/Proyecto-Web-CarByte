<?php
session_start();
include('../conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registro'])) {
    $user = mysqli_real_escape_string($connec, trim($_POST['user']));
    $nom_user = mysqli_real_escape_string($connec, trim($_POST['nom']));
    $password = mysqli_real_escape_string($connec, trim($_POST['pass']));
    $confirmpass = mysqli_real_escape_string($connec, trim($_POST['confirm_pass']));

    if (empty($user) || empty($nom_user) || empty($password) || empty($confirmpass)) {
        echo "<script>alert('Todos los campos son obligatorios'); window.location.href='../index.php';</script>";
        exit();
    }

    if ($password !== $confirmpass) {
        echo "<script>alert('Las contraseñas no coinciden'); window.location.href='../index.php';</script>";
        exit();
    }

    $checkSql = "SELECT id FROM usuario WHERE username = ?";
    $checkStmt = mysqli_prepare($connec, $checkSql);
    mysqli_stmt_bind_param($checkStmt, "s", $user);
    mysqli_stmt_execute($checkStmt);
    mysqli_stmt_store_result($checkStmt);

    if (mysqli_stmt_num_rows($checkStmt) > 0) {
        echo "<script>alert('Este usuario ya existe, intente con otro.'); window.location.href='../index.php';</script>";
        exit();
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuario (username, nom_usuario, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($connec, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $user, $nom_user, $password_hash);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Usuario registrado exitosamente, puedes iniciar sesión');
        window.location.href='../index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error al completar el registro'); window.location.href='../index.php';</script>";
        exit();
    }
}
?>
