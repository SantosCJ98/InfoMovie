<style type="text/css">
td
{
    padding: 0 15px;
}
</style>
<?php


	
    include("inicio.php");

    if (!isset($_SESSION['admin']) || $_SESSION['admin'] == 0 || !isset($_GET['id']) || $_GET['id'] == null) {
    

       echo "<script type='text/javascript'>
        window.location='index.php';
        </script>";

}

$sqlres = "SELECT * FROM resena WHERE cod_res = ".$_GET['id'].";";

 $res = mysqli_query($conex, $sqlres);

 $resena = mysqli_fetch_assoc($res);

 $sqlpel = "SELECT * FROM pelicula WHERE cod_pel = ".$resena['pel_res'].";";

 $resultpel = mysqli_query($conex, $sqlpel);

 $pelicula = mysqli_fetch_assoc($resultpel);

 $sqlgen = "SELECT * FROM genero WHERE id_gen = ".$pelicula['gen_pel'].";";

 $resultgen = mysqli_query($conex, $sqlgen);

 $genero = mysqli_fetch_assoc($resultgen);

        $resultgen = mysqli_query($conex, $sqlgen);

        $sqlr = "SELECT * FROM usuario WHERE cod_us = ".$resena['us_res'].";";

		$resultr = mysqli_query($conex, $sqlr);

		$nombre = mysqli_fetch_assoc($resultr)['nom_us'];
        
        if (mysqli_num_rows($res) < 1) {

            echo "<script type='text/javascript'>
             window.location='index.php';
            </script>";

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

                                        echo '<h1>Confirmación de borrado</h1>';
                                        
                                        echo '<h2>¿Está seguro de que desea borrar esta reseña?</h2>';

                                    echo "<table width=100%>
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

                                

						

                                echo "</table>";

                                echo "<br>";


                                echo "<table width=100%>";

		echo "<tr>";

        echo "<td width='70%'> <h4>".$puntos." puntos: ".$titulo .  $reac."   <h4></td>";

		echo "<td> <h4>Escrito por: ".$nombre."<h4></td>";

		echo "</tr>";

		echo "<tr>";

		echo "<td colspan='2'> <h5>".$resena['desc_res']."<h5></td>";

		echo "</tr>";

		echo "</table>





















                                <br>

                                <form action='borraresena2.php' method='POST' enctype='multipart/form-data'>
                                <input type='hidden' name='id' value=".$_GET['id'].">
                                <input type='hidden' name='idpel' value=".$resena['pel_res'].">
                                <table width='100%'>
                                <tr>
                                <tr style='margin-top:30%;'>
                                <td align='center'>
                                <button type='submit' name='si' class='btn btn-custon-rounded-two btn-danger'>Sí</button>
                                </td>
                                <td align='center'>
                                <button type='submit' name='no' class='btn btn-custon-rounded-two btn-primary'>No</button>
                                </td>
                                </tr>
                                </table>

                                </form>";

                                    

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


        
   