<?php
	
	include("inicio.php");
	
	?>

<?php

if (!isset($_GET['id'])) {

    header("Location: index.php");

}

else {

    $idGénero = $_GET['id'];


        $sqlpel = "SELECT * FROM pelicula WHERE gen_pel = ".$idGénero.";";

        $sqlgen = "SELECT * FROM genero WHERE id_gen = ".$idGénero.";";

   

    $resultpel = mysqli_query($conex, $sqlpel);

    $resultgen = mysqli_query($conex, $sqlgen);

    $nomgen = mysqli_fetch_assoc($resultgen);

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
                                
                                echo "<h1> Películas del género ".$nomgen['nom_gen']."</h1>";

                                ?>

<div class="tabla">
                                  
                                  <?php

                                  if (mysqli_num_rows($resultpel) > 0) {


                                    $dyn_table = "<table width='100%' cell_padding='10'>";
                                    $i = 0;

                                      while ($filapel = mysqli_fetch_assoc($resultpel)) {

                                        $portada = "<div class='pelicula'>
                                
                                        <img src='".$filapel['port_pel']."'>

                                        <div class='titulo'>

                                        <h4>   </h4>
                                        <br>";

                                        if ($i == 2) {

                                          $dyn_table .= "<tr> <td>" . $portada . "</td>";

                                          $i = 0;

                                        }

                                        else {

                                          $dyn_table .= "<td>" . $portada . "</td>";

                                        }

                                        $i++;

                                        

                                      }

                                      $dyn_table .= "</tr> </table>";

                                      echo $dyn_table;

                                    }

                                    else {

                                      echo "<br><h2> No hay películas. Lo sentimos. </h2>";

                                    }

                                    ?>

                                    </div>

                                </div>
                            </div>
                            <div class="sparkline11-graph">
                                <div id="gauge"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
			
	<?php

  include("final.php");

  ?>