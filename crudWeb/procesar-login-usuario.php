<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include('conexion.php'); // Ajusta la ruta según tu estructura
if (!$connec) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar que todos los campos requeridos estén presentes
    if (!isset($_POST['username'], $_POST['nom_usuario'], $_POST['puesto'], $_POST['password'], $_POST['codigo_seguridad']) || 
        !isset($_FILES['avatar'])) {
        $_SESSION['error'] = "Todos los campos son obligatorios";
        header("Location: crear_usuario.php");
        exit();
    }

    $username = mysqli_real_escape_string($connec, trim($_POST['username']));
    $nom_usuario = mysqli_real_escape_string($connec, trim($_POST['nom_usuario']));
    $puesto = mysqli_real_escape_string($connec, trim($_POST['puesto']));
    $password = trim($_POST['password']);
    $codigo_seguridad = mysqli_real_escape_string($connec, trim($_POST['codigo_seguridad']));

    // Validar longitud de contraseña
    if (strlen($password) < 6) {
        $_SESSION['error'] = "La contraseña debe tener al menos 6 caracteres";
        header("Location: crear_usuario.php");
        exit();
    }

    // Verificar si el usuario ya existe
    $check_user = "SELECT username FROM usuario WHERE username = ?";
    $stmt_check = mysqli_prepare($connec, $check_user);
    mysqli_stmt_bind_param($stmt_check, "s", $username);
    mysqli_stmt_execute($stmt_check);
    $result_check = mysqli_stmt_get_result($stmt_check);
    
    if (mysqli_num_rows($result_check) > 0) {
        $_SESSION['error'] = "El nombre de usuario ya existe";
        header("Location: crear_usuario.php");
        exit();
    }
    mysqli_stmt_close($stmt_check);

    // Procesar imagen avatar
    $avatar_name = '';
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $max_size = 2 * 1024 * 1024; // 2MB

        if (!in_array($_FILES['avatar']['type'], $allowed_types)) {
            $_SESSION['error'] = "Formato de imagen no válido. Use JPG, PNG o GIF";
            header("Location: crear_usuario.php");
            exit();
        }

        if ($_FILES['avatar']['size'] > $max_size) {
            $_SESSION['error'] = "La imagen es demasiado grande. Máximo 2MB";
            header("Location: crear_usuario.php");
            exit();
        }

        // Crear directorio si no existe
        $upload_dir = 'uploads/avatars/';
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Generar nombre único para la imagen
        $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $avatar_name = $username . '_' . time() . '.' . $extension;
        $upload_path = $upload_dir . $avatar_name;

        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $upload_path)) {
            $_SESSION['error'] = "Error al subir la imagen";
            header("Location: crear_usuario.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Debe subir una imagen de avatar";
        header("Location: crear_usuario.php");
        exit();
    }

    // Encriptar contraseña
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insertar usuario en la base de datos
    $sql = "INSERT INTO usuario (username, nom_usuario, puesto, password, codigo_seguridad, avatar) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connec, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $username, $nom_usuario, $puesto, $password_hash, $codigo_seguridad, $avatar_name);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success'] = "Usuario creado exitosamente";
        header("Location: admin_usuarios.php"); // o donde quieras redirigir
    } else {
        // Si falla, eliminar la imagen subida
        if (file_exists($upload_path)) {
            unlink($upload_path);
        }
        $_SESSION['error'] = "Error al crear el usuario: " . mysqli_error($connec);
        header("Location: crear_usuario.php");
    }

    mysqli_stmt_close($stmt);
} else {
    header("Location: crear_usuario.php");
}

mysqli_close($connec);
?>