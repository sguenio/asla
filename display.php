<?php
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    
</head>
<body>
    
    <div class="container">
        <a href="register.php" class="text-light">
            <button class="btn btn-primary my-5">Añadir empleado</button>  
        </a>
    
        
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID Empleado</th>
            <th scope="col">DNI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Fecha de Nacimiento</th>
            <th scope="col">Género</th>
            <th scope="col">Calle</th>
            <th scope="col">Número</th>
            <th scope="col">Barrio</th>
            <th scope="col">Localidad</th>
            <th scope="col">Area</th>
            <th scope="col">Organismo</th>
            <th scope="col">Operaciones</th>
            </tr>
        </thead>
        <tbody>

        <?php

        // Verificar si la tabla está vacía
        $sql1 = "SELECT COUNT(*) as total FROM `empleados`";
        $resultado1 = mysqli_query($con, $sql1);
        $row1 = mysqli_fetch_assoc($resultado1);

        // Verificar si la tabla está vacía
        $sql2 = "SELECT COUNT(*) as total FROM `usuarios`";
        $resultado2 = mysqli_query($con, $sql2);
        $row2 = mysqli_fetch_assoc($resultado2);

        // Si ambas tablas están vacías, reiniciar el autoincremento a 1 en ambas tablas
        if ($row1['total'] == 0 && $row2['total'] == 0) {
            $sql3 = "ALTER TABLE `empleados` AUTO_INCREMENT = 1";
            $sql4 = "ALTER TABLE `usuarios` AUTO_INCREMENT = 1";
            mysqli_query($con, $sql3);
            mysqli_query($con, $sql4);
}
        $sql = "SELECT e.idUsuario, e.DNI, e.nombre, e.apellido, e.fechaNac, g.nombre AS genero, e.calle, e.numero, e.barrio, e.localidad, a.nombre AS area, o.nombre AS organismo FROM empleados e INNER JOIN genero g ON e.genero = g.idGenero INNER JOIN area a ON e.area = a.idArea INNER JOIN organismos o ON e.organismo = o.idOrganismo;";

        $result=mysqli_query($con,$sql);
        if ($result){
            while($row=mysqli_fetch_assoc($result)){
                $idUsuario = $row['idUsuario'];
                $DNI = $row['DNI'];
                $nombre=$row['nombre'];
                $apellido=$row['apellido'];
                $fechaNac=$row['fechaNac'];
                $genero=$row['genero'];
                $calle=$row['calle'];
                $numero=$row['numero'];
                $barrio=$row['barrio'];
                $localidad=$row['localidad'];
                $area=$row['area'];
                $organismo=$row['organismo'];
                echo '                
                <tr>
                    <th scope="row">'.$idUsuario.'</th>
                        <td>'.$DNI.'</td>
                        <td>'.$nombre.'</td>
                        <td>'.$apellido.'</td>
                        <td>'.$fechaNac.'</td>
                        <td>'.$genero.'</td>
                        <td>'.$calle.'</td>
                        <td>'.$numero.'</td>
                        <td>'.$barrio.'</td>
                        <td>'.$localidad.'</td>
                        <td>'.$area.'</td>
                        <td>'.$organismo.'</td>
                        <td>

                        <a href="update.php?updateid='.$idUsuario.'" class="text-light">    
                            <button class="btn btn-primary">Editar</button>
                        </a>

                        <a href="delete.php?deleteid='.$idUsuario.'" class="text-light">
                            <button class="btn btn-danger">Eliminar</button>
                        </a>

                        </td>
                    </tr>
                <tr>                
                ';
            }

            
        }



        ?>

        

        </tbody>
    </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/sweetAlert.js"></script>
</body>
</html>