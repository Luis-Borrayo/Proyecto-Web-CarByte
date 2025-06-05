<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['Id1'] ?? null;
    $username = $_POST['username'] ?? '';
    $nombre = $_POST['nom_usuario'] ?? '';
    $puesto = $_POST['puesto'] ?? '';
    $password = $_POST['password'] ?? '';
    $codigo = $_POST['codigo_seguridad'] ?? '';
    $avatar_actual = $_POST['avatar_actual'] ?? '';

    // Validar ID
    if (!$id) {
        echo "ID no proporcionado.";
        exit;
    }

    // Manejo de subida de imagen
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo = basename($_FILES["avatar"]["name"]);
        $rutaDestino = "uploads/" . uniqid() . "_" . $nombreArchivo;

        // Asegurarse que la carpeta exista
        if (!is_dir("uploads")) {
            mkdir("uploads", 0777, true);
        }

        move_uploaded_file($_FILES["avatar"]["tmp_name"], $rutaDestino);
        $avatar = $rutaDestino;
    } else {
        $avatar = $avatar_actual;
    }

    $sql = "UPDATE usuario SET 
                username = ?, 
                nom_usuario = ?, 
                puesto = ?, 
                password = ?, 
                codigo_seguridad = ?, 
                avatar = ? 
            WHERE Id1 = ?";

    $stmt = $connec->prepare($sql);
    $stmt->bind_param("ssssssi", $username, $nombre, $puesto, $password, $codigo, $avatar, $id);

    if ($stmt->execute()) {
        header("Location: admin_usuarios.php");
        exit;
    } else {
        echo "Error al actualizar el usuario: " . $stmt->error;
    }

    $stmt->close();
    $connec->close();
} else {
    echo "Acceso no válido.";
}