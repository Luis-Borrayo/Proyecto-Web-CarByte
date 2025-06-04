<?php
session_start();
include("../conexion.php");

if(!isset($_SESSION['id'])){
    header('Location: ..login-cliente.php');
    exit();
}

$id = $_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
</head>
<body>
    <div>
        <h2>Editar Perfil</h2>
        <div class="avatar-container">
                <img src="<?php echo htmlspecialchars($avatar_path); ?>" 
                     alt="Avatar de <?php echo htmlspecialchars($cliente['username']); ?>"
                     onerror="this.src='<?php echo htmlspecialchars($default_avatar); ?>'">
            </div>
        <form action="">
        <div>
            <label for="">Cambiar avatar</label>
            <input type="file" id="avatar" name="avatar" accept="image/*" onchange="this.form.submit()">
        </div>
        <div>
            <label for="">Usuario</label>
            <input type="text" id="user" name="user" value="" required>
        </div>
        <div>
            <label for="">Nombre Completo</label>
            <input type="text" id="nombre" name="nombre" value="" required>
        </div>
        <div>
            <label for="">Contraseña</label>
            <input type="password" id="pass" name="pass" value="" required>
        </div>
        <div>
            <button>Actualizar</button>
            <a href="">Cancelar</a>
        </div>
        </form>
    </div>
</body>
</html>