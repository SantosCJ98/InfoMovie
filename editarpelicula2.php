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

if (filter_var($portada, FILTER_VALIDATE_URL)) {

  if (endsWith($portada, ".jpg") || endsWith($portada, ".png") || endsWith($portada, ".gif")) {

$q = "UPDATE pelicula SET nom_pel = '".$titulo."', desc_pel = '".$desc."', fecha_pel = '".$fecha."', gen_pel = ".$genero." WHERE cod_pel = " .$_POST['id'].";";


$sq = mysqli_query($conex, $q);

header("Location: detallepelicula.php?id=".$_POST['id']);

  }

  else {

    header("Location: errorformato2.php?id=".$_POST['id']);

}

}


else {

header("Location: errorurl2.php?id=".$_POST['id']);


}



?>