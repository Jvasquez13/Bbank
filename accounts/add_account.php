<?php

$id_usuario = $_POST['id_usuario'];
$cuenta = $_POST['cuenta'];
$dinero = $_POST['dinero'];

include('../db.php');

$query = "INSERT INTO cuentas SET id_usuario='$id_usuario', cuenta='$cuenta', dinero='$dinero' ";

$verificar_id = mysqli_query($conexion, "SELECT * FROM cuentas WHERE id_usuario='$id_usuario' ");

if(mysqli_num_rows($verificar_id) > 0){
  echo '
    <script>
      alert("Este usuario ya tiene una cuenta");
      window.location = "create_accounts.php";
    </script>
  ';
  exit();
}

$ejecutar = mysqli_query($conexion,$query);

if($ejecutar){
  echo '
    <script>
      alert("Cuenta creada Exitosamente");
      window.location = "list_accounts.php";
    </script>
  ';
}else{
  echo '
    <script>
      alert("Intentalo de nuevo, cuenta no creada");
      window.location = "create_accounts.php";
    </script>
  ';
}

mysqli_close($conexion);
?>