<?php
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
    <link rel="stylesheet" href="../styleArchivos/styleActualizar.css">
</head>
<body>
    <header>
        <h1>Actualizar Usuario</h1>
        <nav>
            <ul>
                <li><a href="registros.php">Volver</a></li>
            </ul>
        </nav>
    </header>

    <main>
    <section>
        <form action="ejecutarEditar.php" method="POST">
        <input type="hidden" name="idUsuario" value="<?php echo $usuario['idUsuario']; ?>">
            <p class="formStyle"><strong>Nombre: </strong><input type="text" class="txtForm" name="name"  value = "<?php echo $usuario['nombre']?>" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñ]+)*$"  title="Solo letras y espacios. Mínimo 2 y máximo 50 caracteres." required></p>
    <p class="formStyle"><strong>Apellido Paterno: </strong><input type="text" class="txtForm" name="apellidoPaterno" value = "<?php echo $usuario['apellidoPaterno']?>"  pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ ]{2,50}$" title="Solo letras y espacios. Mínimo 2 y máximo 50 caracteres." required></p>
    <p class="formStyle"><strong>Apellido Materno: </strong><input type="text" class="txtForm" name="apellidoMaterno" value = "<?php echo $usuario['apellidoMaterno']?>" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ ]{2,50}$" title="Solo letras y espacios. Mínimo 2 y máximo 50 caracteres." required></p>
    <p class="formStyle"><strong>Email: </strong><input type="email" class="txtForm" name="email" value = "<?php echo $usuario['email']?>" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" enabled></p>
    <p class="formStyle"><strong>Teléfono: </strong><input type="tel" class="txtForm" name="telefono"  value = "<?php echo $usuario['telefono']?>"  pattern="^[0-9]{10}$"></p>

  <p><input type="radio" name="Sexo" value="Hombre" <?php if ( $usuario['sexo'] == "Hombre"): ?>  checked  <?php endif; ?>><strong>Hombre</strong></p>
  <p><input type="radio" name="Sexo" value="Mujer"  <?php if ( $usuario['sexo'] == "Mujer"): ?>  checked  <?php endif; ?>><strong>Mujer</strong></p>
  <p><input type="radio" name="Sexo" value ="Prefiero no Decirlo" <?php if ( $usuario['sexo'] == "Prefiero no Decirlo"): ?>  checked  <?php endif; ?>><strong>Prefiero no Decirlo</strong></p>

  <button type="submit" class="suscribirmeButton">Aceptar</button>
  <button type="reset" class="suscribirmeButton">Limpiar </button>
  </section> 
        </form>
    </main>
</body>
</html>