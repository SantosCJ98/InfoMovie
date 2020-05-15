<?php

@session_start();

if (!isset($_POST['nombre']) || !isset($_SESSION['admin']) || $_SESSION['admin'] == 0) {
    

    echo "<script type='text/javascript'>
     window.location='index.php';
    </script>";

}

include("conex.php");

$nombre = $_POST['nombre'];



        $q = "UPDATE genero SET nom_gen = '".$_POST['nombre']."' WHERE id_gen = ".$_POST['id'].";";

    $sq = mysqli_query($conex, $q);

    header("Location: generos.php");




?>