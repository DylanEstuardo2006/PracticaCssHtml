<?php 
   //Incluir el archo de conexión a la base de datos
   include_once 'conexion.php';

   //Verificar envio sea por el metodo Post

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
     

     $sql = "INSERT INTO usuario (nombre, apellidoPaterno, apellidoMaterno, email, contrasenia, telefono, sexo) VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$email','$password' ,'$telefono' ,'$sexo')";

      if($conn -> query($sql) === true)
      {
        echo "Inserción exitosa";
      }
   }
   else
   {
    echo "Este formulario no es enviado por metodo post";
    header("Location:index.html");
   }
?>