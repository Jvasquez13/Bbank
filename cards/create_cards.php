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
      <h2><span class="las la-university"><span>BBank Admin</span></span></h2>
    </div>

    <div class="sidebar-menu">
      <ul>
        <li>
          <a href="../admin.php"><span class="las la-igloo"></span>
            <span>Dashboard</span></a>
        </li>
        <li>
          <a href="../create.php"><span class="las la-user-plus"></span>
            <span>Create Clients</span></a>
        </li>
        <li>
          <a href="../users.php"><span class="las la-users"></span>
            <span>Clients</span></a>
        </li>
        <li>
          <a href="../accounts/list_accounts.php"><span class="las la-user-circle"></span>
            <span>Bank Accounts</span></a>
        </li>
        <li>
          <a href="create_cards.php" class="active"><span class="las la-credit-card"></span>
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
        <img src="../assets/images/adminIcon.png" width="30px" height="30px" alt="">
        <div>
          <h4>Admin</h4>
        </div>
      </div>
    </header>
    <main>

      <section class="container_admin">
        <img src="../assets/images/bbank.png" class="avatar" srcset="">
        <h1>Create Cards</h1>
        <form action="add_card.php" method="POST">
          <!-- Seleccionar beneficiario -->
          <label for="card">Beneficiary:</label>
          <select name="id_cuenta" required>
            <option value=""></option>
            <?php
              include('../db.php');
              $query = mysqli_query($conexion, 'SELECT * FROM usuarios u INNER JOIN cuentas c ON c.id_usuario = u.id');
                while ($beneficiary = mysqli_fetch_row($query)) {
                  ?>
            <option value="<?php echo $beneficiary[0]?>"><?php echo $beneficiary[1],'-', $beneficiary[9] ?></option>
            <?php } ?>
          </select><br>

          <!-- Numero de cuenta -->
          <?php
            mt_srand(time());
            mt_srand(time()*10000000);
            $c=mt_rand(0,999999999);
            $f=mt_rand(0,9999999);
            $d=$c.$f;
            $str =  strval($d);
            $card_number = str_split($str, 4);
            ?>

          <div class="field">
            <input type="text" name="numero" id="numero" value="<?php
            echo $card_number[0],'-',$card_number[1],'-',$card_number[2],'-',$card_number[3];?>" readonly required>
            <span></span>
            <label>Card Number:</label>
          </div>

          <!-- fecha de creacion -->
          <div class="field">
            <input type="text" name="fecha_creacion" id="fecha_creacion" value="<?php
            echo $fechaactual = date('Y-m-d');?>" readonly required>
            <span></span>
            <label>Card Number:</label>
          </div>

          <!-- fecha de expiracion -->
          <?php
            $nuevafecha = strtotime ('+5 year' , strtotime($fechaactual)); //Se añade un año mas
            $nuevafecha = date('Y-m-d',$nuevafecha);
          ?>

          <div class="field">
            <input type="text" name="fecha_expiracion" id="fecha_expiracion" value="<?php
            echo $nuevafecha;?>" readonly required>
            <span></span>
            <label>Card Number:</label>
          </div>

          <!-- CVV -->
          <?php
            $caracteres = "1234567890";
            $desordenada = str_shuffle($caracteres);
            $CH = substr($desordenada, 0, 3);
            ?>

          <div class="field">
            <input type="text" name="cvv" id="cvv" value="<?php
            echo $CH;?>" readonly required>
            <span></span>
            <label>CVV:</label>
          </div>

          <!--  -->

          <!-- <div class="field">
            <input type="number" name="dinero" id="dinero" required>
            <span></span>
            <label>Amount of Money:</label>
          </div> -->

          <!-- <label for="dinero">Amount of Money:</label>
          <input type="number" name="dinero" placeholder="Amount of Money" required> -->
          <input type="submit" class="btnRegistrar" value="Register" />
        </form>
      </section>
      <a href="list_cards.php"><button><i class="las la-arrow-left"></i>Back</button></a>
    </main>
    <script src="../assets/js/scriptAdmin.js"></script>
</body>

</html>