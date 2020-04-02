	<?php
	
	if (!isset($_GET['id'])) {

		header("Location: index.php");

	}

	include("inicio.php");

		$id_pel = $_GET['id'];

		$sqlpel = "SELECT * FROM pelicula WHERE cod_pel = ".$id_pel.";";

		$resultpel = mysqli_query($conex, $sqlpel);

		$pelicula = mysqli_fetch_assoc($resultpel);

		$sqlgen = "SELECT * FROM genero WHERE id_gen = ".$pelicula['gen_pel'].";";

		$resultgen = mysqli_query($conex, $sqlgen);

		$genero = mysqli_fetch_assoc($resultgen);

		$sqlres = "SELECT * FROM resena WHERE pel_res = ".$id_pel.";";

		$resultres = mysqli_query($conex, $sqlres);

		if (isset($_SESSION['id'])) {

		$sqlmires = "SELECT * FROM resena WHERE pel_res = ".$id_pel." AND us_res = ".$_SESSION['id'].";";

		$resultmires = mysqli_query($conex, $sqlmires);

		}
	
	?>



<div class="pie-bar-line-area mg-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline11-list">
                            <div class="sparkline11-hd">
                                <div class="main-sparkline11-hd">

								<?php

								echo "<h1>".$pelicula['nom_pel']."</h1>

								<table width=100%>
								<tr>
								<td align='center'rowspan='5'><img src='".$pelicula['port_pel']."'></td>
								</tr>
								<tr>
								<td><b>Nombre: </b>".$pelicula['nom_pel']."</td>
								</tr>
								<tr>
								<td><b>Fecha de estreno: </b>".$pelicula['fecha_pel']."</td>
								</tr>
								<tr>
								<td><b>Género: </b>".$genero['nom_gen']."</td>
								</tr>
								<tr>
								<td style='width:80%';><b>Sinópsis: </b><br>".$pelicula['desc_pel']."</td>
								</tr>";

								if (isset($_SESSION['id']) && mysqli_num_rows($resultmires) < 1) {

								echo "<tr>
								<td>

								<br>
								
								<form action='addresena.php' method='POST' enctype='multipart/form-data'>
								<input type='hidden' name='id' value=".$pelicula['cod_pel'].">
								<input type='hidden' name='us' value=".$_SESSION['id'].">
								<button type='submit' name='submit' class='btn btn-custon-rounded-three btn-danger'>Escribir reseña</button>
								</form>

								</td>
								</tr>";

								}

								else if (isset($_SESSION['id']) && mysqli_num_rows($resultmires) > 0) {

									echo "<tr>
									<td align='center'>
	
									<h4> <br>Ya has escrito una reseña de esta película. </h4>
	
									</td>
	
							
	
									</tr>";



								}

								else {
									
									echo "<tr>
								<td align='center'>

								<h4> <br>Inicia sesión para escribir una reseña de esta película. </h4>

								</td>

						

								</tr>";


								}

								echo "</table>";

								echo "<br>";

								?>


<?php

echo "<h3> Reseñas de los usuarios </h3>";

if (mysqli_num_rows($resultres) < 1) {

	echo "<h4> Nadie ha reseñado esta película. </h4>";

}

else {

	while ($resena = mysqli_fetch_assoc($resultres)) {

		$sqlr = "SELECT * FROM usuario WHERE cod_us = ".$resena['us_res'].";";

		$resultr = mysqli_query($conex, $sqlr);

		$nombre = mysqli_fetch_assoc($resultr)['nom_us'];

		$titulo = $resena['titulo_res'];

		$desc = $resena['desc_res'];

		$puntos = $resena['puntos_res'];

		echo "<table width=100%>";

		echo "<tr>";

		echo "<td width='70%'> <h4>".$puntos." puntos: ".$titulo."<h4></td>";

		echo "<td> <h4>Escrito por: ".$nombre."<h4></td>";

		echo "</tr>";

		echo "<tr>";

		echo "<td colspan='2'> <h5>".$desc."<h5></td>";

		echo "</tr>";

		echo "</table>";

		echo "<br>";



	}

}

?>


								
</div>

</div>

</div>

</div>

</div>

</div>

</div>
			
		<?php
			
		include("final.php");
		
		?>


        
   