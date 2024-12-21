<?php
session_start();

// Agregar producto al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_to_cart') {
    $id_producto = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    // Inicializar el carrito si no existe
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Verificar si el producto ya está en el carrito
    $producto_existente = false;
    foreach ($_SESSION['carrito'] as &$producto) {
        if ($producto['id_producto'] === $id_producto) {
            $producto['cantidad'] += 1;
            $producto_existente = true;
            break;
        }
    }

    // Si el producto no existe, agregarlo
    if (!$producto_existente) {
        $_SESSION['carrito'][] = [
            'id_producto' => $id_producto,
            'nombre' => $nombre,
            'precio' => $precio,
            'cantidad' => 1
        ];
    }
}

// Mostrar productos en el carrito
if (!empty($_SESSION['carrito'])) {
    echo "<h2>Carrito</h2><ul>";
    foreach ($_SESSION['carrito'] as $producto) {
        echo "<li>{$producto['nombre']} - {$producto['precio']} x {$producto['cantidad']}</li>";
    }
    echo "</ul>";
} else {
    echo "<p>El carrito está vacío.</p>";
}

// Manejo para eliminar productos del carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'remove_from_cart') {
    $id_producto = $_POST['id_producto'];

    foreach ($_SESSION['carrito'] as $key => $producto) {
        if ($producto['id_producto'] === $id_producto) {
            unset($_SESSION['carrito'][$key]);
            break;
        }
    }

    // Reindexar el carrito
    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1>Carrito de Compras</h1>

        <?php if (!empty($_SESSION['carrito'])): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['carrito'] as $producto): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                            <td><?php echo number_format($producto['precio'], 2); ?></td>
                            <td><?php echo $producto['cantidad']; ?></td>
                            <td><?php echo number_format($producto['precio'] * $producto['cantidad'], 2); ?></td>
                            <td>
                                <form action="" method="POST" class="d-inline">
                                    <input type="hidden" name="action" value="remove_from_cart">
                                    <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>El carrito está vacío.</p>
        <?php endif; ?>

        <a href="catalogo.php" class="btn btn-primary">Volver al Catálogo</a>
    </div>
</body>
</html>

