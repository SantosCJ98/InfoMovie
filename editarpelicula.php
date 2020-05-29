<?php


	
    include("inicio.php");

    if (!isset($_SESSION['admin']) || $_SESSION['admin'] == 0 || !isset($_GET['id']) || $_GET['id'] == null) {

        echo "<script type='text/javascript'>
        window.location='index.php';
        </script>";

}

$sqlpel = "SELECT * FROM pelicula WHERE cod_pel = ".$_GET['id'].";";

 $res = mysqli_query($conex, $sqlpel);

 if (mysqli_num_rows($res) < 1) {

    echo "<script type='text/javascript'>
    window.location='index.php';
    </script>";

 }

 $pelicula = mysqli_fetch_assoc($res);

 $titulo = $pelicula['nom_pel'];

 $genero = $pelicula['gen_pel'];

 $sinopsis = $pelicula['desc_pel'];

 $portada = $pelicula['port_pel'];

 $fecha = $pelicula['fecha_pel'];

 $catalogar = $pelicula['cat_pel'];

 $sincronizar = $pelicula['sinc_pel'];

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

                                        echo '<h1>Editar película: "'.$titulo.'"</h1>';

                                        echo "<form action='editarpelicula2.php' method='POST' enctype='multipart/form-data'>";

                                        echo "<input type='hidden' name='id' value='".$_GET['id']."'>";

                                        echo "<br><h5>Título:</h5> <input type='text' required name='titulo' class='form-control' value='".$titulo."'>";

                                        echo "<br><h5>Género:</h5> 

                                        <select class='select2_demo_3 form-control' name='genero'>";
                                            while ($fila = mysqli_fetch_assoc($result)) {

                                                if ($fila['id_gen'] != $pelicula['gen_pel']) {

                                                echo "<option value='".$fila['id_gen']."'>".$fila["nom_gen"]."</option>";

                                                }

                                                else {

                                                    echo "<option selected value='".$fila['id_gen']."'>".$fila["nom_gen"]."</option>";

                                                }

                                            }
													
													echo "</select>";

                                        echo "<br><h5>Sinopsis:</h5> <textarea rows='5' required name='desc' class='form-control'>".$sinopsis."</textarea>";


                                        echo "<br><h5>Portada:</h5>";

                                        echo "<input type='text' required name='port' class='form-control' placeholder='URL de portada' value='".$portada."'>";

                                        echo "<br><h5>Fecha de estreno:</h5>";

                                        echo "<div class='input-group date'>
                                        <span class='input-group-addon'><i class='fa fa-calendar'></i></span>
                                        <input type='date' required name='fecha' class='form-control' value='".$fecha."' placeholder='YYYY-MM-DD'>
                                        </div>";

                                        echo "<br>";

                                        echo "<br><h5>¿Catalogar?:</h5>";

                                        echo "<select name='cat' class='select2_demo_3 form-control'>";

                                                            if ($catalogar == 1) {

                                                                echo "<option selected value='1'>Sí</option>

                                                                <option value='0'>No</option>";

                                                            }

                                                            else {

                                                                echo "<option value='1'>Sí</option>

                                                                <option selected value='0'>No</option>";

                                                            }

                                                                 echo "</select>";


                                        echo "<br><h5>¿Sincronizar?:</h5>";

                                        echo "<select name='sinc' class='select2_demo_3 form-control'>";

                                                            if ($sincronizar == 1) {

                                                                echo "<option selected value='1'>Sí</option>

                                                                <option value='0'>No</option>";

                                                            }

                                                            else {

                                                                echo "<option value='1'>Sí</option>

                                                                <option selected value='0'>No</option>";

                                                            }

                                                               echo "</select>";

                                        echo "<br>";

                                        echo "<button type='submit' name='submit' class='btn btn-custon-rounded-two btn-success'>Editar pelicula</button>";

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


        
   