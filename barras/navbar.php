<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbyte | Distribuidor de Autos</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/Menu.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/ingreso.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            margin-top: 110px;
            }
            .logo-text {
        font-size: 2rem;
        font-weight: bold;
        color: #ffffff;
}
    </style>

</head>
<body>
    <header class="navbar">
        <div class="logo-container">
            <img src="/Proyecto-Web-CarByte/imagenes/CarByte.png" alt="Logo Toyota" class="logo-img">
            <span class="logo-text">CarByte</span>
        </div>
        <nav class="nav-links">
            <a href="./index.php" class="navbarlinka">Inicio</a>
            <a href="Mision.php" class="navbarlinka">Mision</a>
            <a href="Vision.php" class="navbarlinka">Vision</a>
            <a href="accesorios.php" class="navbarlinka">Productos</a>
            <a href="contacto.php" class="navbarlinka">Contacto</a>
            <a href="citas.php" class="navbarlinka">Citas</a>

            <div class="user-menu dropdown">
                <?php if (isset($_SESSION['username'])): ?>
                    <a class="dropdown-trigger" href="#">
                        <span class="welcome-text">Bienvenido: <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    </a>
                    <ul class="dropdown-content">
                        <li class="logmenu">
                            <a href="perfil.php" class="navbarlinka">
                                <i class="material-icons">person</i> Mi Perfil
                            </a>
                        </li>
                        <li class="logmenu">
                            <a href="mis_pedidos.php" class="navbarlinka">
                                <i class="material-icons">shopping_cart</i> Mis Pedidos
                            </a>
                        </li>
                        <li class="logmenu">
                            <a href="crudWeb/logout.php" class="navbarlinka" onclick="return confirm('¿Desea cerrar sesión?')">
                                <i class="material-icons">logout</i> Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                <?php else: ?>
                    <a class="dropdown-trigger" href="#">
                        <i class="material-icons">account_circle</i>
                    </a>
                <ul class="dropdown-content">
                    <li class="logmenu">
                        <a href="#" class="btn-modal" data-modal-target="modalLogin">
                        <i class="material-icons">login</i> Iniciar Sesión
                        </a>
                    </li>
                    <li class="logmenu">
                        <a href="#" class="btn-modal" data-modal-target="modalLogin-usuario">
                        <i class="material-icons">login</i> Ingresar como administrador
                        </a>
                    </li>
                    <li class="logmenu">
                        <a href="#" class="btn-modal" data-modal-target="modalRegistro">
                        <i class="material-icons">person_add</i> Registrarse
                        </a>
                    </li>
                    
                </ul>

            <div id="modalLogin" class="modal">
                <div class="modal-content">
                    <span class="close-btn" onclick="cerrarModal()">✖</span>
                    <?php include('crudWeb/login-cliente.php'); ?>
                </div>
            </div>  
            <div id="modalLogin-usuario" class="modal">
                <div class="modal-content">
                    <span class="close-btn" onclick="cerrarModal()">✖</span>
                    <?php include('crudWeb/login.php'); ?>
                </div>
            </div> 
            <div id="modalRegistro" class="modal">
                <div class="modal-content">
                    <span class="close-btn" onclick="cerrarModal()">✖</span>
                    <?php include('crudWeb/registro.php'); ?>
                </div>
            </div>
            <div id="modalRecuperar" class="modal">
                <div class="modal-content">
                    <span class="close-btn" onclick="cerrarModal()">✖</span>
                    <?php include('crudWeb/recuperar-pass.php'); ?>
                </div>
            </div>
            <div id="modalRecuperaruser" class="modal">
                <div class="modal-content">
                    <span class="close-btn" onclick="cerrarModal()">✖</span>
                    <?php include('crudWeb/recuperar-pass-usuario.php'); ?>
                </div>
            </div>

<script>
    function bloquearscroll(){
        document.body.style.overflow='hidden';
    }

    function habilitarscroll(){
        document.body.style.overflow='';
    }

    document.addEventListener('DOMContentLoaded', function() {
        const btnsModal = document.querySelectorAll('.btn-modal');
        btnsModal.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const modalId = btn.getAttribute('data-modal-target');
                document.getElementById(modalId).style.display = 'flex';
                bloquearscroll();
            });
        });

        const closeBtns = document.querySelectorAll('.close-btn');
        closeBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const modal = btn.closest('.modal');
                modal.style.display = 'none';
                habilitarscroll();
            });
        });

        window.addEventListener('click', (e) => {
            if (e.target.classList.contains('modal')) {
                e.target.style.display = 'none';
                habilitarscroll();
            }
        });
    });

    function cerrarModal() {
        const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
            modal.style.display = 'none';
            habilitarscroll();
        });
    }

    function mostrarLoginDesdeRecuperar() {
    document.getElementById('modalRecuperar').style.display = 'none';
    document.getElementById('modalLogin').style.display = 'flex';
    }
    
    function mostrarLoginUserDesdeRecuperar() {
    document.getElementById('modalRecuperaruser').style.display = 'none';
    document.getElementById('modalLogin-usuario').style.display = 'flex';
    }
</script>
                <?php endif; ?>
            </div>
        </nav>
    </header>