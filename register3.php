<?php

@session_start();

if (!isset($_GET['token']) || !isset($_GET['email'])) {
    

    echo "<script type='text/javascript'>
    window.location='register.php';
    </script>";

}



include("conex.php");

        $sql = "SELECT * FROM usuario WHERE em_us = '".$_GET['email']."' AND token_us = '".$_GET['token']."';";
        $result = mysqli_query($conex, $sql);

        if (mysqli_num_rows($result) > 0) {
        $us = mysqli_fetch_assoc($result);

        $id = $us['cod_us'];


        $q2 = "UPDATE usuario SET veri_us = 1, token_us = '' WHERE cod_us = ".$id.";";
    
        $sq2 = mysqli_query($conex, $q2);


        header("Location: exitoregister.php");

        }

        else {

        header("Location: register.php");

        }



?>