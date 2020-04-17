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

                                if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {

                                  echo "<h1><a href='anadirpelicula.php'><button class='btn btn-custon-rounded-three btn-danger'>Añadir pelicula</button></a></h1>";
                                 
 
                                 }
 
                                  

                                ?>

<div class="tabla">
                                  
                                  <?php

                                  if (mysqli_num_rows($resultpel) > 0) {


                                    $dyn_table = "<table width='100%'>";
                                    $i = 0;

                                      while ($filapel = mysqli_fetch_assoc($resultpel)) {

                                        $portada = "<img src='".$filapel['port_pel']."'>";

                                        if ($i == 3) {

                                          $dyn_table .= "<tr> <td style='padding-bottom:3%;'><div class='portada'><a href='detallepelicula.php?id=".$filapel['cod_pel']."'>" . $portada . "<br><div class='boton'><button type='button' style='width:100%;' class='btn btn-custon-rounded-three btn-primary'>Info</button></a>";

                                          
                                         if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                                          
                                         $dyn_table.= "<a href='editarpelicula.php?id=".$filapel['cod_pel']."'><button type='button' style='width:100%;' class='btn btn-custon-rounded-three btn-warning'>Editar</button></a><a href='borrarpelicula.php?id=".$filapel['cod_pel']."'><button type='button' style='width:100%;' class='btn btn-custon-rounded-three btn-danger'>Borrar</button></a></div></div></td>";

                                         }

                                          $i = 0;

                                        }

                                        else {

                                          $dyn_table .= "<td style='padding-bottom:3%;'><div class='portada'><a href='detallepelicula.php?id=".$filapel['cod_pel']."'>" . $portada . "<br><div class='boton'><button type='button' style='width:100%;' class='btn btn-custon-rounded-three btn-primary'>Info</button></a>";
                                          
                                          if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                                          
                                            $dyn_table.= "<a href='editarpelicula.php?id=".$filapel['cod_pel']."'><button type='button' style='width:100%;' class='btn btn-custon-rounded-three btn-warning'>Editar</button></a><a href='borrarpelicula.php?id=".$filapel['cod_pel']."'><button type='button' style='width:100%;' class='btn btn-custon-rounded-three btn-danger'>Borrar</button></a></div></div></td>";
   
                                            }

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