<?php

session_start();

if (!isset($_SESSION['usuario'])) {

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

if ($rol == 1) {
  header('location: admin.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>Transaction Success</title>
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="../css/estilosAdmin1.css">

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
          <a href="home.php"><span class="las la-igloo"></span>
            <span>Home</span></a>
        </li>
        <li>
          <a href="../accounts/accounts_user.php"><span class="las la-piggy-bank"></span>
            <span>Bank Accounts</span></a>
        </li>
        <li>
          <a href="../cards/cards_user.php" class="active"><span class="las la-credit-card"></span>
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

        Transactions
      </h2>

      <div class="user-wrapper">
        <img src="../images/userIcono.png" width="30px" height="30px" alt="">
        <div>
          <h4><?php echo $_SESSION["nombre"] ?></h4>
        </div>
      </div>
    </header>

	<main>
		<div class="piggy-wrapper">
			<div class="piggy-wrap">
				<div class="piggy">
			<div class="piggy-logo">SUCCESS</div>
					<div class="nose"></div>
					<div class="mouth"></div>
					<div class="ear"></div>
					<div class="tail">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div>
					<div class="eye"></div>
					<div class="hole"></div>
				</div>
			</div>
			<div class="coin-wrap">
				<div class="coin">b</div>
			</div>
			<div class="legs"></div>
			<div class="legs back"></div>

		</main>
	</div>	
</body>
</html>