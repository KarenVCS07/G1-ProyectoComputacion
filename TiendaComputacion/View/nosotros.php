<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Sobre Nosotros</title>
</head>

<body>

    <!-- Header con menú de navegación -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <!-- Nombre de la empresa pegado a la izquierda -->
                <a class="navbar-brand font-weight-bold" href="index.html">Empresa X</a>

                <!-- Botón para dispositivos móviles -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menú de navegación centrado -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="catalogo.php">Catalogo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="nosotros.php">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="soporte.php">Soporte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="condiciones.php">Terminos y Condiciones</a>
                        </li>
                    </ul>

                    <!-- Botones de inicio de sesión y registro pegados a la derecha -->
                    <div class="ml-auto">
                    <?php if (isset($_SESSION['user_id'])): ?>
                            <a href="carrito.php" class="btn btn-outline-secondary mr-3">Mi Carrito</a>
                            <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin'): ?>
                            <a href="paneladm.php" class="btn btn-outline-primary mr-2">Admin</a>
                        <?php endif; ?>
                            <a href="logout.php" class="btn btn-outline-danger">Cerrar Sesión</a>
                        <?php else: ?>
                            <a href="login.php" class="btn btn-outline-primary mr-2">Iniciar sesión</a>
                            <a href="registro.php" class="btn btn-primary">Registrarse</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <body>

        <!-- Sección Nosotros -->
        <section class="container my-5">
            <h1 class=" text-primary mb-4">Quiénes Somos</h1>
            <p class="lead text-justify">
                Somos una tienda especializada en artículos de computación y tecnología, dedicada a ofrecer soluciones
                tecnológicas de última generación. Con un enfoque en la calidad del servicio y el conocimiento de
                nuestros empleados, buscamos satisfacer las necesidades de nuestros clientes proporcionando productos y
                servicios de alta calidad. Nos esforzamos en mejorar la experiencia del cliente tanto en la tienda
                física como a través de una plataforma en línea moderna e intuitiva.
            </p>
        </section>

        <!-- Sección Servicios -->
        <section class="container my-5">
            <h2 class="text-primary mb-4">Nuestros Servicios</h2>
            <ul class="list-group">
                <li class="list-group-item">Venta de artículos informáticos</li>
                <li class="list-group-item">Ensamblaje de computadoras</li>
                <li class="list-group-item">Revisión y mantenimiento</li>
                <li class="list-group-item">Asesoría técnica</li>
            </ul>
        </section>

        <!-- Sección Por Qué Visitarnos -->
        <section class="container my-5">
            <h2 class="text-primary mb-4">¿Por Qué Elegirnos?</h2>
            <p class="lead text-justify">
                En un mercado tan competitivo y en constante evolución, sabemos que nuestros clientes buscan no solo
                calidad en los productos sino también una atención personalizada y eficiente. Con nuestra plataforma en
                línea y tienda física, ofrecemos un acceso fácil a información detallada, productos actualizados, y
                servicios personalizados. Nuestra misión es convertirnos en su socio de confianza para todas sus
                necesidades tecnológicas, proporcionando una experiencia de compra ágil, moderna y segura.
            </p>
        </section>

        <section class="container my-5">
            <h2 class="text-center text-primary mb-4">Nuestro Equipo</h2>
            <div id="teamCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <!-- Persona 1 -->
                    <div class="carousel-item active text-center">
                        <img src="https://png.pngtree.com/png-clipart/20231109/original/pngtree-programmer-it-developer-png-image_13520483.png"
                            class="rounded-circle mb-3" alt="Desarrollador 1" style="width: 150px; height: 150px;">
                        <h5>Sebastian Araya Gómez</h5>
                        <p>Desarrollador/Técnico</p>
                    </div>
                    <!-- Persona 2 -->
                    <div class="carousel-item text-center">
                        <img src="https://img.freepik.com/vector-gratis/linda-chica-hacker-operando-laptop-dibujos-animados-vector-icono-ilustracion-personas-tecnologia-aislada-plana_138676-9487.jpg"
                            class="rounded-circle mb-3" alt="Desarrollador 2" style="width: 150px; height: 150px;">
                        <h5>Valeria Camacho Santamaria</h5>
                        <p>Desarrolladora</p>
                    </div>
                    <!-- Persona 3 -->
                    <div class="carousel-item text-center">
                        <img src="https://img.freepik.com/vector-premium/desarrollador-software-profesional-codificacion-multiples-lenguajes-computadora_1323048-62836.jpg"
                            class="rounded-circle mb-3" alt="Desarrollador 3" style="width: 150px; height: 150px;">
                        <h5>Diego Herrera Jara</h5>
                        <p>Desarrollador</p>
                    </div>
                    <!-- Persona 4 -->
                    <div class="carousel-item text-center">
                        <img src="https://png.pngtree.com/png-vector/20230728/ourlarge/pngtree-programmer-clipart-developer-sitting-behind-his-computer-in-glasses-cartoon-vector-png-image_6815441.png"
                            class="rounded-circle mb-3" alt="Desarrollador 4" style="width: 150px; height: 150px;">
                        <h5>Eddier Soto Vargas</h5>
                        <p>Desarrollador</p>
                    </div>
                </div>
                <!-- Controles del carrusel -->
                <a class="carousel-control-prev" href="#teamCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#teamCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-dark text-white py-4 mt-5">
            <div class="container text-center">
                <p>&copy; Empresa X, Derechos Reservados 2024</p>
                <div class="my-3">
                    <!-- Íconos de redes sociales -->
                    <a href="#" class="text-white mx-2" aria-label="X"><i class="fab fa-x-twitter"></i></a>
                    <a href="#" class="text-white mx-2" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-white mx-2" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
                <p class="mb-0">Teléfono: +506 4567 7890 | Correo: contacto@empresa.com</p>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

</body>