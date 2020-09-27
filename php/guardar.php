<?php
    session_start();

    include "conexion.php";
    $countfiles = count($_FILES['multiple']['name']);
    $texto_1 = '';
    $texto_2 = '';

    for($i=0;$i<$countfiles;$i++){
        $dir_subida = '../img/';
        $separar = explode(".", $_FILES['multiple']['name'][$i]);
        $separar = $separar[count($separar)-1];
        $fichero_subido = $dir_subida . $_SESSION['max'] . $i . '_img_' . '.'.$separar;

        if($texto_1 == ''){
            $texto_1 .= $_SESSION['max'] . $i . '_img_' . '.'.$separar;
        }
        else{
            $texto_1 .= ',' . $_SESSION['max'] . $i . '_img_' . '.'.$separar;    
        }

        echo '<br><br>'.'<pre>';
        if (move_uploaded_file($_FILES['multiple']['tmp_name'][$i], $fichero_subido)) {
            echo "El fichero es válido y se subió con éxito.\n";
        } else {
            echo "¡Posible ataque de subida de ficheros!\n";
        }
    }

    echo 'contrato<br>';

    $dir_subida = '../img/';
    $separar = explode(".", $_FILES['contrato']['name']);
    $separar = $separar[count($separar)-1];
    $fichero_subido = $dir_subida . $_SESSION['max'] . '_contrato_' . '.'.$separar;
    $texto_2 .= $_SESSION['max'] . '_contrato_' . '.'.$separar;


    echo '<br><br>'.'<pre>';
    if (move_uploaded_file($_FILES['contrato']['tmp_name'], $fichero_subido)) {
        echo "El fichero es válido y se subió con éxito.\n";
    } else {
        echo "¡Posible ataque de subida de ficheros!\n";
    }

    $conexion = mysqli_connect($servidor['host_client'], $servidor['user'], $servidor['pass'], $servidor["database"]);
    mysqli_query($conexion,"UPDATE `agenda` SET `foto_de_contrato`= '$texto_2',`Imagenes_adicionales`='$texto_1' WHERE `id` = " . $_SESSION['max']);

    header ("Location: ../");
?>