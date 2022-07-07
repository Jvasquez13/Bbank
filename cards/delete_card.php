<?php
include '../db.php';

$id = $_GET['id'];

$consulta = "DELETE FROM tarjetas where id = $id";
$resultado = mysqli_query($conexion,$consulta);

if($resultado){
  echo '
    <script>
      alert("Tarjeta Eliminada");
      window.location = "list_cards.php";
    </script>
  ';
}
?>