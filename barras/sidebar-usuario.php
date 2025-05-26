<?php 
// Iniciar sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está logueado
if (!isset($_SESSION['id'])) {
    header('Location: ../login.php');
    exit;
}

include(__DIR__ . "/../conexion.php");

// Obtener ID de usuario de la sesión
$id = $_SESSION['id'];
$default_avatar = '../assets/images/default-avatar.jpg';

// Consulta preparada
$sql = "SELECT username, avatar FROM usuario WHERE Id1 = ?";
$stmt = $connec->prepare($sql);

if (!$stmt) {
    die("Error en la preparación de la consulta: " . $connec->error);
}

$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

if (!$usuario) {
    echo "Usuario no encontrado.";
    exit;
}

// Procesar actualización de avatar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    
    // Validaciones
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $max_size = 2 * 1024 * 1024; // 2MB
    
    if ($avatar['error'] === UPLOAD_ERR_OK && 
        in_array($avatar['type'], $allowed_types) && 
        $avatar['size'] <= $max_size) {
        
        // Generar nombre único
        $ext = pathinfo($avatar['name'], PATHINFO_EXTENSION);
        $new_filename = uniqid('avatar_') . '.' . $ext;
        $upload_path = __DIR__ . '/../avatars/' . $new_filename;
        
        // Mover archivo
        if (move_uploaded_file($avatar['tmp_name'], $upload_path)) {
            // Eliminar avatar anterior si existe
            if (!empty($usuario['avatar']) && file_exists(__DIR__ . '/../' . $usuario['avatar'])) {
                unlink(__DIR__ . '/../' . $usuario['avatar']);
            }
            
            // Actualizar en BD
            $new_avatar_path = 'avatars/' . $new_filename;
            $update_sql = "UPDATE usuario SET avatar = ? WHERE Id1 = ?";
            $update_stmt = $connec->prepare($update_sql);
            $update_stmt->bind_param("si", $new_avatar_path, $id);
            $update_stmt->execute();
            
            // Actualizar variable para mostrar
            $usuario['avatar'] = $new_avatar_path;
        }
    }
}

// Establecer ruta del avatar
$avatar_path = !empty($usuario['avatar']) && file_exists(__DIR__ . '/../' . $usuario['avatar']) 
    ? '../' . $usuario['avatar'] 
    : $default_avatar;
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
        .sidebar.collapsed .link-disebar,
        .sidebar.collapsed .profile,
        .sidebar.collapsed .titlesidebar {
        display: none;
        }
        .sidebar.collapsed {
        width: 70px;
        }
        .toggle-btn{
    display: flex;
    justify-content: flex-end;
    align-items: center;
    height: 50px;
    cursor: pointer;
        }
        .sidebar.collapsed .menu-section a {
        margin-bottom: 20px; /* Ajusta el valor según necesites */
        justify-content: center; /* Centra el ícono si ya no hay texto */
        }
    </style>
    <script src="https://kit.fontawesome.com/7339621b21.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="toggle-btn" id="toggleBtn"><i class="fa-solid fa-bars"></i></div>
        <div class="profile">
            <div class="avatar-container">
                <img src="<?php echo htmlspecialchars($avatar_path); ?>" 
                     alt="Avatar de <?php echo htmlspecialchars($usuario['username']); ?>"
                     onerror="this.src='<?php echo htmlspecialchars($default_avatar); ?>'">
            </div>
            <h2 class="info-group"><?php echo htmlspecialchars($usuario['username']); ?></h2>
            <form class="avatar-form" method="POST" enctype="multipart/form-data">
                <input type="file" id="avatar" name="avatar" accept="image/*" onchange="this.form.submit()">
                <label for="avatar">Cambiar avatar</label>
            </form>
        </div>
        <div class="menu-section">
            <h3 class="titlesidebar">Panel</h3>
            <a href="../index.php"><i class="fa-solid fa-house"></i><span class="link-disebar">Inicio</span></a>
            <a href="../citas.php"><i class="fa-solid fa-calendar-days"></i><span class="link-disebar">Dashboardd</span></a>
            <a href="#"><i class="fa-solid fa-pen-to-square"></i><span class="link-disebar">Administrar usuario</span></a>
            <a href="#"><i class="fa-solid fa-shop"></i><span class="link-disebar">administrar cliente</span></a>
        </div>
    </div>
<script>
const toggleBtn = document.getElementById('toggleBtn');
const sidebar = document.getElementById('sidebar');

toggleBtn.addEventListener('click', () => {
  sidebar.classList.toggle('collapsed');
});
</script>

</body>
</html>
