<?php
session_start();
include '../config/db_connect.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../View/assets/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="sidebar bg-dark col-md-2">
                <h2 class="text-center">Opciones</h2>
                <a class="nav-link <?php echo $page === 'dashboard' ? 'active' : ''; ?>" href="?page=paneladm">
                    <i class="fas fa-chart-line"></i> Panel Administrativo
                </a>
                <a class="nav-link <?php echo $page === 'gestion_productos' ? 'active' : ''; ?>" href="?page=gestion_productos">
                    <i class="fas fa-tools"></i> Gestión de Productos
                </a>
                <a class="nav-link <?php echo $page === 'gestion_usuarios' ? 'active' : ''; ?>" href="?page=gestion_usuarios">
                    <i class="fas fa-user-cog"></i> Gestión de Usuarios
                </a>
                <a href="login.php?action=logout">
                    <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
                </a>
            </nav>

            <!-- Main content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div id="content-area">
                    <?php
                switch ($page) {
                    case 'gestion_productos':
                        include 'gestion_productos.php';
                        break;
                    case 'gestion_usuarios':
                        include 'gestion_usuarios.php';
                        break;
                    default:
                        echo '<h1>Bienvenido al Panel Administrativo</h1>', '<p>Selecciona una opción del menú para comenzar.</p>';
                        break;
                }
                ?>
                </div>
                  <div>
                    
                  </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            // Cargar gestión de productos
            $('#gestion-productos').on('click', function (e) {
                e.preventDefault();
                $('#content-area').load('gestion_productos.php');
            });

            // Cargar gestión de usuarios
            $('#gestion-usuarios').on('click', function (e) {
                e.preventDefault();
                $('#content-area').load('gestion_usuarios.php');
            });
        });
    </script>
</body>

</html>