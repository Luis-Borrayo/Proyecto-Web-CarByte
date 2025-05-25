<?php 
// Iniciar sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include(__DIR__ . "/../conexion.php");

$username = $_SESSION['username'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar']) && $username !== '') {
    $avatar = $_FILES['avatar'];

    if ($avatar['error'] === 0) {
        $ext = pathinfo($avatar['name'], PATHINFO_EXTENSION);
        $file_name = uniqid('avatar_') . '.' . $ext;
        $upload_path = __DIR__ . "/../avatars/" . $file_name;

        // Mover el archivo
        if (move_uploaded_file($avatar['tmp_name'], $upload_path)) {
            // Guardar en BD
            $query = "UPDATE clientes SET avatar = ? WHERE username = ?";
            $stmt = mysqli_prepare($connec, $query);
            mysqli_stmt_bind_param($stmt, "ss", $file_name, $username);
            mysqli_stmt_execute($stmt);
        }
    }
}

// Obtener avatar actual
$query = "SELECT avatar FROM clientes WHERE username = ?";
$stmt = mysqli_prepare($connec, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

$default_avatar = 'sinavatar.jpg';
$avatar_file = basename($user['avatar'] ?? '');
$avatar_path = (!empty($avatar_file) && file_exists(__DIR__ . "/../avatars/" . $avatar_file))
    ? "../avatars/" . $avatar_file
    : "../avatars/" . $default_avatar;

$nom_usuario = $username ?: 'Usuario';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carbyte | Distribuidor de Autos</title>
    <style>
        .sidebar {
            width: 210px;
            height: calc(100vh - 60px);
            position: fixed;
            top: 70px;
            left: 0;
            background-color: #15151c;
            color: #ffffff;
            padding: 20px;
            z-index: 900;
            overflow-y: auto;
        }
        .profile {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .avatar-container {
            width: 120px;
            height: 120px;
            margin: 0 auto;
            border-radius: 50%;
            overflow: hidden;
            background-color: #34495e;
            border: 3px solid #06115b;
        }
        .avatar-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .profile h2 {
            color: #ffffff;
            font-size: 1.2rem;
            margin-bottom: 5px;
        }
        .menu-section {
            margin-top: 30px;
        }
        .menu-section h3 {
            color: #95a5a6;
            font-size: 14px;
            margin-bottom: 15px;
            padding-left: 10px;
        }
        .menu-section a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: #ffffff;
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin-bottom: 5px;
        }
        .menu-section a i {
            background: linear-gradient(45deg, #D16002, #ED9121, #CC5500);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
            font-size: 1rem;
            font-weight: 600;
            position: relative;
            transition: all 0.3s ease;
            margin-right: 10px;
        }
        .menu-section a:hover,
        .menu-section a.active {
            background-color: #34495e;
        }
        .avatar-form input[type="file"] {
            display: none;
        }
        .avatar-form label {
            display: inline-block;
            margin-top: 10px;
            padding: 5px 15px;
            background-color: #06b6d4;
            color: #fff;
            font-size: 12px;
            border-radius: 8px;
            cursor: pointer;
        }
        .avatar-form label:hover {
            background-color: #0891b2;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="profile">
            <div class="avatar-container">
                <img src="<?php echo htmlspecialchars($avatar_path); ?>" alt="Avatar Usuario">
            </div>
            <h2><?php echo htmlspecialchars($nom_usuario); ?></h2>
            <form class="avatar-form" method="POST" enctype="multipart/form-data">
                <input type="file" id="avatar" name="avatar" accept="image/*" onchange="this.form.submit()">
                <label for="avatar">Cambiar avatar</label>
            </form>
        </div>
        <div class="menu-section">
            <h3>Panel</h3>
            <a href="#"><i class="link-disebar">Inicio</i></a>
            <a href="../citas.php"><i class="link-disebar">Citas</i></a>
            <a href="#"><i class="link-disebar">Actualizar Datos</i></a>
            <a href="#"><i class="link-disebar">Compras</i></a>
        </div>
    </div>
</body>
</html>
