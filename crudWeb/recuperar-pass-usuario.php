<div class="login-container">
    <h2 class="titulo">Recuperar contraseña</h2>
    <form action="crudWeb/procesar-recuperar-passuser.php" method="POST">
        <div class="login-group">
            <label for="" class="txt-login">Usuario</label>
            <input type="text" name="user" class="textbox-login" placeholder="Usuario" required>
        </div>
        <div class="login-group">
            <label for="" class="txt-login">Nombre completo</label>
            <input type="text" name="nombre" class="textbox-login" placeholder="Nombre Completo" required>
        </div>
        <div class="login-group">
            <label for="" class="txt-login">Código de seguridad</label>
            <input type="text" name="cod_seguridad" class="textbox-login" placeholder="Código" required>
        </div>
        <div class="login-group">
            <label for="" class="txt-login">Nueva contraseña</label>
            <input type="password" name="pass" class="textbox-login"placeholder="Contraseña" required>
        </div>
        <div class="login-group">
            <button type="submit" class="actualizar">Actualizar</button>
            <a href="#" class="cancelaract" onclick="mostrarLoginUserDesdeRecuperar(); return false;">Cancelar</a>
        </div>
    </form>
</div>