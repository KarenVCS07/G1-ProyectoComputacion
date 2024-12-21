<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Soporte</title>
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

    <div class="container mt-5">
        <div class="accordion" id="faqAccordion">
            <h1 class="text-center display-4">Soporte de Empresa X</h1>
            <!-- Preguntas Frecuentes -->
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Preguntas Frecuentes
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        <h3>1. Pedidos y Compras</h3>
                        <p><strong>¿Cómo puedo realizar un pedido?</strong><br>
                            Para realizar un pedido deberá añadir mínimo un producto al carrito de compras y,
                            posteriormente, deberá irse al ícono del carrito y darle clic. Estando ahí, deberá revisar
                            sus compras y darle al botón de "Realizar compra", en el cual le pediremos todos los datos
                            necesarios para llevar a cabo el pedido.</p>
                        <p><strong>¿Puedo modificar o cancelar mi pedido después de haberlo realizado?</strong><br>
                            No, no se puede modificar. Tendría que hacer otro pedido con lo que desee, y solo se podrá
                            cancelar el pedido en las 24 horas después de realizarlo. Pasado este tiempo, no se podrá
                            cancelar el pedido.</p>
                        <p><strong>¿Qué métodos de pago aceptan?</strong><br>
                            Aceptamos tarjetas de crédito, tarjetas de débito, Sinpe, PayPal y transferencia bancaria.
                        </p>
                        <p><strong>¿Es seguro ingresar mis datos de pago en su sitio?</strong><br>
                            Es totalmente seguro ingresar los datos en nuestro sitio web. Contamos con un certificado de
                            seguridad, el cual garantiza que el sitio web es seguro.</p>
                        <p><strong>¿Puedo hacer una compra sin registrarme?</strong><br>
                            No, no podrá hacer una compra sin antes registrarse, ya que necesitamos los datos del
                            usuario que está haciendo una compra.</p>

                        <h3>2. Envíos y Entrega</h3>
                        <p><strong>¿Cuánto cuesta el envío?</strong><br>
                            El costo del envío dependerá de la ubicación. A la hora de hacer el pago, le saldrá un
                            apartado con el costo del envío y la razón de este costo.</p>
                        <p><strong>¿Cuánto tiempo tarda en llegar mi pedido?</strong><br>
                            El envío tardará entre 1 y 5 días hábiles.</p>
                        <p><strong>¿Hacen envíos a nivel internacional?</strong><br>
                            No, de momento no se realizan envíos a nivel internacional.</p>
                        <p><strong>¿Cómo puedo rastrear mi pedido?</strong><br>
                            No podrá rastrear el pedido en sí, pero podrá consultarnos por nuestro correo electrónico
                            cuánto falta aproximadamente y dónde se encuentra en ese momento.</p>
                        <p><strong>¿Qué hago si mi paquete no ha llegado o está dañado?</strong><br>
                            En caso de que su compra no llegue o llegue dañada, podrá pedir un reembolso. Deberá
                            adjuntar pruebas en caso de que esté dañado para poder procesar el reembolso.</p>

                        <h3>3. Devoluciones y Reembolsos</h3>
                        <p><strong>¿Cuánto tiempo tengo para devolver un producto?</strong><br>
                            SOLO se podrá devolver el producto si tiene garantía o en caso de que este llegue dañado.
                        </p>
                        <p><strong>¿Cómo solicito un reembolso?</strong><br>
                            Deberá enviarnos un correo solicitando el reembolso, en el cual deberá mostrar la razón por
                            la que quiere un reembolso.</p>
                        <p><strong>¿Puedo cambiar mi producto por otro?</strong><br>
                            No, no se podrá cambiar el producto por otro, a menos que haya comprado uno que esté dañado.
                            En ese caso, en vez de pedir un reembolso, puede solicitar el mismo producto, uno que iguale
                            el precio o, si desea un producto más caro, deberá pagar la diferencia de precio.</p>
                        <p><strong>¿Cuánto tiempo tardará en procesarse mi reembolso?</strong><br>
                            Entre 1 y 3 días tardaremos en procesar el reembolso, siempre que haya un motivo válido.</p>

                        <h3>4. Garantía y Reparación</h3>
                        <p><strong>¿Tienen garantía los productos que venden?</strong><br>
                            La mayoría de nuestros productos cuentan con garantía. A la hora de hacer la compra, se
                            indicará si el producto tiene garantía y de cuánto tiempo es.</p>
                        <p><strong>¿Qué cubre la garantía?</strong><br>
                            Cambiar el producto por uno igual o, en caso de que no haya uno de la misma marca, por uno
                            que iguale el precio al que lo adquirió.</p>
                        <p><strong>¿Cómo puedo solicitar una reparación?</strong><br>
                            Puede solicitarla a nuestro correo electrónico. Nosotros le cobraremos un monto dependiendo
                            de la reparación. También tenga en cuenta que el mantenimiento de PC es totalmente gratis.
                        </p>
                        <p><strong>¿Qué hago si mi producto llega defectuoso?</strong><br>
                            En caso de que su producto llegue dañado, podrá pedir un reembolso por nuestro correo
                            electrónico adjuntando las pruebas necesarias.</p>
                    </div>
                </div>
            </div>

            <!-- Garantías y devoluciones -->
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Garantías y Devoluciones
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        <h3>Política de Garantía</h3>
                        <p>La duración de la garantía es dependiendo del producto puede ir de 1 mes de garantía hasta 5
                            años de garantía.</p>
                        <p><strong>Proceso de Reclamo de Garantía:</strong><br>
                            Los pasos para realizar un reclamo de garantía: contactarnos por nuestro correo electrónico,
                            explicar la razón y adjuntar fotos o videos del problema. Adjuntar el comprobante de la
                            compra para validar la compra. Nos tomaremos de 1 a 2 días para revisar y responder al
                            reclamo de la garantía.</p>

                        <h3>Política de Devoluciones</h3>
                        <p>El plazo para poder devolver un producto será de 30 días después de haberle entregado el
                            producto.</p>
                        <p>El producto deberá de estar en su empaque y sin uso.</p>
                        <p>No tendrá ningún costo devolver el producto.</p>
                        <p><strong>Proceso de Devolución y Reembolso:</strong><br>
                            Para devolver el producto deberá de contactarnos por nuestro correo electrónico preguntando
                            sobre la devolución y deberá de llenar un formulario que le enviaremos. Habrá un periodo de
                            1 a 5 días en todo el proceso del reembolso o el cambio del producto. Se reembolsará por el
                            pago original o por crédito en la tienda, como usted lo desee.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Sección de Contacto -->
    <section id="contacto" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Contáctanos</h2>
            <p class="text-center mb-4">Si tiene alguna pregunta o necesita mas informacion llene el siguiente formulario</p>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form>
                        <div class="form-group mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo"
                                placeholder="Ingresa tu correo electrónico" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="asunto" class="form-label">Asunto</label>
                            <input type="text" class="form-control" id="asunto" placeholder="Ingresa el asunto"
                                required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="mensaje" class="form-label">Mensaje</label>
                            <textarea class="form-control" id="mensaje" rows="5"
                                placeholder="Escribe tu mensaje aquí..." required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Enviar Mensaje</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 Mi Sitio. Todos los derechos reservados.</p>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>