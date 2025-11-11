<?php
include_once 'conexion.php';

// --- Procesamos actualización si se envió el formulario ---
     if($_POST['Sexo'] == "")
  {
       echo "<script>
                   alert('❌ Por favor, selecciona un sexo valido.');
                   window.location='actualizar.php';
                 </script>";
  }
 
    $idUsuario = $_POST['idUsuario'];
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $sexo = $_POST['Sexo'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
  
    // Usar prepared statements para evitar SQL injection
    $sqlUpdate = "UPDATE usuarios  SET nombre = ?,  apellidoPaterno = ?, apellidoMaterno = ?, sexo = ?, email = ?,telefono = ?  WHERE idUsuario = ?";
    
    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bind_param("ssssssi", $nombre, $apellidoPaterno, $apellidoMaterno, $sexo, $email, $telefono, $idUsuario);
    
    if ($stmt->execute()) 
      {
        echo "<script>
                alert('Usuario actualizado correctamente');
                window.location.href='registros.php';
              </script>";
        exit;
    } else 
    {
        echo "Error al actualizar: " . $conn->error;
    }
?>