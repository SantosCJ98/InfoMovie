<?php

session_start();

if (!isset($_POST['submit']) || !isset($_SESSION['admin']) || $_SESSION['admin'] == 0) {
    

    echo "<script type='text/javascript'>
  window.location='index.php';
  </script>";

}



include("conex.php");


$titulo = $_POST['titulo'];

$desc = $_POST['desc'];

$genero = $_POST['genero'];

$fecha = $_POST['fecha'];

$q = "UPDATE pelicula SET nom_pel = '".$titulo."', desc_pel = '".$desc."', fecha_pel = '".$fecha."', gen_pel = ".$genero." WHERE cod_pel = " .$_POST['id'].";";


$sq = mysqli_query($conex, $q);

header("Location: detallepelicula.php?id=".$_POST['id']);


?>