<?php

@session_start();

if (!isset($_POST['nombre']) || !isset($_SESSION['admin']) || $_SESSION['admin'] == 0) {
    

    echo "<script type='text/javascript'>
     window.location='index.php';
    </script>";

}

include("conex.php");

$nombre = $_POST['nombre'];



        $q = "INSERT INTO genero (nom_gen) VALUES ('".$nombre."');";

    $sq = mysqli_query($conex, $q);

    header("Location: generos.php");




?>