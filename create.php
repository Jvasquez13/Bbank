<?php

session_start();

if(!isset($_SESSION['usuario'])){

    echo '
        <script>
            alert("Por favor debes iniciar sesión") 
            window.location = "../cyberwarrior/login.php"; 
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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/css/estilosAdmin1.css">
    
</head>
<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"> <span>Admin</span></span></h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="admin.php"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="create.php" class="active"><span class="las la-user-plus"></span>
                    <span>Create Clients</span></a>
                </li>
                <li>
                    <a href="users.php"><span class="las la-users"></span>
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

                Create Users
            </h2>

            <div class="user-wrapper">
                <img src="assets/images/adminIcon.png" width="30px" height="30px" alt="">
                <div>
                    <h4>Admin</h4>
                </div>
            </div>
        </header>

    <main>
        
        <section class="container_admin">
            <img src="assets/images/bbank.png" class="avatar" srcset="">
            <h1>User Registration</h1>
            <form action="agregar.php" method="POST">
                <input type="text" class="itext" placeholder="Full Name" name="nombre" required>
                <input type="text" class="itext" placeholder="Email"name="email" required>
                <input type="text" class="itext" placeholder="Username" name="usuario" required>
                <input type= "password" class="itext" placeholder="Password" name="password" required><br>
                <label for="rol">Rol:</label>
                <select name="rol" class="itext">
                <option value="1">Administrator</option>
                <option value="0">User</option>
                </select><br>
                <label for="status">Status:</label>
                <select name="status" class="itext">
                <option value="1">Active</option>
                <option value="0">Desactivate</option>
                </select><br>
                <input type="submit" class="btnRegistrar" value="Register"/>
            </form>
        </section>
            
    </main>
    <script src="assets/js/scriptAdmin.js"></script>
</body>

</html>