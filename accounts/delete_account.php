<?php
include '../db.php';

$id = $_GET['id'];

$consulta = "DELETE FROM cuentas where id = $id";
$resultado = mysqli_query($conexion,$consulta);

if($resultado){
  echo '
    <script>
      alert("Cuenta Eliminada");
      window.location = "list_accounts.php";
    </script>
  ';
}
?>