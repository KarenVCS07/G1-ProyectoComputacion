<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Condiciones</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand font-weight-bold" href="index.html">Empresa X</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

    <!-- Sección de Términos y Condiciones -->
    <section class="container my-5">
        <h1 class="text-center display-4">Términos y Condiciones de Uso del Sitio Web de Empresa X</h1>
        <p>Empresa X es una compañía costarricense dedicada a la comercialización de productos tecnológicos en línea. Al utilizar este sitio web, el usuario declara haber leído y aceptado estos términos y se compromete a cumplir con todas las políticas y lineamientos establecidos en este contrato. En caso de no estar de acuerdo, el usuario no debe utilizar el sitio.</p>
        
        <h2 class="h4">Definiciones</h2>
        <p><strong>Empresa X:</strong> Sitio web de venta en línea de productos electrónicos.</p>
        <p><strong>Usuario:</strong> Persona mayor de edad que utiliza el sitio web y/o realiza una compra. Se asume que el usuario tiene capacidad legal para realizar transacciones en línea.</p>
        <p><strong>Producto:</strong> Artículos electrónicos que se encuentran a la venta a través del sitio web de Empresa X.</p>

        <h2 class="h4">Registro de Cuenta</h2>
        <p>El registro es gratuito.El usuario debe de registrarse teniendo mínimo dieciocho (18) años de edad para poder aceptar el contrato, por lo cual debe de crear una cuenta donde dara información personal real y actualizada.Esta cuenta es personal e intransferible.Empresa X tomará valida la información y con base en estos datos se notificará y entregará los productos que el usuario compre por el sitio web.Además el usuario es responsable a actualizar sus datos cuando sea necesario y mantendrá la confidencialidad de la cuenta.</p>

        <h2 class="h4">Proceso de Compra y Pago</h2>
        <p>Al comprar un producto, el usuario pagara el precio publicado y, en su caso los cargos adicionales de envío.El usuario acepta la forma de pago y los procedimientos establecidos por Empresa X para adquirir los productos ofrecidos.El precio se de los productos se mostrará en colones.</p>
        <p>En caso de que usuario realice una compra y el precio correcto del producto vendido es mayor al precio erróneo publicado, Empresa X canceleria el pedido y reembolsará cualquier suma pagada.Todos los datos y transacciones realizadas por el usuario son seguras y avaladas por una certificación de seguridad.Empresa X enviará al usuario que realice ua compra el numero de orden por correo electrónico para confirmar la compra.</p>
        <h2 class="h4">Envío y Entrega</h2>
        <p>Empresa X realiza los envíos a la dirección proporcionada por el usuario.El usuario tendrá un plazo de 4 días hábiles, a partir de la entrega del producto para notificarnos de cualquier disconformidad o si el producto fue entregado en malas condiciones, descritas y ofrecidas en el sitio web.La notificacion debe de hacerse mediante nuestro correo electrónico contacto@empresa.com</p>

        <h2 class="h4">Propiedad Intelectual</h2>
        <p>El contenido del sitio web de Empresa X está protegido por derechos de propiedad intelectual y es de uso exclusivo de la empresa. El usuario no está autorizado a reproducir, distribuir, o utilizar el contenido con fines comerciales sin el consentimiento expreso de Empresa X.</p>

        <h2 class="h4">Modificaciones al Contrato</h2>
        <p>Empresa X podra, en cualquier momento, hacer correcciones, adiciones, mejoras o modificaciones al contrato sin la necesidad de notificar al usuario.Estas modificaciones serán aplicadas desde el momento en que se publique en la pagina.Es totalmente responsabilidad del usuario revisar el contrato y todas las políticas para estar al tanto de estos cambios.Cada vez que el usuario ingrese al sitio web se considerará como aceptación de las modificaciones </p>

        <h2 class="h4">Contacto</h2>
        <p>Para cualquier consulta, sugerencia o reclamo, el usuario puede ponerse en contacto con Empresa X a través de la dirección de correo electrónico indicada en el sitio web</p>
        
        <p class="text-muted">Este documento representa los términos y condiciones generales de uso de Empresa X y se considera vinculante para todos los usuarios del sitio.</p>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p>&copy; Empresa X, Derechos Reservados 2024</p>
            <div class="my-3">
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
</html>
