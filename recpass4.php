<?php

@session_start();

if (!isset($_POST['submit']) || !isset($_POST['id'])) {
    

    echo "<script type='text/javascript'>
    window.location='login.php';
    </script>";

}



include("conex.php");

    if ($_POST['pass'] == $_POST['repetir_pass']) {

        $q2 = "UPDATE usuario SET pass_us = '".md5($_POST['pass'])."', token_us = '' WHERE cod_us = ".$_POST['id'].";";
    
        $sq2 = mysqli_query($conex, $q2);


        header("Location: exitorecpass.php");

    }

    else {

        header("Location: errorecpass.php");

    }



?>