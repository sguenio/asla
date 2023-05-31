<?php

    include 'connect.php';
    if(isset($_GET['deleteid'])){
        $idUsuario=$_GET['deleteid'];
        $sql1="DELETE FROM `empleados` WHERE idUsuario=$idUsuario";
        $sql2="DELETE FROM `usuarios` WHERE id=$idUsuario";        
        $result1=mysqli_query($con,$sql1);
        $result2=mysqli_query($con,$sql2);
        if ($result1){
            if ($result2){
                header('location:display.php');
            } else{
            die(mysqli_error($con));
        }
    }
    
    }
?>