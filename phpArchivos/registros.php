<?php
 //Hacer la tabla de registros
   include_once 'conexion.php';
 // Consulta a la base de datos
  $sql = "SELECT * FROM usuarios ORDER BY idUsuario DESC";
  // Ejecutamos la consulta
  $resultado = $conn -> query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="../styleArchivos/styleRegistros.css">
</head>
<body>
    <header>
      <h1>Registros de Usuarios</h1>
       <nav>
            <ul>
                <li><a href = "../index.html">Home</a></li>
            </ul>
        </nav>
    </header>
   <main>
    <?php if($resultado -> num_rows > 0)  ?>
    <table>
       <thead>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Sexo</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
       </thead>
       <tbody>
        <?php
          while($usuario = $resultado -> fetch_assoc())
          {
        ?>
            <tr>
                <td><?php echo $usuario['nombre']; ?></td>
                <td><?php echo $usuario['apellidoPaterno']; ?></td>
                <td><?php echo $usuario['apellidoMaterno']; ?></td>
                <td><?php echo $usuario['sexo']; ?></td>
                <td><?php echo $usuario['email']; ?></td>
                <td><?php echo $usuario['telefono']; ?></td>
                <td>
                    <a class = "accionesButton" href="actualizar.php?id=<?php echo $usuario['idUsuario']; ?>">Actualizar</a>
                    <a class = "accionesButton" href="eliminar.php?id=<?php echo $usuario['idUsuario']; ?>" 
                    onclick = "return confirm('¿Seguro que deseas eliminar este usuario ?');">Eliminar</a>
                </td>
            </tr>
        <?php
          }
          else 
          {
           
           ?>
            <h2>No existen Registros </h2>
            <?php
            
          }
        ?>
        </tbody>
      </table>
  </main>
</body>
</html>