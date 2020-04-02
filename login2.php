<?php

session_start();

if (!isset($_POST['submit'])) {

    header("Location: login.php");

}

include("conex.php");

$pass = md5($_POST['pass']);

$email = $_POST['email'];

$q = "SELECT * FROM usuario WHERE em_us = '".$email."' AND pass_us = '".$pass."';";

$sq = mysqli_query($conex, $q);

$q2 = "SELECT * FROM usuario WHERE em_us = '".$email."' AND pass_us = '".$pass."';";

$sq2 = mysqli_query($conex, $q2);

$q3 = "SELECT * FROM usuario WHERE em_us = '".$email."' AND pass_us = '".$pass."';";

$sq3 = mysqli_query($conex, $q3);

if (mysqli_num_rows($sq) > 0) {

$_SESSION['user'] = mysqli_fetch_assoc($sq)['nom_us'];

$_SESSION['admin'] = mysqli_fetch_assoc($sq2)['admin_us'];

$_SESSION['id'] = mysqli_fetch_assoc($sq3)['cod_us'];

header("Location: index.php");

}

else {

    header("Location: login.php");

}



?>