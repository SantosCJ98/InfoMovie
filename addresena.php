<?php


	
    include("inicio.php");

    if (!isset($_POST['submit']) || !isset($_SESSION['id'])) {
    

    header("Location: index.php");

}
    
        $id_pel = $_POST['id'];

		$sqlpel = "SELECT * FROM pelicula WHERE cod_pel = ".$id_pel.";";

		$resultpel = mysqli_query($conex, $sqlpel);

        $pelicula = mysqli_fetch_assoc($resultpel);
        
        $id_us = $_POST['us'];

		$sqlus = "SELECT * FROM usuario WHERE cod_us = ".$id_us.";";

		$resultus = mysqli_query($conex, $sqlus);

        $usuario = mysqli_fetch_assoc($resultus);
        
	
	?>


<div class="pie-bar-line-area mg-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline11-list">
                            <div class="sparkline11-hd">
                                <div class="main-sparkline11-hd">

                                    <?php

                                        echo '<h1>Tu reseña de la película "'.$pelicula['nom_pel'].'"</h1>';

                                        echo "<form action='addresena2.php' method='POST' enctype='multipart/form-data'>";

                                        echo "<br><h5>Título:</h5> <input type='text' required name='titulo' class='form-control'>";

                                        echo "<br><h5>Reseña:</h5> <textarea rows='5' required name='desc' class='form-control'></textarea>";

                                        echo "<br><h5>Puntuación:</h5>";

                                        echo "<table width='100%'>
                                        <tr>";

                                        for ($i = 0; $i <= 10; $i++) {

                                            echo "<td><input type='radio' required name='puntos' value='".$i."'>
                                            <label for='".$i."'>".$i." puntos</label></td>";

                                        }

                                        echo "</tr>
                                        </table>
                                        <br>";

                                        echo "<input type='hidden' name='id_pel' value=".$id_pel.">";

                                        echo "<input type='hidden' name='id_us' value=".$id_us.">";

                                        echo "<button type='submit' class='btn btn-custon-rounded-two btn-success'>Enviar reseña</button>";
                            
                                        echo "</form>";

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


        
   