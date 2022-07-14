<?php
include("../db.php");


session_start();

if (!isset($_SESSION['usuario'])) {

  echo '
        <script>
            alert("Por favor debes iniciar sesión") 
            window.location = "../login.php"; 
        </script>
    ';
  session_destroy();
  die();
}
/**
 * ?cuenta destino (input)
 * ?cuanto desea transferir(input)
 * ?query where cuenta sea "cuenta destino" update balance mas
 * ?"el monto a transferir"
 * ?query where "balance de ususario actual" menos "el monto a transferir"
 *  ?button (pagar srevicio)
 * ?button(retornar)
 */

//!UPDATE Persona SET Telefono='202030' WHERE Id = 4;
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transactions</title>
  <link rel="stylesheet" href="../assets/css/styletranfer.css">

</head>

<body>
  <div class='container'>
    <div class='window'>
      <div class='order-info'>
        <div class='order-info-content'>
          <h1> Transaction Process</h1>
          <div class='line'></div>
          <table class='order-table'>
            <thead>
              <?php
              $rol = $_SESSION['rol'];
              ?>
            </thead>
            <tbody>
              <tr>
                <td><img src='../assets/images/userIcono.png' class='full-width'></img>
                </td>
                <td>
                  <br> <span class='thin'>Account</span>
                  <br><?php
                      $id = $_SESSION['id'];
                      if ($rol == 0) {
                        $sql = "SELECT * FROM usuarios u INNER JOIN cuentas c ON c.id_usuario = u.id WHERE $id = c.id_usuario;";
                      };

                      $query = mysqli_query($conexion, $sql);
                      while ($row = mysqli_fetch_array($query)) {
                        $rowcount = mysqli_num_rows($query);
                      ?>
                    <?php echo $row['cuenta'] ?>
                  <?php
                      }
                  ?>


                </td>

              </tr>
              <tr>

              </tr>
            </tbody>

          </table>
          <div class='line'></div>
          <table class='order-table'>
            <tbody>
              <tr>
                <td><img src='../assets/images/creditcard.png' class='full-width'></img>
                </td>
                <td>
                  <br> <span class='thin'>Card Number</span>
                  <br><?php
                      $id = $_SESSION['id'];
                      if ($rol == 0) {
                        $sql = "SELECT u.nombre, u.email, c.cuenta, t.numero, t.id, t.fecha_creacion, t.fecha_expiracion, t.cvv FROM usuarios u INNER JOIN cuentas c ON u.id = c.id_usuario INNER JOIN tarjetas t ON t.id_cuenta = c.id_usuario WHERE $id = t.id_cuenta;";
                      };

                      $query = mysqli_query($conexion, $sql);
                      while ($row = mysqli_fetch_array($query)) {
                        $rowcount = mysqli_num_rows($query);
                      ?>
                    <?php echo $row['numero'] ?>
                  <?php
                      }
                  ?>
                </td>
              </tr>

            </tbody>
          </table>
          <div class='line'></div>
          <table class='order-table'>
            <tbody>
              <tr>
                <td><img src='../assets/images/institutionss.png' class='full-width'></img>
                </td>
                <td>
                  <br> <span class='thin'>Institution</span>
                  <br>Bug Bank<br>
                </td>

              </tr>

            </tbody>
          </table>
        </div>
      </div>
      <div class='credit-info'>
        <div class='credit-info-content'>
          
            <img src="../assets/images/bbank.png" height='200' class='Bbank-logo' id='Bbank-logo'></img>
           
          <form action="transactionbutton.php" method="POST">

            <b style="color:black">Destination-Account</b>
            <input type="text" name="cuenta" class='input-field'></input>
            
            <b style="color:black">Amount</b>
            <input type="text" id="amount" name="monto" class='input-field'></input>
            
            <table class='half-input-table'>
             
            
             <td> <b style="color:black">CVV</b>
                <input type="text" name="cvv" class='input-field'></input>
              </td>
              
            </table>
            <button class='pay-btn' onclick="return confirmAmout()">Transfer</button>
          </form>
        </div>

      </div>
    </div>
  </div>
  <script src="../assets/js/transfer.js"></script>
</body>

</html>