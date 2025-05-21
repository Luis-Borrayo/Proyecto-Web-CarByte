<?php
// Iniciar sesión antes de cualquier salida
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include(__DIR__ . "/../conexion.php");

// Obtener datos del usuario
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$query = "SELECT avatar FROM usuario WHERE username = ?";
$stmt = mysqli_prepare($connec, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

// Manejo del avatar
$defaulavatar = 'sinavatar.jpg';
$avatarpath = (!empty($user['avatar']) && file_exists("../avatars/" . $user['avatar']))
    ? "../avatars/" . $user['avatar']
    : "../avatars/" . $defaulavatar;

$nom_usuario = $username ?: 'Usuario';
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbyte | Distribuidor de Autos</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/Menu.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
        <div class="perfil">
            <form action="../upload_avatar.php" method="POST" enctype="multipart/form-data" id="avatarForm">
                <div class="avatar-container">
                    <img src="<?php echo htmlspecialchars($avatarpath);?>" alt="Avarta Usuario" id="avatarImgqa">
                    <div class="avatar-overlay">
                        <label for="avatarUpload" class="upload-btn">
                            <i class="fas fa-camera"></i>
                        </label>
                        <input type="file" name="avatar" id="avatarUpload" accep="image/*" style="display: none;"    >
                    </div>
                </div>  
            </form>
            <h2><?php echo htmlspecialchars($nom_usuario); ?></h2>
        </div>
        <div class="menu-section">
            <h3>Panel</h3>
            <a href="#">
                <i class="link-disebar">Inicio</i>
            </a>
            <a href="#">
                <i class="link-disebar">Citas</i>
            </a>
            <a href="#">
                <i class="link-disebar">Actualizar Datos</i>
            </a>
            <a href="#">
                <i class="link-disebar">Compras</i>
            </a>
        </div>
    </div>

    </body>