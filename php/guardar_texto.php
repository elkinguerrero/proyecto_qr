<?php
    session_start();

    include "conexion.php";

    $contrato = $_POST['contrato'];
    $id = $_POST['id'];
    $fecha = $_POST['fecha'];

    $conexion = mysqli_connect($servidor['host_client'], $servidor['user'], $servidor['pass'], $servidor["database"]);
    $resultado = mysqli_query($conexion,"INSERT INTO `agenda`(`fecha`, `id_contrato`, `foto_de_contrato`, `id_cliente`, `Imagenes_adicionales`) VALUES ('$fecha','$contrato','','$id','')");

    $resultado = mysqli_query($conexion,"SELECT MAX(id) AS 'max' FROM `agenda`");

    while ($fila = mysqli_fetch_array($resultado)) {
        $_SESSION['max'] = $fila['max'];
    }
?>