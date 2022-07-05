<?php
include('db.php');


$sql = "SELECT * from usuarios where nombre like lower('%".$_POST["buscar"]."%')";
$resultado = $conexion->query($sql);

$numero = mysqli_num_rows($resultado);
?>

<div class="container__Tabla">
            <div class="tabla__header">
                <h2>Banking Users</h2>
                <a href="create.php"><button>New User</button></a>
                <img src="assets/images/bbank.png" class="avatar" srcset="">
                    <table>
                        <thead>
                            <tr>
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
while($encontrados = mysqli_fetch_assoc($resultado)){
?>

                             <tr>
                                <td><?php echo $encontrados['nombre']?></td>
                                <td><?php echo $encontrados['email']?></td>
                                <td><?php echo $encontrados['usuario']?></td>
                                <td><?php echo $encontrados['password']?></td>
                                <td><?php echo $encontrados['rol']?></td>
                                <td><?php echo $encontrados['status']?></td>
                                <td><a href="delete.php?id=<?php echo $encontrados['id']?>"> <i class="las la-user-slash" id="icons"></i></a></td>
                            </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                    </table>
                    <div class="tabla__footer">
                        <p> Users found: <?php print $numero?>
                    </div>
                </div>
            </div>
       </div>
