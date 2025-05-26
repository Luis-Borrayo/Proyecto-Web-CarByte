<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['Id'];
    $username = $_POST['username'];
    $nom_usuario = $_POST['nom_usuario'];
    $password = $_POST['password'];
    $avatar_actual = $_POST['avatar_actual'];

    // Manejar nuevo avatar si se sube uno
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES['avatar']['name'];
        $rutaTemporal = $_FILES['avatar']['tmp_name'];
        $rutaDestino = 'uploads/' . time() . '_' . basename($nombreArchivo);

        if (!file_exists('uploads')) {
            mkdir('uploads', 0777, true);
        }

        if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
            $avatar = $rutaDestino;
        } else {
            echo "Error al subir el nuevo avatar.";
            exit;
        }
    } else {
        $avatar = $avatar_actual;
    }

    $sql = "UPDATE clientes SET username = ?, nom_usuario = ?, password = ?, avatar = ? WHERE Id = ?";
    $stmt = $connec->prepare($sql);
    $stmt->bind_param("ssssi", $username, $nom_usuario, $password, $avatar, $id);

    if ($stmt->execute()) {
        header("Location: admin_clientes.php");
        exit;
    } else {
        echo "Error al actualizar el cliente: " . $stmt->error;
    }
} else {
    echo "Acceso no autorizado.";
}
?>
