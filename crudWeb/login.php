<div class="login-container">   
    <div>
        <img src="imagenes/CarByte.png" alt="logo_toyota">
    </div>
    <label class="titulo">Iniciar sesión Administrador</label>
    <form method="POST" action="crudWeb/procesar_login.php">
        <div class="login-group">
        <label class="txt-login">Ingrese nombre de usuario:</label>
        <input type="text" name="username" id="username" class="textbox-login" placeholder="Nombre de usuario" required>
        </div>
        <div class="login-group">
        <label class="txt-login">Ingrese Codigo:</label>
        <input type="text" name="cod" id="cod" class="textbox-login" placeholder="Codigo" required>
        </div>
        <div class="login-group">
        <label class="txt-login">Ingrese contraseña:</label>
        <input type="password" name="pass" id="pass" class="textbox-login" placeholder="Contraseña" required>
        </div>
        <div class="check-login">
        <div>
            <label class="txt-login" for="check">
            <input type="checkbox" name="mostrs-pass"id="check-ver" onclick="mostrarpass()"> 
            Mostrar contraseña</label>
        </div>
        <div>
            <label class="txt-login" for="check">
            <input type="checkbox" name="check" id="check-remenber" onclick="recordarusuario()">
            Recordar usuario</label>
        </div>
        </div>
        <div>
            <button type="submit" name="ingresar" id="ingresar" class="ingresar">Ingresar</button>
            <a href="#" class="btn-cancelar" onclick="cerrarModal()">Cancelar</a>
        </div>
    </form>
</div>

<script>
    function mostrarpass() {
    var passInput = document.getElementById("pass");
    var checkBox = document.getElementById("check-ver");
    if (checkBox.checked) {
        passInput.type = "text";
    } else {
        passInput.type = "password";
    }
    }
        function cerrarModal() {
        const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
            modal.style.display = 'none';
        });
    }
</script>