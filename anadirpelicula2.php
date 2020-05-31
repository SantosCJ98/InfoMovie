<?php

@session_start();

if (!isset($_POST['submit']) || !isset($_SESSION['admin']) || $_SESSION['admin'] == 0) {
    

    echo "<script type='text/javascript'>
     window.location='index.php';
    </script>";

}

function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}

include("conex.php");

$portada = $_POST['port'];


$titulo = $_POST['titulo'];

$desc = $_POST['desc'];

$genero = $_POST['genero'];

$fecha = $_POST['fecha'];

$img = $nombre;



if (filter_var($portada, FILTER_VALIDATE_URL)) {

    if (endsWith($portada, ".jpg") || endsWith($portada, ".png") || endsWith($portada, ".gif")) {

        $q = "INSERT INTO pelicula (nom_pel, desc_pel, port_pel, fecha_pel, gen_pel, cat_pel, sinc_pel) VALUES ('".$titulo."', '".$desc."', '".$portada."', '".$fecha."', ".$genero.", 1, 1);";

    $sq = mysqli_query($conex, $q);

    $q = "SELECT MAX(cod_pel) as max FROM pelicula;";

    $max = mysqli_query($conex, $q);

    $res = mysqli_fetch_assoc($max);

    header("Location: detallepelicula.php?id=".$res['max']);

    }

    else {

        header("Location: errorformato.php");

    }


}

else {

    header("Location: errorurl.php");


}


?>