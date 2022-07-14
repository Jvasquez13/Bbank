<?php


include('../db.php');

$cuenta = $_POST["cuenta"];
$monto = $_POST["monto"];
$cvv = $_POST["cvv"];
$date = date('Y-m-d');

session_start();
date_default_timezone_set('UTC');



$consulta = "SELECT cuenta  FROM cuentas where cuenta = '$cuenta'";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_num_rows($resultado);

$consultaCvv = "SELECT cvv  FROM tarjetas where cvv = '$cvv'";
$resultado = mysqli_query($conexion, $consultaCvv);
$validar = mysqli_num_rows($resultado);



if ($filas > 0 && $validar > 0) {

    $id = $_SESSION['id'];
    $nombre = $_SESSION['nombre'];

    /* $query_dinero = "SELECT dinero
    FROM cuentas
    ORDER BY
    (CASE
        WHEN dinero > $monto THEN IS 0
        ELSE 1
    END); '"; 

    $result_dinero = mysqli_query($conexion, $query_dinero);*/

    $query = "INSERT INTO transacciones (id_usuario, nombre, cuenta_destino, fecha, monto) 
    VALUES ('$id', '$nombre', '$cuenta', '$date', '$monto')";
    $ejecutar = mysqli_query($conexion, $query);

    $update_resta = "UPDATE cuentas SET dinero = (dinero - $monto) WHERE id_usuario = '$id'";
    $ejecutar_resta = mysqli_query($conexion, $update_resta);

    $updateSuma = "UPDATE cuentas SET dinero = (dinero + $monto) WHERE cuenta = '$cuenta'";
    $ejecutar_suma = mysqli_query($conexion, $updateSuma);

    /*if ($result_dinero = true) {

       
    } else {
        echo '
            <script>
                alert("SALDO INSUFICIENTE");
            </script>

        ';
    }*/

    if ($ejecutar) {

        echo '
            <script>
                window.location = "puerquito.php"
                
            </script>
        
        ';
    } else {
        echo '
            <script>
                alert("TRANSACTION FAILED");
                window.location = "transfer.php"
            </script>
        
        ';
    }

    mysqli_close($conexion);
} elseif ($validar == 0) {

    echo
    '<script>
        alert("CVV NOT FOUND");
        window.location = "transfer.php"
    </script>';
} elseif ($filas == 0) {

    echo '
        <script>
        alert("ACCOUNT NOT FOUND!!!!");
        window.location = "transfer.php"
        </script>    
    
        ';
}
