<?php 
   //Incluir el archo de conexión a la base de datos
   include_once 'conexion.php';

   //Verificar envio sea por el metodo Post

   if($_SERVER["REQUEST_METHOD"]== "POST")
   {
     // echo "Esto si es enviado por metodo POST";
     $nombre = $_POST['name'];
     $telefono = $_POST['telefono'];
     $apellidoPaterno = $_POST['apellidoMaterno'];
     $apellidoMaterno = $_POST['apellidoPaterno'];
     echo $nombre;
     echo $telefono;
     echo $apellidoMaterno;
     echo $apellidoPaterno;

   }
   else
   {
    echo "Este formulario no es enviado por metodo post";
    header("Location:index.html");
   }
?>