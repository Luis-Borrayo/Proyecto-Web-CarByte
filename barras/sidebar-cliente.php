<?php
// Iniciar sesión y conexión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once(__DIR__ . "/../conexion.php");

// Procesar subida de avatar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
    $username = $_SESSION['username'] ?? '';
    if ($username !== '') {
        $avatar = $_FILES['avatar'];
        
        // Validaciones
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $max_size = 2 * 1024 * 1024; // 2MB
        
        if ($avatar['error'] === 0 && 
            in_array($avatar['type'], $allowed_types) && 
            $avatar['size'] <= $max_size) {
            
            // Obtener avatar actual para eliminarlo después
            $query = "SELECT avatar FROM usuario WHERE username = ?";
            $stmt = mysqli_prepare($connec, $query);
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $old_avatar = mysqli_fetch_assoc($result)['avatar'] ?? '';
            
            // Generar nombre único
            $ext = strtolower(pathinfo($avatar['name'], PATHINFO_EXTENSION));
            $file_name = uniqid('avatar_') . '.' . $ext;
            $upload_path = __DIR__ . "/../avatars/" . $file_name;
            
            // Mover el archivo y actualizar BD
            if (move_uploaded_file($avatar['tmp_name'], $upload_path)) {
                // Eliminar avatar anterior (si existe y no es el default)
                if (!empty($old_avatar) && file_exists(__DIR__ . "/../" . $old_avatar)) {
                    unlink(__DIR__ . "/../" . $old_avatar);
                }
                
                // Actualizar BD
                $new_avatar_path = "avatars/" . $file_name;
                $query = "UPDATE usuario SET avatar = ? WHERE username = ?";
                $stmt = mysqli_prepare($connec, $query);
                mysqli_stmt_bind_param($stmt, "ss", $new_avatar_path, $username);
                mysqli_stmt_execute($stmt);
                
                // Actualizar variable para mostrar inmediatamente
                $avatar_path = "../" . $new_avatar_path;
            }
        }
    }
}

// Obtener información del usuario
$username = $_SESSION['username'] ?? '';
$default_avatar = '1744068538_foto para curriculum 3.png';
$avatar_path = "../avatars/" . $default_avatar;
$nom_usuario = $username ?: 'Usuario';

if ($username !== '') {
    $query = "SELECT avatar FROM usuario WHERE username = ?";
    $stmt = mysqli_prepare($connec, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    
    if (!empty($user['avatar']) && file_exists(__DIR__ . "/../" . $user['avatar'])) {
        $avatar_path = "../" . $user['avatar'];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/barra_lateral.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        .sidebar.collapsed .link-disebar,
        .sidebar.collapsed .profile,
        .sidebar.collapsed .titlesidebar {
            display: none;
        }
        .sidebar.collapsed {
            width: 70px;
        }
        .toggle-btn {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 50px;
            cursor: pointer;
        }
        .sidebar.collapsed .menu-section a {
            margin-bottom: 20px;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="toggle-btn" id="toggleBtn"><i class="fa-solid fa-bars"></i></div>
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
            <h3 class="titlesidebar">Panel</h3>
            <a href="../index.php"><i class="fa-solid fa-house"></i><span class="link-disebar">Inicio</span></a>
            <a href="../citas.php"><i class="fa-solid fa-calendar-days"></i><span class="link-disebar">Citas</span></a>
            <a href="#"><i class="fa-solid fa-pen-to-square"></i><span class="link-disebar">Actualizar Perfil</span></a>
            <a href="#"><i class="fa-solid fa-shop"></i><span class="link-disebar">Compras</span></a>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/7339621b21.js" crossorigin="anonymous"></script>
    <script>
    const toggleBtn = document.getElementById('toggleBtn');
    const sidebar = document.getElementById('sidebar');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
    });
    </script>
</body>
</html>