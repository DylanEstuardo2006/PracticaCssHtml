<?php

$host = "localhost";
$usuario = "root";
$password = "";
$bd = "bdblog";
 
$conn = new mysqli($host,$usuario,$password,$bd);

if($conn -> connect_error)
{
    die("Error en la conexion". $conn ->connect_e);
}
else 
{
   
}
?>
