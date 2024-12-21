<?php
session_start();
include '../config/db_connect.php';
$stmt = $conn->query("SELECT * FROM producto WHERE activo = 1");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2-beta3/css/all.min.css">
    <title>Catálogo de Productos</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand font-weight-bold" href="index.php">Tienda</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
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

    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar productos..." aria-label="Buscar productos">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="container my-5">
    <div class="container my-5">
        <h1>Catálogo de Productos</h1>
        <div class="row">
            <?php foreach ($productos as $producto): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <?php if (!empty($producto['ruta_imagen'])): ?>
                            <img src="<?php echo $producto['ruta_imagen']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($producto['descripcion']); ?>">
                        <?php else: ?>
                            <img src="placeholder.jpg" class="card-img-top" alt="Sin imagen disponible">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($producto['descripcion']); ?></h5>
                            <p class="card-text">Detalle: <?php echo htmlspecialchars($producto['detalle']); ?></p>
                            <p class="card-text">Precio: $<?php echo number_format($producto['precio'], 2); ?></p>
                        </div>
                        <div class="card-footer">
                            <form action="carrito.php" method="POST">
                                <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                                <input type="hidden" name="nombre" value="<?php echo htmlspecialchars($producto['descripcion']); ?>">
                                <input type="hidden" name="precio" value="<?php echo $producto['precio']; ?>">
                                <button type="submit" name="action" value="add_to_cart" class="btn btn-primary">Agregar al carrito</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </section>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p>&copy; Tienda Tecnológica 2024. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>