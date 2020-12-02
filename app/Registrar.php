<?php
/**$conexion = mysqli_connect("localhost","root","root","asesorias");
if (isset($_POST['reg_user'])) {
        $nombre=  mysqli_real_escape_string($conexion,$_POST['nombre']);
        $apellidos=mysqli_real_escape_string($conexion,$_POST['apellidos']);
        $email= mysqli_real_escape_string($conexion, $_POST['email']);
        $claveAcceso= mysqli_real_escape_string($conexion,$_POST['claveAcceso']);
        $telefono= mysqli_real_escape_string($conexion,$_POST['telefono']);
        $fotoPerfil= mysqli_real_escape_string($conexion,$_POST['fotoPerfil']);
       
        $insertar = "INSERT INTO asesores(nombre, apellidos, email, claveAcceso, telefono, fotoPerfil)
        values('$nombre','$apellidos','$email','$claveAcceso','$telefono','$fotoPerfil')";
        $resultado = mysqli_query($conexion,$insertar);
        if($resultado){
            echo 'error al registrar';
        } else {
            echo 'reggistrado';
        }
        mysqli_close($conexion);
        
    }
   
**/
$usuario = "root";
$password = "root";
$servidor = "localhost";
$basededatos = "asesorias";

$conexion = mysqli_connect($servidor,$usuario,"") or die ("error en el servidor");

$bd = mysqli_connect($conexion,$basededatos) or die ("error en la bd al conectar");

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$claveAcceso = $_POST['claveAcceso'];
$telefono = $_POST['telefono'];
$fotoPerfil = $_POST['fotoPerfil'];

$sql="INSERT INTO asesores ('$nombre','$apellidos', '$email', '$claveAcceso',
 '$telefono', '$fotoPerfil' )";

 $ejecutar=mysqli_query($conexion,$sql);
 if(!$ejecutar){
echo"error";
 } else{
     echo"datos guardados" ;
 }

    ?>