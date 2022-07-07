<?php

session_start();

if(!isset($_SESSION['usuario'])){

    echo '
        <script>
            alert("Por favor debes iniciar sesión") 
            window.location = "login.php"; 
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
  <link rel="stylesheet" href="assets/css/estilosAdmin1.css">

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
          <a href="admin.php" class="active"><span class="las la-igloo"></span>
            <span>Dashboard</span></a>
        </li>
        <li>
          <a href="create.php"><span class="las la-user-plus"></span>
            <span>Create Clients</span></a>
        </li>
        <li>
          <a href="users.php"><span class="las la-users"></span>
            <span>Clients</span></a>
        </li>
        <li>
          <a href="accounts/list_accounts.php"><span class="las la-user-circle"></span>
            <span>Bank Accounts</span></a>
        </li>
        <li>
          <a href="cards/list_cards.php"><span class="las la-credit-card"></span>
            <span>Credit Cards</span></a>
        </li>
        <li>
          <a href="cerrar_session.php"><span class="las la-door-open"></span>
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

        Dashboard
      </h2>

      <div class="search-wrapper">
        <span class="las la-search"></span>
        <input type="search" placeholder="Search here" />
      </div>

      <div class="user-wrapper">
        <img src="assets/images/adminIcon.png" width="30px" height="30px" alt="">
        <div>
          <h4><?php echo $_SESSION['nombre'];?></h4>
        </div>
      </div>
    </header>

    <main>
      <div class="cards">
        <div class="cards-single">
          <div>
            <h1>
              <?php
                            include('db.php');
                            $sql = "SELECT * FROM usuarios WHERE rol = 0 AND status = 1;";
                            $query = mysqli_query($conexion,$sql);
                            $clientes = mysqli_num_rows($query);
                            echo $clientes;
                            ?>
            </h1>
            <span>Clients</span>
          </div>
          <div>
            <span class="las la-users"></span>
          </div>
        </div>

        <div class="cards-single">
          <div>
            <h1>

            <?php
                            include('db.php');
                            $sql ="SELECT * FROM usuarios u INNER JOIN cuentas c ON c.id_usuario = u.id;";
                            $query = mysqli_query($conexion,$sql);
                            $clientes = mysqli_num_rows($query);
                            echo $clientes;
                            ?>
            </h1>
            <span>Accounts</span>
          </div>
          <div>
            <span class="las la-user-circle"></span>
          </div>
        </div>

        <div class="cards-single">
          <div>
            <h1>
            <?php
                            include('db.php');
                            $sql = "SELECT u.nombre, u.email, c.cuenta, t.numero, t.id, t.fecha_creacion, t.fecha_expiracion, t.cvv FROM usuarios u INNER JOIN cuentas c ON u.id = c.id_usuario INNER JOIN tarjetas t ON t.id_cuenta = c.id_usuario;";
                            $query = mysqli_query($conexion,$sql);
                            $clientes = mysqli_num_rows($query);
                            echo $clientes;
                            ?>

            </h1>
            <span>Cards</span>
          </div>
          <div>
            <span class="las la-credit-card"></span>
          </div>
        </div>

        <div class="cards-single">
          <div>
            <h1>
            <?php
                            include('db.php');
                            $sql = "SELECT SUM(dinero) as mtotal FROM cuentas";
                            $query = mysqli_query($conexion,$sql);
                            $income = mysqli_fetch_array($query, MYSQLI_ASSOC);
                            echo $income["mtotal"];
                            ?>
            </h1>
            <span>Income</span>
          </div>
          <div>
            <span class="lab la-google-wallet"></span>
          </div>
        </div>
      </div>

      <div class="recent-grid">
        <div class="projects">
          <div class="card">
            <div class="card-header">
              <h3>Recent Projects</h3>

              <button>See all <span class="las la-arrow-right">
                </span></button>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table width="100%">
                  <thead>
                    <tr>
                      <th>Project Tittle</th>
                      <th>Departament</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>UI/UX Design</td>
                      <td>UI Team</td>
                      <td>
                        <span class="status purple"></span>
                        review
                      </td>
                    </tr>
                    <tr>
                      <td>Web development</td>
                      <td>Frontend</td>
                      <td>
                        <span class="status pink"></span>
                        in progress
                      </td>
                    </tr>
                    <tr>
                      <td>Ushop app</td>
                      <td>Mobile Team</td>
                      <td>
                        <span class="status orange"></span>
                        pending
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="clients">
          <div class="card">
            <div class="card-header">
              <h2>New Clients</h2>

              <a href="users.php"><button>See all <span class="las la-arrow-right">
                  </span></button></a>
            </div>
            <div class="card-body">
              <?php
                        $sql = "SELECT nombre FROM usuarios WHERE rol = 0 ORDER BY id DESC LIMIT 4;";
                        $query = mysqli_query($conexion,$sql);
                        while($row=mysqli_fetch_array($query)){
                        ?>
              <div class="client">
                <div class="info">
                  <img src="assets/images/bbank.png" width="40px" height="40px" alt="">
                  <div>
                    <h4><?php echo $row['nombre']?></h4>
                    <small>Client</small>
                  </div>
                </div>
                <div class="contact">
                  <span class="las la-user-circle"></span>
                  <span class="las la-comment"></span>
                  <span class="las la-phone"></span>
                </div>
              </div>
              <?php };?>

            </div>
          </div>
        </div>
    </main>
  </div>

</body>

</html>