<?php include('header.php'); ?>
<link rel="stylesheet" href="./css/styles.css">
<section id="usuario">
    <div class="usuario-container">
        <h1>Gestión de Usuario</h1>
        <div class="usuario-acciones">
            <div class="login">
                <h2>Iniciar Sesión</h2>
                <form method="post" action="#">
                    <input type="text" name="login_usuario" placeholder="Usuario" required>
                    <input type="password" name="login_contrasena" placeholder="Contraseña" required>
                    <button type="submit">Entrar</button>
                </form>
            </div>

            <div class="registro">
                <h2>Registrarse</h2>
                <form method="post" action="#">
                    <input type="text" name="registro_usuario" placeholder="Usuario" required>
                    <input type="email" name="registro_correo" placeholder="Correo Electrónico" required>
                    <input type="tel" name="registro_telefono" placeholder="Teléfono" required>
                    <input type="password" name="registro_contrasena" placeholder="Contraseña" required>
                    <button type="submit">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>
