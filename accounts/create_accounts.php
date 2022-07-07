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
          <a href="list_accounts.php" class="active"><span class="las la-user-circle"></span>
            <span>Bank Accounts</span></a>
        </li>
        <li>
          <a href=""><span class="las la-credit-card"></span>
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

        Create Accounts
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
        <h1>Create Accounts</h1>
        <form action="add_account.php" method="POST">


          <label for="account">Beneficiary:</label>
          <select name="id_usuario" required>
            <option value=""></option>
            <?php
              include('../db.php');
              $query = mysqli_query($conexion, 'SELECT * FROM usuarios');
                while ($beneficiary = mysqli_fetch_row($query)) {
                  ?>
            <option value="<?php echo $beneficiary[0] ?>"><?php echo $beneficiary[1] ?></option>
            <?php } ?>
          </select><br>



          <?php
            $caracteres = "1234567890";
            $desordenada = str_shuffle($caracteres);
            $CH = substr($desordenada, 0, 10);
            ?>

          <div class="field">
            <input type="text" name="cuenta" id="cuenta" value="<?php echo $CH;?>" readonly required>
            <span></span>
            <label>Account Number:</label>
          </div>

          <div class="field">
            <input type="number" name="dinero" id="dinero" required>
            <span></span>
            <label>Amount of Money:</label>
          </div>




          <!-- <label for="dinero">Amount of Money:</label>
          <input type="number" name="dinero" placeholder="Amount of Money" required> -->
          <input type="submit" class="btnRegistrar" value="Register" />
        </form>
      </section>
      <a href="list_accounts.php"><button><i class="las la-arrow-left"></i>Back</button></a>
    </main>
    <script src="../assets/js/scriptAdmin.js"></script>
</body>

</html>