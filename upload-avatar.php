<?php
session_start();
require_once 'conexion.php';

if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0 && isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $upload_dir = 'avatars/';

    // Crear carpeta si no existe
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Crear nombre único para el archivo
    $filename = time() . '_' . basename($_FILES['avatar']['name']);
    $avatar_path = $upload_dir . $filename;

    // Mover archivo subido
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_path)) {
        // Guardar solo el nombre del archivo en la base de datos
        $stmt = $connec->prepare("UPDATE usuario SET avatar = ? WHERE username = ?");
        $stmt->bind_param("ss", $filename, $username);
        $stmt->execute();
        $stmt->close();

        // Actualizar avatar en la sesión
        $_SESSION['avatar_path'] = $filename;
    }
}

// Redirigir de vuelta a la página anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>
