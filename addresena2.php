<?php

@session_start();

if (!isset($_POST['submit']) || !isset($_SESSION['id'])) {
    

    header("Location: index.php");

}

include("conex.php");

$pelicula = $_POST['id_pel'];

$usuario = $_POST['id_us'];

$titulo = $_POST['titulo'];

$desc = $_POST['desc'];

$puntos = $_POST['puntos'];

$reac = $_POST['reac'];

$q = "INSERT INTO resena (us_res, pel_res, puntos_res, titulo_res, desc_res, reac_res) VALUES (".$usuario.", ".$pelicula.", ".$puntos.", '".$titulo."', '".$desc."', '".$reac."');";

$sq = mysqli_query($conex, $q);

echo "<script type='text/javascript'>
        window.location='detallepelicula.php?id=".$pelicula."';
        </script>";

?>