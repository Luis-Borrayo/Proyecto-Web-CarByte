<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toyota | Venta de Autos</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/Menu.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/ingreso.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7339621b21.js" crossorigin="anonymous"></script>
</head>
<body class="body-index">
    <?php include('barras/navbar-cliente.php')?>
    <?php include('barras/sidebar-cliente.php')?>
    <main>
        <div id= "conteItemsCarrusel">
            <div class="ItemCarrusel" id="ItemCarrusel1">
            <div class="tarjetaCarrusel" id="tarjetaCarrusel1">
                <img src="./imagenes/imagenindex/Portada.png" alt="Portada" class="img-carrusel">
            </div>
            <div class="flechaCarrusel">
                <a href="#ItemCarrusel5">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
                <a href="#ItemCarrusel2">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
                </div>
            </div>
            <div class="ItemCarrusel" id="ItemCarrusel2">
            <div class="tarjetaCarrusel" id="tarjetaCarrusel2">
                <img src="./imagenes/imagenindex/Auto1.jpg" alt="Auto1" class="img-carrusel">
            </div>
            <div class="flechaCarrusel">
                <a href="#ItemCarrusel1">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
                <a href="#ItemCarrusel3">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
                </div>
            </div>
            <div class="ItemCarrusel" id="ItemCarrusel3">
            <div class="tarjetaCarrusel" id="tarjetaCarrusel3">
                <img src="./imagenes/imagenindex/Auto2.jpg" alt="Auto2" class="img-carrusel">
            </div>
            <div class="flechaCarrusel">
                <a href="#ItemCarrusel2">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
                <a href="#ItemCarrusel4">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
                </div>
            </div>
            <div class="ItemCarrusel" id="ItemCarrusel4">
            <div class="tarjetaCarrusel" id="tarjetaCarrusel4">
                <img src="./imagenes/imagenindex/Auto3.jpg" alt="Auto3" class="img-carrusel">
            </div>
            <div class="flechaCarrusel">
                <a href="#ItemCarrusel3">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
                <a href="#ItemCarrusel5">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
                </div>
            </div>
            <div class="ItemCarrusel" id="ItemCarrusel5">
            <div class="tarjetaCarrusel" id="tarjetaCarrusel5">
                <img src="./imagenes/imagenindex/Auto4.jpg" alt="Auto4" class="img-carrusel">
            </div>
            <div class="flechaCarrusel">
                <a href="#ItemCarrusel4">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
                <a href="#ItemCarrusel1">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
                </div>
            </div>
        </div>
        <div id="contepuntos">
            <a href="#ItemCarrusel1">●</a>
            <a href="#ItemCarrusel2">●</a>
            <a href="#ItemCarrusel3">●</a>
            <a href="#ItemCarrusel4">●</a>
            <a href="#ItemCarrusel5">●</a>
        </div>
        <section id="vehiculos">
            <label class="titulo-Vehiculo">Catálogo de Vehículos</label>
            <div class="catalogo">
                <div class="vehiculo">
                    <img src="imagenes/auto1.jpg" alt="Auto 1" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Modelo Toyota 2025</h3>
                        <div class="vehiculo-botones">
                            <button>Ver detalles</button>
                            <button>Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="vehiculo">
                    <img src="imagenes/auto2.jpg" alt="Auto 2" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Modelo Toyota 2024</h3>
                        <div class="vehiculo-botones">
                            <button>Ver detalles</button>
                            <button>Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="vehiculo">
                    <img src="imagenes/auto3.jpg" alt="Auto 3" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Modelo Toyota 2024</h3>
                        <div class="vehiculo-botones">
                            <button>Ver detalles</button>
                            <button>Agregar al carrito</button>
                        </div>
                    </div>
                </div> 
                <div class="vehiculo">
                    <img src="imagenes/auto4.jpg" alt="Auto 4" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Honda Civic 2023</h3>
                        <div class="vehiculo-botones">
                            <button>Ver detalles</button>
                            <button>Agregar al carrito</button>
                        </div>
                    </div>
                </div>

                <div class="vehiculo">
                    <img src="imagenes/auto5.jpg" alt="Auto 5" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Ford Mustang 2022</h3>
                        <div class="vehiculo-botones">
                            <button>Ver detalles</button>
                            <button>Agregar al carrito</button>
                        </div>
                    </div>
                </div>

                <div class="vehiculo">
                    <img src="imagenes/auto6.jpg" alt="Auto 6" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Chevrolet Camaro 2024</h3>
                        <div class="vehiculo-botones">
                            <button>Ver detalles</button>
                            <button>Agregar al carrito</button>
                        </div>
                    </div>
                </div>

                <div class="vehiculo">
                    <img src="imagenes/auto7.jpg" alt="Auto 7" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Kia Sportage 2023</h3>
                        <div class="vehiculo-botones">
                            <button>Ver detalles</button>
                            <button>Agregar al carrito</button>
                        </div>
                    </div>
                </div>

                <div class="vehiculo">
                    <img src="imagenes/auto8.jpg" alt="Auto 8" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Nissan Altima 2024</h3>
                        <div class="vehiculo-botones">
                            <button>Ver detalles</button>
                            <button>Agregar al carrito</button>
                        </div>
                    </div>
                </div>

                <div class="vehiculo">
                    <img src="imagenes/auto9.jpg" alt="Auto 9" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>Hyundai Elantra 2025</h3>
                        <div class="vehiculo-botones">
                            <button>Ver detalles</button>
                            <button>Agregar al carrito</button>
                        </div>
                    </div>
                </div>

                <div class="vehiculo">
                    <img src="imagenes/auto10.jpg" alt="Auto 10" class="vehiculo-img">
                    <div class="vehiculo-info">
                        <h3>BMW Serie 3 2023</h3>
                        <div class="vehiculo-botones">
                            <button>Ver detalles</button>
                            <button>Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <section id="sucursales">
            <h1>Sucursales</h1>
            <div class="sucursales-container">
                <div class="sucursal">
                    <img src="imagenes/mapa_sucursales.jpg" alt="Mapa Sucursales" class="mapa-sucursales">
                    <div class="info-sucursal">
                        <h3>Sucursal Central</h3>
                        <p>Dirección: Calle Ficticia 123, Ciudad X</p>
                        <p>Teléfono: (123) 456-7890</p>
                    </div>
                </div>
                <div class="sucursal">
                    <img src="imagenes/mapa_sucursales.jpg" alt="Mapa Sucursales" class="mapa-sucursales">
                    <div class="info-sucursal">
                        <h3>Sucursal Norte</h3>
                        <p>Dirección: Avenida Imaginary 45, Ciudad Y</p>
                        <p>Teléfono: (987) 654-3210</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="accesorios">
            <h1>Accesorios</h1>
            <div class="accesorios-container">
                <div class="accesorio-card">
                    <img src="imagenes/accesorio1.jpg" alt="Accesorio 1">
                    <div class="accesorio-info">
                        <h3>Rines Deportivos</h3>
                        <p>Personaliza tu auto con estilo y resistencia.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio2.jpg" alt="Accesorio 2">
                    <div class="accesorio-info">
                        <h3>Tapicería Premium</h3>
                        <p>Mejora el confort y la elegancia interior.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio3.jpg" alt="Accesorio 3">
                    <div class="accesorio-info">
                        <h3>Alfombrilla</h3>
                        <p>Para cuidar el interior de vehiculo.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio4.jpg" alt="Accesorio 4">
                    <div class="accesorio-info">
                        <h3>Película Polarizada</h3>
                        <p>Protección solar y privacidad para tu vehículo.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio5.jpg" alt="Accesorio 5">
                    <div class="accesorio-info">
                        <h3>Sensores de Reversa</h3>
                        <p>Mayor seguridad al estacionarte.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio6.jpg" alt="Accesorio 6">
                    <div class="accesorio-info">
                        <h3>Sistema de Navegación GPS</h3>
                        <p>Llega a tu destino sin perderte.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio7.jpg" alt="Accesorio 7">
                    <div class="accesorio-info">
                        <h3>Portabicicletas</h3>
                        <p>Ideal para tus viajes y aventuras al aire libre.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio8.jpg" alt="Accesorio 8">
                    <div class="accesorio-info">
                        <h3>Cargador Inalámbrico</h3>
                        <p>Recarga tu celular sin cables mientras conduces.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio9.jpg" alt="Accesorio 9">
                    <div class="accesorio-info">
                        <h3>Fundas para Asientos</h3>
                        <p>Protege y renueva el interior de tu auto.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
                <div class="accesorio-card">
                    <img src="imagenes/accesorio10.jpg" alt="Accesorio 10">
                    <div class="accesorio-info">
                        <h3>Protector de Cajuela</h3>
                        <p>Mantén limpia y ordenada la cajuela de tu auto.</p>
                        <button>Agregar al carrito</button>
                    </div>
                </div>
                <div style="text-align: center; margin-top: 20px;">
    <a href="accesorios.php" class="btn-ver-mas">Ver más accesorios</a>
</div>

            </div>
        </section>
        
        <section id="contacto">
            <h1>Contáctanos</h1>
            <form class="form-contacto" method="post" action="#">
                <div class="form-group">
                    <label for="usuario">Nombre de Usuario</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>
                <div class="form-group">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" id="correo" name="correo" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" required>
                </div>
                <div class="form-group">
                    <label for="asunto">Asunto</label>
                    <input type="text" id="asunto" name="asunto" required>
                </div>
                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn-enviar">Enviar</button>
            </form>
        </section>

    </main>

    <script src="js/Menu.js"></script>
    <script>
        const navbar = document.querySelector('.navbar');
        let lastScrollTop = 0;

        window.addEventListener('scroll', function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > lastScrollTop) {
                // Scrolling down
                navbar.classList.add('navbar-hidden');
            } else {
                // Scrolling up
                navbar.classList.remove('navbar-hidden');
            }
            lastScrollTop = scrollTop;
        });
    </script>
</body>
</html>