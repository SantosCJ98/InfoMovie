<?php


	
    include("inicio.php");

    if (!isset($_SESSION['admin']) || $_SESSION['admin'] == 0) {
    

       echo "<script type='text/javascript'>
        window.location='index.php';
        </script>";

}     

$sql = "SELECT * FROM genero;";

 $result = mysqli_query($conex, $sql);

        
	
	?>


<div class="pie-bar-line-area mg-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline11-list">
                            <div class="sparkline11-hd">
                                <div class="main-sparkline11-hd">

                                    <?php

                                        echo '<h1>Añadir Película</h1>';

                                        echo "<form action='anadirpelicula2.php' method='POST' enctype='multipart/form-data'>";

                                        echo "<br><h5>Título:</h5> <input type='text' required name='titulo' class='form-control'>";

                                        echo "<br><h5>Género:</h5> 

                                        <select class='select2_demo_3 form-control' name='genero'>";
                                            while ($fila = mysqli_fetch_assoc($result)) {

                                                echo "<option value='".$fila['id_gen']."'>".$fila["nom_gen"]."</option>";

                                            }
													
													echo "</select>";

                                        echo "<br><h5>Sinopsis:</h5> <textarea rows='5' required name='desc' class='form-control'></textarea>";

                                        echo "<br><h5>Portada:</h5>";

                                        echo "<input type='text' required name='port' class='form-control' placeholder='URL de portada'>";

                                        echo "<br><h5>Fecha de estreno:</h5>";

                                        echo "<div class='input-group date'>
                                        <span class='input-group-addon'><i class='fa fa-calendar'></i></span>
                                        <input type='date' required name='fecha' class='form-control' placeholder='YYYY-MM-DD'>
                                        </div>";

                                        echo "<br>";

                                        echo "<button type='submit' name='submit' class='btn btn-custon-rounded-two btn-success'>Añadir pelicula</button>";

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


        
   