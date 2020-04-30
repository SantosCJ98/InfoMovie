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

$sqlpel = "SELECT * FROM pelicula WHERE cod_pel = ".$_GET['id'].";";

 $res = mysqli_query($conex, $sqlpel);

 $pelicula = mysqli_fetch_assoc($res);

 $sqlgen = "SELECT * FROM genero WHERE id_gen = ".$pelicula['gen_pel'].";";

        $resultgen = mysqli_query($conex, $sqlgen);
        
        if (mysqli_num_rows($res) < 1) {

            echo "<script type='text/javascript'>
             window.location='index.php';
            </script>";

        }

		$genero = mysqli_fetch_assoc($resultgen);

        
	
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
                                        
                                        echo '<h2>¿Está seguro de que desea borrar esta película?</h2>';

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

                                

						

                                echo "</table>

                                <br>

                                <form action='borrarpelicula2.php' method='POST' enctype='multipart/form-data'>
                                <input type='hidden' name='id' value=".$_GET['id'].">
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


        
   