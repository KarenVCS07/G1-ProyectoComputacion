<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2-beta3/css/all.min.css">
    <title>Index</title>
</head>

<body>

    <!-- Header con menú de navegación -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <!-- Nombre de la empresa pegado a la izquierda -->
                <a class="navbar-brand font-weight-bold" href="#">Empresa X</a>

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

    <!-- Barra de búsqueda -->
    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar productos..."
                            aria-label="Buscar productos">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Encabezado principal con fondo -->
    <div class="container-fluid text-white text-start py-5"
        style="background: url('https://img.freepik.com/vector-gratis/fondo-escritorio-moderno-vector-diseno-azul-geometrico_53876-135923.jpg?t=st=1734670015~exp=1734673615~hmac=856636e3a1c717feae9a689407f11b88809a0857b508994e2975aa0d82505508&w=1060') no-repeat center center; background-size: cover; height: 100vh;">
        <div class="row align-items-center h-100">
            <div class="col-md-6 ms-md-5">
                <h1 class="display-4 fw-bold">Súper precios en tus artículos favoritos</h1>
                <p class="lead">Gana más por tu dinero.</p>
                <a href="productos.html" class="btn btn-primary btn-lg mt-3">Comprar ahora</a>
            </div>
        </div>
    </div>

    <!-- Categorías -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Comprar por categoría</h2>
        <div class="row text-center g-5">
            <!-- Fila 1 -->
            <div class="col-12 col-md-4">
                <div class="rounded-circle bg-light p-4 mx-auto" style="width: 150px; height: 150px;">
                    <img src="https://www.larepublica.net/storage/images/2021/01/22/20210122145019.computadoras.x2.jpg"
                        alt="Computadoras" class="img-fluid" style="width: 120px; height: 100px; object-fit: cover;">
                </div>
                <p class="mt-3 fs-5">Computadoras</p>
            </div>
            <div class="col-12 col-md-4">
                <div class="rounded-circle bg-light p-4 mx-auto" style="width: 150px; height: 150px;">
                    <img src="https://telefonica.cl/wp-content/uploads/sites/11/2023/12/2N5A2259-Enhanced-NR.jpg?w=1224&h=673&crop=1"
                        alt="Computadoras" class="img-fluid" style="width: 120px; height: 100px; object-fit: cover;">
                </div>
                <p class="mt-3 fs-5">Celulares</p>
            </div>

            <div class="col-12 col-md-4">
                <div class="rounded-circle bg-light p-4 mx-auto" style="width: 150px; height: 150px;">
                    <img src="https://selectsound.com.mx/cdn/shop/files/audifonos-inalambricos-bluetooth-manos-libres-sense-bth028-401895_1080x1080.jpg?v=1717819739"
                        alt="Computadoras" class="img-fluid" style="width: 120px; height: 100px; object-fit: cover;">
                </div>
                <p class="mt-3 fs-5">Audifonos</p>
            </div>
            <!-- Fila 2 -->
            <div class="col-12 col-md-4">
                <div class="rounded-circle bg-light p-4 mx-auto" style="width: 150px; height: 150px;">
                    <img src="https://ocelot.com.mx/wp-content/uploads/2023/04/teclado-mecanico-switch-rojo-1024x677.jpg"
                        alt="Computadoras" class="img-fluid" style="width: 120px; height: 100px; object-fit: cover;">
                </div>
                <p class="mt-3 fs-5">Teclados</p>
            </div>
            <div class="col-12 col-md-4">
                <div class="rounded-circle bg-light p-4 mx-auto" style="width: 150px; height: 150px;">
                    <img src="https://componentegamer.com/wp-content/uploads/2023/10/Diferentes-estilos-de-mouse-gamers-iluminados-con-RGB-1024x585.jpg"
                        alt="Computadoras" class="img-fluid" style="width: 120px; height: 100px; object-fit: cover;">
                </div>
                <p class="mt-3 fs-5">Mause</p>
            </div>
            <div class="col-12 col-md-4">
                <div class="rounded-circle bg-light p-4 mx-auto" style="width: 150px; height: 150px;">
                    <img src="https://hiraoka.com.pe/media/mageplaza/blog/post/m/e/mejores_parlantes_bluetooth.jpg"
                        alt="Computadoras" class="img-fluid" style="width: 120px; height: 100px; object-fit: cover;">
                </div>
                <p class="mt-3 fs-5">Parlantes</p>
            </div>
        </div>
    </div>

    <!-- Ofertas -->
    <div class="container my-5">
        <div class="row g-5">
            <div class="col-md-6">
                <div class="card text-white "
                    style="background: url('https://img.pikbest.com/wp/202346/wireless-mouse-spray-colored-background-enhances-3d-rendered_9631182.jpg!w700wp') no-repeat center center; background-size: cover; height: 750px;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h3 class="card-title display-6 fw-bold">Ofertas de temporada</h3>
                            <p class="card-text fs-5">compra un mause y otro tendra hasta 70% menos </p>
                        </div>
                        <a href="ofertas.html" class="btn btn-light btn-lg align-self-start">Ofertas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white "
                    style="background: url('https://img.freepik.com/fotos-premium/imagen-plana-auriculares-inalambricos-vista-superior-fondo-rojo-diseno-color-solido-d-ilustracion_185991-381.jpg') no-repeat center center; background-size: cover; height: 750px;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h3 class="card-title display-6 fw-bold">Hasta 30% menos en Audifonos seleccionados</h3>
                            <p class="card-text fs-5">Descuento solo por tiempo limitado.</p>
                        </div>
                        <a href="ofertas.html" class="btn btn-light btn-lg align-self-start">Ofertas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-3">
        <div class="container text-center">
            <p class="mb-0">© 2024 Empresa X. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>