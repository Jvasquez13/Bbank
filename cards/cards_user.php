<?php
session_start();

if(!isset($_SESSION['usuario'])){

    echo '
        <script>
            alert("Por favor debes iniciar sesión") 
            window.location = "../login.php"; 
        </script>
    ';        
    session_destroy();
die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>BBank Admin</title>
  <link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/estilosAdmin1.css">

</head>

<body>

  <input type="checkbox" id="nav-toggle">
  <div class="sidebar">
    <div class="sidebar-brand">
        <h2><span class="las la-university"><span>BBank</span></span></h2>
    </div>

    <div class="sidebar-menu">
      <ul>
        <li>
          <a href="../home.php"><span class="las la-igloo"></span>
            <span>Home</span></a>
        </li>
        <li>
          <a href="../accounts/accounts_user.php"><span class="las la-piggy-bank"></span>
            <span>Bank Accounts</span></a>
        </li>
        <li>
          <a href="../cards/cards_user.php" class="active" ><span class="las la-credit-card"></span>
            <span>Credit Cards</span></a>
        </li>
        <li>
          <a href="../cerrar_session.php"><span class="las la-door-open"></span>
            <span>Logout</span></a>
        </li>
      </ul>
    </div>
  </div>

  <div class="main-content">
    <header>
      <h2>
        <label for="nav-toggle">
          <span class="las la-bars"></span>
        </label>

        Cards
      </h2>

      <div class="user-wrapper">
        <img src="../assets/images/userIcono.png" width="30px" height="30px" alt="">
        <div>
          <h4><?php echo $_SESSION["nombre"]?></h4>
        </div>
      </div>
    </header>

    <main>
      <div class="container__Tabla">
        <div class="tabla__header">
          <h2>Cards</h2>

          <?php 
            $rol = $_SESSION['rol'];
          ?>
         

          <img src="../assets/images/bbank.png" class="avatar" srcset="">
          <table>
            <thead>
              <tr>
                <th>Name</th>
                <th>Account</th>
                <th>Card Number</th>
                <th>Creation Date</th>
                <th>Expiration Date</th>
                <th>CVV</th>
                <?php 
                  $rol = $_SESSION['rol'];
                  if($rol == 1) :?>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
              <?php
                include('../db.php');
                $id = $_SESSION['id'];
                if($rol == 0) {
                    $sql = "SELECT u.nombre, u.email, c.cuenta, t.numero, t.id, t.fecha_creacion, t.fecha_expiracion, t.cvv FROM usuarios u INNER JOIN cuentas c ON u.id = c.id_usuario INNER JOIN tarjetas t ON t.id_cuenta = c.id_usuario WHERE $id = t.id_cuenta;";   
                }
                $query = mysqli_query($conexion,$sql);
                while($row=mysqli_fetch_array($query)){
                $rowcount = mysqli_num_rows($query);
              ?>
              <tr>
                <td><?php echo $row['nombre']?></td>
                <td><?php echo $row['cuenta']?></td>
                <td><?php echo $row['numero']?></td>
                <td><?php echo $row['fecha_creacion']?></td>
                <td><?php echo $row['fecha_expiracion']?></td>
                <td><?php echo $row['cvv']?></td> 
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
          <?php 
            if($rol == 0) :?>
          <a href="../transfers/transfer.php"><button>New Transfer</button></a>
          <?php endif; ?>
        </div>
      </div>
  </div>
  </main>

  <script src="../assets/js/scriptAdmin.js"></script>
</body>

</html>