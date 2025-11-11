<?php 
   //Incluir el archo de conexión a la base de datos
   include_once 'conexion.php';

   //Verificar envio sea por el metodo Post

  if($_POST['Sexo'] == "")
  {
       echo "<script>
                   alert('❌ Por favor, selecciona un sexo valido.');
                   window.location='../index.html';
                 </script>";
  }
  else
  {
    
    if($_SERVER["REQUEST_METHOD"]== "POST")
   {
     // echo "Esto si es enviado por metodo POST";
     $nombre = $_POST['name'];
     $telefono = $_POST['telefono'];
     $apellidoPaterno = $_POST['apellidoPaterno'];
     $apellidoMaterno = $_POST['apellidoMaterno'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $sexo = $_POST['Sexo'];
      
        $sqlCheck = "SELECT * FROM usuarios WHERE email = '$email'";
        if($conn -> query($sqlCheck) -> num_rows > 0)
        {
          echo "<script>
                   alert('❌ El correo ya está registrado. Por favor, utiliza otro correo.');
                   window.location='../index.html';
                 </script>";
         }
         else 
         {
          $sql = "INSERT INTO usuarios (nombre, apellidoPaterno, apellidoMaterno, email, contrasenia, telefono, sexo) VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$email','$password' ,'$telefono' ,'$sexo')";

         if($conn -> query($sql) === true)
         {
        header("Location: registros.php");
        }
        } 
     }
     else
      {
      echo "Este formulario no es enviado por metodo post";
      header("Location:index.html");
     }
    
  } 
?>