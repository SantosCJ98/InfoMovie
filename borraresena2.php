<?php

session_start();

if (!isset($_POST['si']) || !isset($_POST['no']) || !isset($_SESSION['admin']) || $_SESSION['admin'] == 0) {
    

    echo "<script type='text/javascript'>
    window.location='index.php';
    </script>";

}



include("conex.php");

if (isset($_POST['si'])) {

    $q = "DELETE FROM resena WHERE cod_res = ".$_POST['id'].";";
    
    $sq = mysqli_query($conex, $q);

    header("Location: exito.php");

}

else {



header("Location: index.php");

}


?>