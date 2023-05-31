<?php

include 'connect.php';

$idUsuario = $_GET['updateid'];

if(isset($_POST['submit'])){

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $DNI=$_POST['DNI'];
    $fechaNac=$_POST['fechaNac'];
    $genero=$_POST['genero'];
    $calle=$_POST['calle'];
    $numero=$_POST['numero'];
    $barrio=$_POST['barrio'];
    $localidad=$_POST['localidad'];
    $area=$_POST['area'];
    $organismo=$_POST['organismo'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $usertype=$_POST['usertype'];

    $sql="update `empleados` set DNI='$DNI', nombre='$nombre', apellido='$apellido', fechaNac='$fechaNac', genero='$genero', calle='$calle', numero='$numero', barrio='$barrio', localidad='$localidad', area='$area', organismo='$organismo'";

    $result=mysqli_query($con,$sql);
    if($result){
        echo 'Datos actualizados';
    } else{
        die(mysqli_error($con));
    }
    
    #$result=mysqli_query($con,$sql);
    #if ($result){
        //echo "Data inserted succesfsad";
    #    header('location:display.php');
    #}else{
    #    die(mysqli_error($con));
    #}

}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

    <title>Panel de Administrador</title>
  </head>
  <body>

    <div class="container my-5">

    <form method="POST">

        <h3>Datos personales ✅</h3><br>

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" placeholder="Ingresa el nombre del Empleado" name="nombre">      
        </div>
        
        <div class="form-group">
            <label>Apellido</label>
            <input type="text" class="form-control" placeholder="Ingresa el Apellido del Empleado" name="apellido" autocomplete="off" value=<?php echo $apellido?>>             
        </div>

        <div class="form-group">
            <label>DNI</label>
            <input type="text" class="form-control" placeholder="Ingresa el DNI del Empleado" name="DNI" autocomplete="off" value=<?php echo $DNI?>>             
        </div>

        <div class="form-group">
            <label>Fecha de Nacimiento</label>
            <input type="date" class="form-control" placeholder="Ingresa la fecha de Nacimiento" name="fechaNac" autocomplete="off" >             
        </div>

        <div class="form-group">
            <label>Género</label> <br>
            <select name="genero" autocomplete="off">
                <option value="disabled">Selecciona una opción</option>
                <option value="1">Masculino</option>
                <option value="2">Femenino</option>
                <option value="3">No Binario</option>
                <option value="4">Otro</option>
            </select>            
        </div>

        <div class="form-group">
            <label>Calle</label>
            <input type="text" class="form-control" placeholder="Ingresa la Calle" name="calle" autocomplete="off">             
        </div>

        <div class="form-group">
            <label>Número</label>
            <input type="text" class="form-control" placeholder="Ingresa el número" name="numero" autocomplete="off">             
        </div>

        <div class="form-group">
            <label>Barrio</label>
            <input type="text" class="form-control" placeholder="Ingresa el barrio" name="barrio" autocomplete="off">             
        </div>

        <div class="form-group">
            <label>Localidad</label>
            <input type="text" class="form-control" placeholder="Ingresa la localidad" name="localidad" autocomplete="off">             
        </div>

        <div class="form-group">
            <label>Área</label> <br>
            <select name="area" autocomplete="off">
                <option value="disabled">Selecciona un área</option>
                <option value="1">Recursos Humanos</option>
                <option value="2">Informática</option>
                <option value="3">Atención al Ciudadano</option>
            </select>            
        </div>

        <div class="form-group">
            <label>Organismo</label> <br>
            <select name="organismo" autocomplete="off">
                <option value="disabled">Seleccione un Organismo</option>
                <option value="1">Ministerio de Justicia y Derechos Humanos</option>
                <option value="2">Ministerio de la Niñez</option>
                <option value="3">Ministerio de la Mujer</option>
            </select>            
        </div>

        <br><h3>Datos de acceso 🔒</h3><br>

        <div class="form-group">
            <label>Correo Electrónico</label>
            <input type="email" class="form-control" placeholder="Ingresa el Correo Electrónico" name="username" autocomplete="off">             
        </div>

        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" class="form-control" placeholder="Ingresa la contraseña" name="password" autocomplete="off">             
        </div>

        <div class="form-group">
            <label>Rol de Usuario</label> <br>
            <select name="usertype" autocomplete="off">
                <option value="user">Empleado</option>
                <option value="admin">Administrador</option>
            </select>            
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Actualizar</button>
    </form>

    </div>

  </body>
</html>