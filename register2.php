<?php

if (!isset($_POST['submit'])) {

    header("Location: register.php");

}

// Include library file
require_once 'verificarMail.php'; 

// Initialize library class
$mail = new VerifyEmail();

// Set the timeout value on stream
$mail->setStreamTimeoutWait(20);

// Set debug output mode
$mail->Debug= FALSE; 
$mail->Debugoutput= 'html'; 

// Set email address for SMTP request
$mail->setEmailFrom('infomoviedam@gmail.com');

// Email to check
$email = $_POST['email']; 


include("conex.php");

$user = $_POST['user'];

$pass = md5($_POST['pass']);

$email = $_POST['email'];

$q = "SELECT * FROM usuario WHERE em_us = '".$email."' OR nom_us = '".$user."';";



$sq = mysqli_query($conex, $q);

if (mysqli_num_rows($sq) > 0 || $_POST['pass'] != $_POST['repetir_pass'] || !$mail->check($email)) {

    header("Location: erroregistro.php");

}

else {

$query = "INSERT INTO usuario (nom_us, em_us, pass_us, admin_us, token_us) VALUES ('".$user."', '".$email."', '".$pass."', 0, '');";

$sql = mysqli_query($conex, $query);

header("Location: login.php");

}




?>