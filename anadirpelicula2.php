<?php

session_start();

if (!isset($_POST['submit']) || !isset($_SESSION['id'])) {
    

    header("Location: index.php");

}


function resizeImage($resourceType, $ancho, $alto) {

    $nuevoAncho = 185;

    $nuevoAlto = 278;

    $imageLayer = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

    imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

    return $imageLayer;

 }

 $imageProcess = 0;

 if (is_array($_FILES)) {

    $nombreArchivo = $_FILES['port']['tmp_name'];

    $propiedades = getimagesize($nombreArchivo);

    $cambiartamaño = time();

    $directorio = "./uploads/";

    $pathinfo = pathinfo($_FILES['port']['name'], PATHINFO_EXTENSION);

    $uploadImageType =  $propiedades[2];

    $anchura = $propiedades[0];

    $altura = $propiedades[1];

    $nombre = "thump_".$cambiartamaño.".".$pathinfo;

    switch($uploadImageType) {

        case IMAGETYPE_JPEG:

            $resourceType = imagecreatefromjpeg($nombreArchivo);
            $imageLayer = resizeImage($resourceType, $anchura, $altura);
            imagejpeg($imageLayer, $directorio.$nombre);
        break;

        case IMAGETYPE_GIF:

            $resourceType = imagecreatefromgif($nombreArchivo);
            $imageLayer = resizeImage($resourceType, $anchura, $altura);
            imagegif($imageLayer, $directorio.$nombre);
        break;

        case IMAGETYPE_PNG:

            $resourceType = imagecreatefrompng($nombreArchivo);
            $imageLayer = resizeImage($resourceType, $anchura, $altura);
            imagepng($imageLayer, $directorio.$nombre);
        break;

        default:
        $imageProcess = 0;
    break;

    move_uploaded_file($file, $directorio.$cambiartamaño.".".$pathinfo);
    $imageProcess = 1;

    }

 }

include("conex.php");


$titulo = $_POST['titulo'];

$desc = $_POST['desc'];

$genero = $_POST['genero'];

$fecha = $_POST['fecha'];

$img = $nombre;



$q = "INSERT INTO pelicula (nom_pel, desc_pel, port_pel, fecha_pel, gen_pel) VALUES ('".$titulo."', '".$desc."', './uploads/".$img."', '".$fecha."', ".$genero.");";

$sq = mysqli_query($conex, $q);

header("Location: index.php");


?>