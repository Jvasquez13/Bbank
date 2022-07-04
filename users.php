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
                    <a href="create.php" ><span class="las la-users"></span>
                    <span>Create Clients</span></a>
                </li>
                <li>
                    <a href="users.php" class="active"><span class="las la-user-plus"></span>
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

                Clients
            </h2>

            <div class="user-wrapper">
                <img src="assets/images/adminIcon.png" width="30px" height="30px" alt="">
                <div>
                    <h4>Admin</h4>
                </div>
            </div>
        </header>

    <main>
    
        <div class="container__Tabla">
            <div class="tabla__header">
                <h2>Banking Users</h2>
                <a href="create.php"><button>New User</button></a>
                <img src="assets/images/bbank.png" class="avatar" srcset="">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Rol</th>
                                <th>Status</th>
                             </tr>
                        </thead>
                            <tbody>
                            <?php
                                include('db.php');
                                $sql = "SELECT * from usuarios";
                                $query = mysqli_query($conexion,$sql);
                                while($row=mysqli_fetch_array($query)){
                                    $rowcount = mysqli_num_rows($query);
                            ?>
                             <tr>
                                <th><?php echo $row['id']?></th>
                                <th><?php echo $row['nombre']?></th>
                                <th><?php echo $row['email']?></th>
                                <th><?php echo $row['usuario']?></th>
                                <th><?php echo $row['password']?></th>
                                <th><?php echo $row['rol']?></th>
                                <th><?php echo $row['status']?></th>
                                <th><a href="delete.php?id=<?php echo $row['id']?>"> <i class="fa-solid fa-person-circle-minus" id="icons"></i></a></th>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                    </table>
                    <div class="tabla__footer">
                        <p> Total of users:  <?php print $rowcount?>
                    </div>
                </div>
            </div>
       </div>
    </main>
    
    <script src="assets/js/scriptAdmin.js"></script>
</body> 
</html>