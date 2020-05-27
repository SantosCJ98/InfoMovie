<?php

if (!isset($_POST['submit']) && !isset($_POST['submit2'])) {

    header("Location: index.php");

}	
    include("inicio.php");

   

 if (isset($_POST['submit'])) {

   $busqueda = $_POST['buscar'];

   $sqlpel = "SELECT * FROM pelicula WHERE nom_pel LIKE '%".$busqueda."%';";

}

else if (isset($_POST['submit2'])) {

  $maximo = max($_POST['año1'], $_POST['año2']);

  $minimo = min($_POST['año1'], $_POST['año2']);  

  $sqlpel = "SELECT * FROM pelicula WHERE YEAR(fecha_pel) BETWEEN $minimo AND $maximo;";


}



 $resultpel = mysqli_query($conex, $sqlpel);

?>
           
           <div class="pie-bar-line-area mg-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline11-list">
                            <div class="sparkline11-hd">
                                <div class="main-sparkline11-hd">

                                <?php

                                if (isset($_POST['submit'])) {


                               

                                if ($busqueda == "") {

                                    echo "<h1>Buscando todas las películas.</h1>";

                                }

                                else {

                                  echo '<h1>Buscando por "'.$busqueda.'"</h1>';

                                }

                              }

                              else if (isset($_POST['submit2'])) {

                                    if ($minimo != $maximo) {
                                    echo "<h1>Buscando por año($minimo-$maximo)</h1>";
                                    }

                                    else {

                                      echo "<h1>Buscando por año($minimo)</h1>";

                                    }

                                  }

                                

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

                                      echo "<br><h2> Ninguna película coincide con lo que buscas. </h2>";

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