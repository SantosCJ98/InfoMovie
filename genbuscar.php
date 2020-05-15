<?php


	
    include("inicio.php");

    if (!isset($_SESSION['admin']) || $_SESSION['admin'] == 0 || !isset($_POST['buscar'])) {
    

       echo "<script type='text/javascript'>
        window.location='index.php';
        </script>";

}     

$sql = "SELECT * FROM genero WHERE nom_gen LIKE '%".$_POST['buscar']."%';";

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

                                           echo '<h1>Géneros que coinciden con "'.$_POST['buscar'].'"</h1>
                                           
                                           <br>
                                           
                                           <h3><a href="addgen.php"><button class="btn btn-custon-rounded-three btn-primary">Añadir género</button></a></h3>
                                           
                                           <br>
                                           
                                           
                                        
                                        <form action="genbuscar.php" method="POST" enctype="multipart/form-data">
                                        
                                        <table>
                                                    <tr>
													<td><input type="text" name="buscar" placeholder="Buscar género" class="form-control"></td>
                                                    <td class="btn-buscar"><button type="submit" class="btn btn-custon-rounded-three btn-primary">Buscar</button></td>
													</tr>
                                                    </table>
                                                    
                                                    </form>';
                                                    
                                                    if (mysqli_num_rows($result) > 0) {
                                        
                                        echo '<table style="border-collapse: separate;border-spacing: 0px 17px;" width=80%>
                                        <tr>
                                        <th>ID</th><th>Nombre</th>
                                        </tr>';
                                        while ($fila = mysqli_fetch_assoc($result)) {
                                            echo "<tr>
                                            
                                            <td>".$fila['id_gen']."</td>
                                            
                                             <td>".$fila['nom_gen']."</td>";
                                            
                                            
                                            
                                            echo "
                                            
                                            <td>
                                            
                                            <a href='editargen.php?id=".$fila['id_gen']."'><button type='button' class='btn btn-custon-rounded-three btn-warning'>Editar</button></a>
                                            
                                            </td>
                                            
                                            
                                            
                                            <td>
                                            
                                            <a href='borrargen.php?id=".$fila['id_gen']."'><button type='button' class='btn btn-custon-rounded-three btn-danger'>Borrar</button></a>
                                            
                                            </td>
                                            
                                            </tr>";
                                            
                                        }
                                        
                                        echo "</table>";
                                        
                                                    }
                                                    
                                                    else {
                                                        
                                                        
                                                        echo "<br><h3> No se encontraron géneros. </h3>";
                                                        
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


        
   