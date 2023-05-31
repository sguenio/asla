<?php

    include 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $username = $_POST["username"];
        $password = $_POST["password"];
    
        $sql = "SELECT * FROM `usuarios` WHERE username = '".$username."' AND password = '".$password."'";
        $result = mysqli_query($con, $sql);
    
        if (mysqli_num_rows($result) == 1) {
            // Si se encuentra un registro en la tabla de usuarios, se muestra un mensaje de éxito y se redirige a la página de inicio de sesión.
            $row = mysqli_fetch_assoc($result);
            if($row["usertype"] == "user"){
                header("location:empleado.php");
            }elseif($row["usertype"] == "admin"){
                header("location:display.php");
            }
        } else {
            // Si no se encuentra ningún registro en la tabla de usuarios, se muestra un mensaje de error.
            echo "Nombre de usuario o contraseña incorrecta";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="styles/style.css"> 

    
    
</head>
<body>

<img src="./assets/wave3.svg" class="wave-right-top" alt="waves">
    
    <form action="#" method="POST" class="formulario">
        <img src="./assets/logoLargo.png" alt="Defensoria del pueblo">
        <h2><span>Bienvenido</span>
        ¡Consulta tu legajo virtual!🗓️</h2>
        <h3>Iniciar Sesion</h3>
        <div class="grupo">
            <label>Usuario</label>
            <input type="email" name="username" placeholder="Correo Electrónico" autocomplete="off" required>
        </div>
        <div class="grupo">
            <label>Contraseña</label>
            <input type="password" name="password" placeholder="Contraseña" autocomplete="off" required>
        </div>
        <button
            class="boton-ingresar"
            type="submit"
        >Ingresar</button>
    </form>
    <div class="imagen-principal">
        <img src="./assets/ilustracion.svg" alt="Imagen Principal">
    </div>
    <footer>
        <img src="./assets/wave-footer-svg.svg" class="wave-footer" alt="waves">
        <div class="logo-asla">
            <h4>Powered by </h4>
            <img src="./assets/ASLA-LOGO.png" alt="ASLA">
        </div>
    </footer>











            <!--
             <form action="#" method="POST">
                <div class="txt_field">
                    <label>Usuario</label>
                    <input type="email" name="username" placeholder="Correo Electrónico" autocomplete="off" required>
                    
                </div>
                <div class="txt_field">
                    <label>Contraseña</label>
                    <input type="password" name="password" placeholder="Contraseña" autocomplete="off" required>
                </div>

                <div class="btn-login">
                    <input class="submit" type="submit" value="Iniciar Sesión">
                </div>
            </form>

-->
        


        
 


</body>
</html>