<?php

if (!isset($_POST['submit'])) {

    header("Location: register.php");

}

include("conex.php");

$user = $_POST['user'];

$pass = md5($_POST['pass']);

$email = $_POST['email'];

$q = "SELECT * FROM usuario WHERE em_us = '".$email."';";

$sq = mysqli_query($conex, $q);

if (mysqli_num_rows($sq > 0)) {

    header("Location: register.php");

}

$query = "INSERT INTO usuario (nom_us, em_us, pass_us, admin_us) VALUES ('".$user."', '".$email."', '".$pass."', 0);";

$sql = mysqli_query($conex, $query);

header("Location: login.php");



?>