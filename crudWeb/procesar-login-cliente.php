<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include(__DIR__ . '/../conexion.php');
if (!$connec) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'], $_POST['pass'])) {
    $username = mysqli_real_escape_string($connec, trim($_POST['username']));
    $password = trim($_POST['pass']);

    $sql = "SELECT Id, username, nom_usuario, password, avatar FROM clientes WHERE username = ?";
    $stmt = mysqli_prepare($connec, $sql);
    
    if (!$stmt) {
        error_log("Error en prepare: " . mysqli_error($connec));
        echo "<script>alert('Error en el sistema'); window.location.href='../index.php';</script>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($fila = mysqli_fetch_assoc($resultado)) {
        $password_valida = false;
        
        if (password_verify($password, $fila['password'])) {
            $password_valida = true;
        } 
        elseif ($password === $fila['password']) {
            $password_valida = true;
            
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $update_sql = "UPDATE clientes SET password = ? WHERE Id = ?";
            $update_stmt = mysqli_prepare($connec, $update_sql);
            mysqli_stmt_bind_param($update_stmt, "si", $password_hash, $fila['Id']);
            mysqli_stmt_execute($update_stmt);
            mysqli_stmt_close($update_stmt);
        }

        if ($password_valida) {
            $_SESSION['usuarioingresando'] = true;
            $_SESSION['id'] = $fila['Id'];
            $_SESSION['username'] = $fila['username'];
            $_SESSION['nom_usuario'] = $fila['nom_usuario'];
            $_SESSION['avatar'] = $fila['avatar'];
            $_SESSION['tipo_usuario'] = 'cliente';

            error_log("Login exitoso para usuario: " . $username);
            
            header("Location: ../index.php");
            exit();
        } else {
            error_log("Contraseña incorrecta para usuario: " . $username);
            echo "<script>alert('Contraseña incorrecta'); window.location.href='../index.php';</script>";
            exit();
        }
    } else {
        error_log("Usuario no encontrado: " . $username);
        echo "<script>alert('Usuario no encontrado'); window.location.href='../index.php';</script>";
        exit();
    }

    mysqli_stmt_close($stmt);
} else {
    echo "<script>alert('Datos incompletos'); window.location.href='../index.php';</script>";
    exit();
}

mysqli_close($connec);
?>