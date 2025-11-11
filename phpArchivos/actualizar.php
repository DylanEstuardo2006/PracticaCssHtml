<?php
include_once 'conexion.php';

// --- Procesamos actualización si se envió el formulario ---
if (isset($_POST['actualizar'])) {

    $idUsuario = $_POST['idUsuario'];
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Usar prepared statements para evitar SQL injection
    $sqlUpdate = "UPDATE usuarios  SET nombre = ?,  apellidoPaterno = ?, apellidoMaterno = ?, sexo = ?, email = ?,telefono = ?  WHERE idUsuario = ?";
    
    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bind_param("ssssssi", $nombre, $apellidoPaterno, $apellidoMaterno, $sexo, $email, $telefono, $idUsuario);
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Usuario actualizado correctamente');
                window.location.href='registros.php';
              </script>";
        exit;
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}

// --- Obtenemos datos del usuario para mostrar en el formulario ---
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Usar prepared statement
    $sql = "SELECT * FROM usuarios WHERE idUsuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
    } else {
        echo "Usuario no encontrado.";
        exit;
    }
} else {
    echo "ID no especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar usuario</title>
    <link rel="stylesheet" href="../styleArchivos/styleRegistros.css">
</head>
<body>
    <header>
        <h1>Actualizar Usuario</h1>
        <nav>
            <ul>
                <li><a href="../php/registros.php">Volver</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form action="actualizar.php" method="POST">
            <input type="hidden" name="idUsuario" value="<?php echo $usuario['idUsuario']; ?>">

            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Sexo</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required></td>
                        <td><input type="text" name="apellidoPaterno" value="<?php echo htmlspecialchars($usuario['apellidoPaterno']); ?>" required></td>
                        <td><input type="text" name="apellidoMaterno" value="<?php echo htmlspecialchars($usuario['apellidoMaterno']); ?>"></td>
                        <td><input type="text" name="sexo" value="<?php echo htmlspecialchars($usuario['sexo']); ?>"></td>
                        <td><input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required></td>
                        <td><input type="text" name="telefono" value="<?php echo htmlspecialchars($usuario['telefono']); ?>"></td>
                        <td>
                            <button type="submit" name="actualizar" class="accionesButton">Actualizar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </main>
</body>
</html>