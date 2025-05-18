<div class="registro-container">
    <div class="login-container">
        <label class="titulo">Registro de Usuario</label>
        <form method="POST" action="crudWeb/procesar_registro.php">
            <label class="txt-login">Ingrese nombre de usuario:</label>
            <input type="text" name="user" class="textbox-login" placeholder="Nombre de usuario" required>
            <label class="txt-login">Ingrese su nombre completo:</label>
            <input type="text" name="nom" class="textbox-login" placeholder="Nombre completo" required>
            <label class="txt-login">Ingrese contraseña:</label>
            <input type="password" class="textbox-login" name="pass" id="regpass" placeholder="Contraseña" required>
            <label class="txt-login">Confirmar contraseña</label>
            <input type="password" class="textbox-login" name="confirm_pass" id="regpassconfirm" placeholder="Confirmar contraseña" required>
                <div class="check-login">
                    <label for="showRegPass" class="txt-login">
                    <input type="checkbox" id="showRegPass" onclick="mostrarContrasena()">
                    Mostrar contraseñas</label>
                </div>
            <div class="botones">
                <button type="submit" name="registro" class="ingresar">Registrar</button>
                <a href="#" class="ingresar" onclick="cerrarModal()">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<script>
    function mostrarContrasena(){
        const pass = document.getElementById("regpass");
        const confirmpass = document.getElementById("regpassconfirm");
        const tipo = pass.type === "password" ? "text" : "password";
        pass.type = tipo;
        confirmpass.type = tipo;
    }
</script>
