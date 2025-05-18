<?php
session_start();
require_once 'conexion.php';
if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0){
    $username = $_SESSION['username'];
    $upload_dir = 'avatars/';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $filename = time() . '_' . $_FILES['avatar']['name'];
    $avatar_path = $upload_dir . $filename;

        if(move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_path)) {
        $stmt = $connec->prepare("UPDATE usuario SET avatar = ? WHERE username = ?");
        $stmt->bind_param("ss", $avatar_path, $username);
        $stmt->execute();
        
        // Actualizar la sesión con la nueva ruta
        $_SESSION['avatar_path'] = $avatar_path;
        
        $stmt->close();
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>