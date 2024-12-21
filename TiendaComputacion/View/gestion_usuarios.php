<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../config/db_connect.php';

$success = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        // Agregar usuario
        if ($_POST['action'] === 'add_user') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $tipo = $_POST['tipo'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            try {
                $stmt = $conn->prepare("INSERT INTO usuario (nombre, email, password, tipo) VALUES (?, ?, ?, ?)");
                $stmt->execute([$nombre, $email, $password, $tipo]);
                $success = "Usuario agregado con éxito.";
            } catch (PDOException $e) {
                $error = "Error al agregar el usuario: " . $e->getMessage();
            }
        }

        // Editar usuario
        if ($_POST['action'] === 'edit_user') {
            if (!empty($_POST['id_usuario'])) {
                $id_usuario = $_POST['id_usuario'];
                $nombre = $_POST['nombre'];
                $email = $_POST['email'];
                $tipo = $_POST['tipo'];

                try {
                    $stmt = $conn->prepare("UPDATE usuario SET nombre = ?, email = ?, tipo = ? WHERE id_usuario = ?");
                    $stmt->execute([$nombre, $email, $tipo, $id_usuario]);
                    $success = "Usuario actualizado con éxito.";
                } catch (PDOException $e) {
                    $error = "Error al actualizar el usuario: " . $e->getMessage();
                }
            } else {
                $error = "ID de usuario no especificado.";
            }
        }

        // Eliminar usuario
        if ($_POST['action'] === 'delete_user') {
            if (!empty($_POST['id_usuario'])) {
                $id_usuario = $_POST['id_usuario'];
                try {
                    $stmt = $conn->prepare("DELETE FROM usuario WHERE id_usuario = ?");
                    $stmt->execute([$id_usuario]);
                    $success = "Usuario eliminado con éxito.";
                } catch (PDOException $e) {
                    $error = "Error al eliminar el usuario: " . $e->getMessage();
                }
            } else {
                $error = "ID de usuario no especificado.";
            }
        }
    }
}

$usuarios = $conn->query("SELECT * FROM usuario")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h1>Gestión de Usuarios</h1>

        <?php if ($success): ?>
            <div class="alert alert-success"> <?php echo $success; ?> </div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="alert alert-danger"> <?php echo $error; ?> </div>
        <?php endif; ?>

        <h2>Agregar Usuario</h2>
        <form action="" method="POST">
            <input type="hidden" name="action" value="add_user">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo de Usuario</label>
                <select id="tipo" name="tipo" class="form-control" required>
                    <option value="cliente">Cliente</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Usuario</button>
        </form>

        <h2 class="mt-5">Lista de Usuarios</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario['id_usuario']; ?></td>
                        <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['tipo']); ?></td>
                        <td>
                        <button class="btn btn-warning btn-sm" onclick="loadEditForm(<?php echo $usuario['id_usuario']; ?>, '<?php echo htmlspecialchars($usuario['nombre']); ?>', '<?php echo htmlspecialchars($usuario['email']); ?>', '<?php echo htmlspecialchars($usuario['tipo']); ?>')">Editar</button>
                            <form action="" method="POST" class="d-inline">
                                <input type="hidden" name="action" value="delete_user">
                                <input type="hidden" name="id_usuario" value="<?php echo isset($id_usuario) ? $id_usuario : ''; ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
    function loadEditForm(id, nombre, email, tipo) {
    document.getElementById('nombre').value = nombre;
    document.getElementById('email').value = email;
    document.getElementById('tipo').value = tipo;
    document.querySelector('input[name="action"]').value = 'edit_user';

    let hiddenId = document.querySelector('input[name="id_usuario"]');
    if (!hiddenId) {
        hiddenId = document.createElement('input');
        hiddenId.setAttribute('type', 'hidden');
        hiddenId.setAttribute('name', 'id_usuario');
        document.querySelector('form').appendChild(hiddenId);
    }
    hiddenId.value = id;
}
    </script>
</body>

</html>