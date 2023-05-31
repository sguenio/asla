<?php

include 'connect.php';

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

    $hashed_password = hash('sha256', $password);


    $sql1="insert into `usuarios` (username, password, usertype) values ('$username', '$hashed_password', '$usertype')";

    

    if(mysqli_query($con, $sql1)){
        $idUsuario = mysqli_insert_id($con);

        $sql2="insert into `empleados` (idUsuario, DNI, nombre, apellido, fechaNac, genero, calle, numero, barrio, localidad, area, organismo) values('$idUsuario','$DNI','$nombre','$apellido', '$fechaNac', '$genero','$calle','$numero', '$barrio', '$localidad','$area', '$organismo')";

        if(mysqli_query($con, $sql2)){
            header('location:display.php');
        } else{
            echo "Error al ejecutar la consulta: " . mysqli_error($con);
        }
    } else{
        echo "Error al ejecutar la consulta: " . mysqli_error($con);
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

    <form id="miFormulario" method="POST" disabled="true">

        <h3>Datos personales ✅</h3><br>

        <div class="form-group">
            <label>DNI</label>
            <input type="text" class="form-control" placeholder="Ingresa el DNI del Empleado" name="DNI1" autocomplete="off" id="DNI1">             
        </div>

        <button type="submit1" class="btn btn-primary" name="submit1">Buscar</button>

        <div class="form-group my-3">
            <label>DNI Ingresado</label>
            <input type="text" class="form-control" name="DNI" autocomplete="off" id="DNII" readonly>             
        </div>

        <div class="form-group my-3">
            <label>Nombre</label>
            <input type="text" class="form-control" placeholder="Ingresa el nombre del Empleado" name="nombre" autocomplete="off" id="caja" disabled="">             
        </div>
        
        <div class="form-group">
            <label>Apellido</label>
            <input type="text" class="form-control" placeholder="Ingresa el Apellido del Empleado" name="apellido" autocomplete="off" id="caja" disabled="">             
        </div>

        
        <div class="form-group">
            <label>Fecha de Nacimiento</label>
            <input type="date" class="form-control" placeholder="Ingresa la fecha de Nacimiento" name="fechaNac" autocomplete="off" id="caja" disabled="">             
        </div>

        <div class="form-group">
            <label>Género</label> <br>
            <select name="genero" autocomplete="off" id="caja" disabled="">
                <option value="disabled">Selecciona una opción</option>
                <option value="1">Masculino</option>
                <option value="2">Femenino</option>
                <option value="3">No Binario</option>
                <option value="4">Otro</option>
            </select>            
        </div>

        <div class="form-group">
            <label>Calle</label>
            <input type="text" class="form-control" placeholder="Ingresa la Calle" name="calle" autocomplete="off" id="caja" disabled="">             
        </div>

        <div class="form-group">
            <label>Número</label>
            <input type="text" class="form-control" placeholder="Ingresa el número" name="numero" autocomplete="off" id="caja" disabled="">             
        </div>

        <div class="form-group">
            <label>Barrio</label>
            <input type="text" class="form-control" placeholder="Ingresa el barrio" name="barrio" autocomplete="off" id="caja" disabled="">             
        </div>

        <div class="form-group">
            <label>Localidad</label>
            <input type="text" class="form-control" placeholder="Ingresa la localidad" name="localidad" autocomplete="off" id="caja" disabled="">             
        </div>

        <div class="form-group">
            <label>Área</label> <br>
            <select name="area" autocomplete="off" id="caja" disabled="">
                <option value="disabled">Selecciona un área</option>
                <option value="1">Recursos Humanos</option>
                <option value="2">Informática</option>
                <option value="3">Atención al Ciudadano</option>
            </select>            
        </div>

        <div class="form-group">
            <label>Organismo</label> <br>
            <select name="organismo" autocomplete="off" id="caja" disabled="">
                <option value="disabled">Seleccione un Organismo</option>
                <option value="1">Ministerio de Justicia y Derechos Humanos</option>
                <option value="2">Ministerio de la Niñez</option>
                <option value="3">Ministerio de la Mujer</option>
            </select>            
        </div>

        <br><h3>Datos de acceso 🔒</h3><br>

        <div class="form-group">
            <label>Correo Electrónico</label>
            <input type="email" class="form-control" placeholder="Ingresa el Correo Electrónico" name="username" autocomplete="off" id="caja" disabled="">             
        </div>

        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" class="form-control" placeholder="Ingresa la contraseña" name="password" autocomplete="off" id="caja" disabled="">             
        </div>

        <div class="form-group">
            <label>Rol de Usuario</label> <br>
            <select name="usertype" autocomplete="off" id="caja" disabled="">
                <option value="user">Empleado</option>
                <option value="admin">Administrador</option>
            </select>            
        </div>

       <button type="submit" class="btn btn-primary" name="submit">Registrar</button>
    </form>

    </div>

    <script type="text/javascript">
<?php
if(isset($_POST['submit1'])){
    $DNI=$_POST['DNI1'];
    $auxiliar = $_POST['DNI1'];
    $consulta = $sql = "SELECT * FROM `empleados` WHERE DNI = '".$DNI."'";
    $resultado = mysqli_query($con, $consulta);
    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_assoc($resultado);
        $dni_en_bd = $fila['DNI'];
        ?>
        alert("El empleado con el DNI <?php echo $DNI;?> ya existe");
        <?php
    } else { // Si no existe el DNI
        ?>
        var formulario = document.getElementById("miFormulario");
        formulario.nombre.disabled = false;
        formulario.apellido.disabled = false;
        formulario.fechaNac.disabled = false;
        formulario.genero.disabled = false;
        formulario.calle.disabled = false;
        formulario.numero.disabled = false;
        formulario.barrio.disabled = false;
        formulario.localidad.disabled = false;
        formulario.area.disabled = false;
        formulario.organismo.disabled = false;
        formulario.username.disabled = false;
        formulario.password.disabled = false;
        formulario.usertype.disabled = false;
        document.getElementById("DNI1").value = "<?php echo $DNI;?>";
        document.getElementById("DNII").value = "<?php echo $DNI;?>";
        formulario.DNI.disabled = false;
        <?php
        
    }
}
?>

</script>


  </body>
</html>