<?php 
    
    $servidor = [];
    $servidor["host_client"] = "localhost";
    $servidor["user"] = "root";
    $servidor["pass"] = "";
    $servidor["database"] = "proyecto_qr";
    $servidor["puerto"] = "80";
       
    $conexion_transport = true;
    
    $conexion_cesion = mysqli_connect($servidor["host_client"], $servidor["user"], $servidor["pass"], $servidor["database"]);

    if (!$conexion_cesion) {
        $conexion_transport = false;
    }
    else{
        $conexion_transport = true;
    }
?>