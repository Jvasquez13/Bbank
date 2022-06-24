<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel= "stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>Already have an account?</h3>
                    <p>Log in now.</p>
                    <button id="btn__iniciar-sesion"> Log In</button>
                    <a href="index.html"><button>Go back</button></a>
                </div>
                <div class="caja__trasera-register">
                    <h3>Welcome to Client Space </h3>
                    <p>Don't have an account? Sign up!</p>
                    <button id="btn__registrarse"> Sign Up</button>
                    <a href="index.html"><button>Go back</button></a>
                </div>
            </div>
            <!-- Formulario de login y Registro-->
            <div class="contenedor__login-register">
                <!--login-->
                <form action="validar.php" method="POST" class="formulario__login">
                    <h2>Log In</h2>
                    <input type ="text" placeholder="Email" name="email">
                    <input type ="password" placeholder="Password" name="password">
                    <button>Log In</button>
                </form>
                <!-- registro -->
                <form action="registro_usuario.php" method="POST" class="formulario__register">
                    <h2>Sign up</h2>
                    <input type="text" placeholder="Full Name" name="nombre">
                    <input type="text" placeholder="Email"name="email">
                    <input type="text" placeholder="User" name="usuario">
                    <input type= "password" placeholder="Password" name="password">
                    <button>Sign Up</button>
                </form>
            </div>
        </div>
    </main>
    <script src="assets/js/script.js"></script>
</body>
</html>