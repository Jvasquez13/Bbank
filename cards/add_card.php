<?php

include('../db.php');

$id_cuenta = $_POST['id_cuenta'];
$numero = $_POST['numero'];
$fecha_creacion = $_POST['fecha_creacion'];
$fecha_expiracion = $_POST['fecha_expiracion'];  
$cvv = $_POST['cvv'];  

$query = "INSERT INTO tarjetas SET id_cuenta='$id_cuenta', numero='$numero', fecha_creacion='$fecha_creacion', fecha_expiracion='$fecha_expiracion', cvv='$cvv'";

$verificar_id = mysqli_query($conexion, "SELECT * FROM tarjetas WHERE id_cuenta='$id_cuenta' ");

if(mysqli_num_rows($verificar_id) > 0){
  echo '
    <script>
      alert("Esta cuenta ya tiene una tarjeta activa");
      window.location = "create_cards.php";
    </script>
  ';
  exit();
}

$ejecutar = mysqli_query($conexion,$query);

if($ejecutar){
  echo '
    <script>
      alert("Cuenta creada Exitosamente");
      window.location = "list_cards.php";
    </script>
  ';
}else{
  echo '
    <script>
      alert("Intentalo de nuevo, cuenta no creada");
      window.location = "create_cards.php";
    </script>
  ';
}

mysqli_close($conexion);
?>