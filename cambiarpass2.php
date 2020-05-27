<?php

@session_start();

if (!isset($_POST['submit']) || !isset($_SESSION['id'])) {
    

    echo "<script type='text/javascript'>
    window.location='index.php';
    </script>";

}



include("conex.php");

$q = "SELECT * FROM usuario WHERE cod_us = ".$_SESSION['id'].";";
    
$sq = mysqli_query($conex, $q);

if (md5($_POST['pass']) == mysqli_fetch_assoc($sq)['pass_us']) {

    if ($_POST['pass'] != $_POST['nueva_pass']) {

        $q2 = "UPDATE usuario SET pass_us = '".md5($_POST['nueva_pass'])."' WHERE cod_us = ".$_SESSION['id'].";";
    
        $sq2 = mysqli_query($conex, $q2);

         header("Location: exitopass.php");

    }

    else {

        header("Location: errorcambiopass.php");

    }

}

else {

   header("Location: errorcambiopass.php");


}



?>