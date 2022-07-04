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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/css/estilosAdmin1.css">
    
</head>
<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"> <span><?php echo $_SESSION["nombre"]?></span></span></h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span class="las la-igloo"></span>
                    <span>Home</span></a>
                </li>
                <li>
                    <a href="" ><span class="las la-users"></span>
                    <span>Create Clients</span></a>
                </li>
                <li>
                    <a href="" ><span class="las la-user-plus"></span>
                    <span>Clients</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-user-circle"></span>
                    <span>Bank Accounts</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-credit-card"></span>
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
                <img src="assets/images/adminIcon.png" width="30px" height="30px" alt="">
                <div>
                    <h4><?php echo $_SESSION["nombre"]?></h4>
                </div>
            </div>
        </header>

    <main>
        <h1>Welcome back, <?php echo $_SESSION["nombre"]?>!!!</h1><br>
    </main>
    <script src="assets/js/scriptAdmin.js"></script>
</body>

</html>