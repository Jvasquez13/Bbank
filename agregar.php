<?php

$nombre = $_POST['name'];
$email = $_POST['email'];
$usuario = $_POST['username'];
$password = $_POST['clave'];
$rol = $_POST['rol'];
$status = $_POST['status'];

include('db.php');

$query = "INSERT INTO usuarios (nombre, email, usuario, password, rol, status) 
    VALUES ('$nombre', '$email', '$usuario', '$password', '$rol', '$status')";

$ejecutar = mysqli_query($conexion,$query);

if($ejecutar){
    echo '
        <script>
            alert("Usuario registrado Exitosamente");
            window.location = "../cyberwarrior/create.php";
        </script>
    
    ';
}else{
    echo '
        <script>
            alert("Intentalo de nuevo, usuario no almacenado");
            window.location = "../cyberwarrior/create.php";
        </script>
    
    ';

}

mysqli_close($conexion);

?>