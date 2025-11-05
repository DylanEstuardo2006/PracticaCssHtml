<?php
  // Conectamos con la base de datos
  include_once 'conexion.php';
  
  // Verificamos si se ha enviado el ID del usuario a eliminar
  if(isset($_GET['id']))
  {
      $idUsuario = $_GET['id']; // Guardamos el ID del usuario
     
     // Preparamos la sentencia SQL para borrar el registro
    // Usamos "prepared statements" para evitar inyección SQL
      $sql = "DELETE FROM usuarios WHERE idUsuario = ? ";
      // Ejecutamos la consulta
     $stmt = $conn -> prepare($sql);

     $stmt-> bind_param("i", $idUsuario); // "i" = tipo entero (integer)

     if($stmt -> execute())
     {
         // Redirigimos de vuelta a la página de registros después de eliminar
         header("Location: registros.php");
         exit();
     }
     else
     {
         echo "Error al eliminar el usuario: " . $conn -> error;
     }
     $stmt->close();
} else {
    // Si no llegó un ID por la URL, mostramos un mensaje
    echo "⚠️ No se especificó un usuario para eliminar.";
}

// 9️⃣ Cerramos la conexión
$conn->close();
?>

