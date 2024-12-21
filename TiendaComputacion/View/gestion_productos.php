<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../config/db_connect.php';

$success = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        // Agregar producto
        if ($_POST['action'] === 'add_product') {
            $descripcion = $_POST['descripcion'];
            $detalle = $_POST['detalle'];
            $precio = $_POST['precio'];
            $existencias = $_POST['existencias'];
            $id_categoria = $_POST['id_categoria'];

            // Subir imagen
            $imagen = null;
            if (isset($_FILES['ruta_imagen']) && $_FILES['ruta_imagen']['error'] === UPLOAD_ERR_OK) {
                $uploads_dir = 'uploads';
                if (!is_dir($uploads_dir)) {
                    mkdir($uploads_dir, 0777, true);
                }
                $imagen = $uploads_dir . '/' . basename($_FILES['ruta_imagen']['name']);
                if (!move_uploaded_file($_FILES['ruta_imagen']['tmp_name'], $imagen)) {
                    $error = "Error al subir la imagen.";
                }
            }

            if (empty($error)) {
                try {
                    $stmt = $conn->prepare("INSERT INTO producto (descripcion, detalle, precio, existencias, ruta_imagen, id_categoria, activo) VALUES (?, ?, ?, ?, ?, ?, 1)");
                    $stmt->execute([$descripcion, $detalle, $precio, $existencias, $imagen, $id_categoria]);
                    $success = "Producto agregado con éxito.";
                } catch (PDOException $e) {
                    $error = "Error al agregar el producto: " . $e->getMessage();
                }
            }
        }

        // Editar producto
        if ($_POST['action'] === 'edit_product') {
            $id_producto = $_POST['id_producto'];
            $descripcion = $_POST['descripcion'];
            $detalle = $_POST['detalle'];
            $precio = $_POST['precio'];
            $existencias = $_POST['existencias'];
            $id_categoria = $_POST['id_categoria'];

            $imagen = null;
            if (isset($_FILES['ruta_imagen']) && $_FILES['ruta_imagen']['error'] === UPLOAD_ERR_OK) {
                $uploads_dir = 'uploads';
                $imagen = $uploads_dir . '/' . basename($_FILES['ruta_imagen']['name']);
                move_uploaded_file($_FILES['ruta_imagen']['tmp_name'], $imagen);
            }

            try {
                if ($imagen) {
                    $stmt = $conn->prepare("UPDATE producto SET descripcion = ?, detalle = ?, precio = ?, existencias = ?, ruta_imagen = ?, id_categoria = ? WHERE id_producto = ?");
                    $stmt->execute([$descripcion, $detalle, $precio, $existencias, $imagen, $id_categoria, $id_producto]);
                } else {
                    $stmt = $conn->prepare("UPDATE producto SET descripcion = ?, detalle = ?, precio = ?, existencias = ?, id_categoria = ? WHERE id_producto = ?");
                    $stmt->execute([$descripcion, $detalle, $precio, $existencias, $id_categoria, $id_producto]);
                }
                $success = "Producto actualizado con éxito.";
            } catch (PDOException $e) {
                $error = "Error al actualizar el producto: " . $e->getMessage();
            }
        }

        // Eliminar producto
        if ($_POST['action'] === 'delete_product') {
            $id_producto = $_POST['id_producto'];
            try {
                $stmt = $conn->prepare("DELETE FROM producto WHERE id_producto = ?");
                $stmt->execute([$id_producto]);
                $success = "Producto eliminado con éxito.";
            } catch (PDOException $e) {
                $error = "Error al eliminar el producto: " . $e->getMessage();
            }
        }
    }
}

$productos = $conn->query("SELECT * FROM producto")->fetchAll(PDO::FETCH_ASSOC);
$categorias = $conn->query("SELECT * FROM categoria")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h1>Gestión de Productos</h1>

        <?php if ($success): ?>
            <div class="alert alert-success"> <?php echo $success; ?> </div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="alert alert-danger"> <?php echo $error; ?> </div>
        <?php endif; ?>

        <h2>Agregar Producto</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" id="action" value="add_product">
            <input type="hidden" name="id_producto" id="id_producto">
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="detalle" class="form-label">Detalle</label>
                <textarea id="detalle" name="detalle" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" id="precio" name="precio" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="existencias" class="form-label">Existencias</label>
                <input type="number" id="existencias" name="existencias" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="id_categoria" class="form-label">Categoría</label>
                <select id="id_categoria" name="id_categoria" class="form-control" required>
                    <option value="">Seleccione una categoría</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?php echo $categoria['id_categoria']; ?>">
                            <?php echo htmlspecialchars($categoria['descripcion']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="ruta_imagen" class="form-label">Imagen</label>
                <input type="file" id="ruta_imagen" name="ruta_imagen" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar Producto</button>
        </form>

        <h2 class="mt-5">Lista de Productos</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Detalle</th>
                    <th>Precio</th>
                    <th>Existencias</th>
                    <th>Categoría</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?php echo $producto['id_producto']; ?></td>
                        <td><?php echo htmlspecialchars($producto['descripcion']); ?></td>
                        <td><?php echo htmlspecialchars($producto['detalle']); ?></td>
                        <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                        <td><?php echo $producto['existencias']; ?></td>
                        <td><?php echo htmlspecialchars($producto['id_categoria']); ?></td>
                        <td>
                            <?php if ($producto['ruta_imagen']): ?>
                                <img src="<?php echo $producto['ruta_imagen']; ?>" alt="Imagen del producto" style="width: 100px; height: 100px; object-fit: cover;">
                            <?php endif; ?>
                        </td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="loadEditForm(<?php echo $producto['id_producto']; ?>, '<?php echo htmlspecialchars($producto['descripcion']); ?>', '<?php echo htmlspecialchars($producto['detalle']); ?>', <?php echo $producto['precio']; ?>, <?php echo $producto['existencias']; ?>, <?php echo $producto['id_categoria']; ?>)">Editar</button>
                            <form action="" method="POST" class="d-inline">
                                <input type="hidden" name="action" value="delete_product">
                                <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        function loadEditForm(id, descripcion, detalle, precio, existencias, id_categoria) {
            document.getElementById('descripcion').value = descripcion;
            document.getElementById('detalle').value = detalle;
            document.getElementById('precio').value = precio;
            document.getElementById('existencias').value = existencias;
            document.getElementById('id_categoria').value = id_categoria;
            document.getElementById('action').value = 'edit_product';
            document.getElementById('id_producto').value = id;
        }
    </script>
</body>

</html>

