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

    $rol = $_SESSION['rol'];

    if($rol == 1){
        header('location: admin.php');
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
      <h2><span class="las la-university"> <span>BBank</span></span></h2>
    </div>

    <div class="sidebar-menu">
      <ul>
        <li>
          <a href="home.php" class="active"><span class="las la-igloo"></span>
            <span>Home</span></a>
        </li>
        <li>
          <a href="accounts/accounts_user.php"><span class="las la-piggy-bank"></span>
            <span>Bank Accounts</span></a>
        </li>
        <li>
          <a href="cards/cards_user.php"><span class="las la-credit-card"></span>
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

        Home
      </h2>

      <div class="user-wrapper">
        <img src="assets/images/userIcono.png" width="30px" height="30px" alt="">
        <div>
          <h4><?php echo $_SESSION["nombre"]?></h4>
        </div>
      </div>
    </header>

    <main>
      <h1>Welcome back, <?php echo $_SESSION["nombre"]?>!!!</h1><br>

      <div class="cards">

        <div class="cards-single">
          <div>
            <h1>$3200</h1>
            <span>Balance</span>
          </div>
          <div>
            <span class="lab la-google-wallet"></span>
          </div>
        </div>

        <div class="cards-single">
          <div>
            <h1>1</h1>
            <span>Accounts</span>
          </div>
          <div>
            <span class="las la-piggy-bank"></span>
          </div>
        </div>

        <div class="cards-single">
          <div>
            <h1>2</h1>
            <span>Cards</span>
          </div>
          <div>
            <span class="las la-credit-card"></span>
          </div>
        </div>

        <div class="cards-single">
          <div>
            <h1>$0</h1>
            <span>Credit this month</span>
          </div>
          <div>
            <span class="las la-piggy-bank"></span>
          </div>
        </div>
      </div>

      <div class="recent-grid">
        <div class="projects">
          <div class="card">
            <div class="card-header">
              <h3>Transaction History</h3>

              <button>See all <span class="las la-arrow-right">
                </span></button>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table width="100%">
                  <thead>
                    <tr>
                      <th>Pay Id</th>
                      <th>Name</th>
                      <th>Account No</th>
                      <th>Date</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>John</td>
                      <td>432321312</td>
                      <td>2022-07-05</td>
                      <td>-100</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>John</td>
                      <td>432321312</td>
                      <td>2022-07-05</td>
                      <td>-200</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>John</td>
                      <td>432321312</td>
                      <td>2022-07-05</td>
                      <td>-500</td>
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
              <h2>Products</h2>

              <a href="creditCards.php"><button>See all <span class="las la-arrow-right">
                  </span></button></a>
            </div>
            <div class="card-body">
              <div class="client">
                <div class="info">
                  <img src="assets/images/tarjeta.jpg" width="40px" height="40px" alt="">
                  <div>
                    <h4>MasterCard Platinum</h4>

                  </div>
                </div>
                <div class="contact">
                  <span class="las la-eye"></span>
                  <span class="las la-bell"></span>
                  <span class="las la-exclamation-circle"></span>
                </div>
              </div>
              <div class="client">
                <div class="info">
                  <img src="assets/images/tarjeta2.jpg" width="40px" height="40px" alt="">
                  <div>
                    <h4>Visa Gold</h4>

                  </div>
                </div>
                <div class="contact">
                  <span class="las la-eye"></span>
                  <span class="las la-bell"></span>
                  <span class="las la-exclamation-circle"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>
  </div>
  </main>
  <script src="assets/js/scriptAdmin.js"></script>
</body>

</html>