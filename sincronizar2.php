<?php

if (!isset($_POST['submit'])) {

    echo "<script type='text/javascript'>
    window.location='sincronizar.php';
    </script>";

}

include("conex.php");

$año1 = $_POST['fecha1'];

$año2 = $_POST['fecha2'];

$fechatope = max($año1, $año2);

if ($fechatope > date('YYYY-MM-DD')) {

    echo "<script type='text/javascript'>
    window.location='sincronizar.php';
    </script>";

}

$fechaminima = min($año1, $año2);

$pagina = 1;

$url = "https://api.themoviedb.org/3/discover/movie?primary_release_date.lte=".$fechatope."&primary_release_date.gte=".$fechaminima."&sort_by=release_date.asc&api_key=e96e02a4a55d7fee2a19f681c40fce43&language=es&page=".$pagina."";

$response = file_get_contents($url);

$data = json_decode($response, true);

$total_pages = $data['total_pages'];


$arraypels = $data['results'];


for ($j = $pagina; $j <= $total_pages; $j++) {

    if ($j != 1) {

        $url = "https://api.themoviedb.org/3/discover/movie?primary_release_date.lte=".$fechatope."&primary_release_date.gte=".$fechaminima."&sort_by=release_date.asc&api_key=e96e02a4a55d7fee2a19f681c40fce43&language=es&page=".$j."";

        $response = file_get_contents($url);

        $data = json_decode($response, true);
        
        $arraypels = $data['results'];

    }

for ($i = 0; $i < count($arraypels); $i++) {

    $pelicula = $arraypels[$i];

    $id = $pelicula['id'];

    $nombre = $pelicula['title'];

    $sinopsis = $pelicula['overview'];

    $fecha_pel = $pelicula['release_date'];

    $generos = $pelicula['genre_ids'];

    if (count($generos) > 0) {

    $genero = $generos[0];

    }

    else {

        $genero = 10771;

    }



    $poster = "http://image.tmdb.org/t/p/w185" . $pelicula['poster_path'];

    $s = "SELECT * FROM pelicula WHERE cod_pel = ".$id.";";

    $rs = mysqli_query($conex, $s);

   

    if (mysqli_num_rows($rs) > 0) {

    $rs2 = mysqli_fetch_assoc($rs);

    $sinc = $rs2['sinc_pel'];

    if ($sinc == 1) {

    $sql = "INSERT INTO pelicula (cod_pel, nom_pel, desc_pel, port_pel, fecha_pel, gen_pel, cat_pel, sinc_pel) VALUES (".$id.", '".$nombre."', '".$sinopsis."', '".$poster."', '".$fecha_pel."', ".$genero.", 1, ".$sinc.") ON DUPLICATE KEY UPDATE cat_pel = 1;";
    
    $result = mysqli_query($conex, $sql);

    }

    }

    else {

    $sql = "INSERT INTO pelicula (cod_pel, nom_pel, desc_pel, port_pel, fecha_pel, gen_pel, cat_pel, sinc_pel) VALUES (".$id.", '".$nombre."', '".$sinopsis."', '".$poster."', '".$fecha_pel."', ".$genero.", 1, 1) ON DUPLICATE KEY UPDATE cat_pel = 1;";
    
    $result = mysqli_query($conex, $sql);

    }

  



}

}
 header("Location: index.php")


?>