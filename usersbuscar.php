<?php


	
    include("inicio.php");

    if (!isset($_SESSION['admin']) || $_SESSION['admin'] == 0 || !isset($_POST['buscar'])) {
    

       echo "<script type='text/javascript'>
        window.location='index.php';
        </script>";

}     

$sql = "SELECT * FROM usuario WHERE cod_us != ".$_SESSION['id']." AND nom_us LIKE '%".$_POST['buscar']."%';";

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

                                        echo '<h1>Usuarios que coinciden con "'.$_POST['buscar'].'"</h1>
                                        
                                        <form action="usersbuscar.php" method="POST" enctype="multipart/form-data">
                                        
                                        <table>
                                                    <tr>
													<td><input type="text" name="buscar" placeholder="Buscar usuario" class="form-control"></td>
                                                    <td class="btn-buscar"><button type="submit" class="btn btn-custon-rounded-three btn-primary">Buscar</button></td>
													</tr>
                                                    </table>
                                                    
                                                    </form>';
                                                    
                                                    if (mysqli_num_rows($result) > 0) {
                                        
                                        echo '<table style="border-collapse: separate;border-spacing: 0px 17px;" width=80%>
                                        <tr>
                                        <th>ID</th><th>Nombre</th><th>Email</th><th>Tipo</th>
                                        </tr>';
                                        while ($fila = mysqli_fetch_assoc($result)) {
                                            echo "<tr>
                                            
                                            <td>".$fila['cod_us']."</td>
                                            
                                             <td>".$fila['nom_us']."</td>
                                             
                                             <td>".$fila['em_us']."</td>";
                                             
                                             if ($fila['admin_us'] == 1) {
                                                 
                                                 echo "<td>Admin</td>";
                                                 
                                             }
                                             
                                             else if ($fila['admin_us'] == 0)  {
                                                 
                                                 echo "<td>Usuario</td>";
                                                 
                                             }
                                            
                                            
                                            
                                            echo "<td>
                                            
                                            <a href='expulsaruser.php?id=".$fila['cod_us']."'><button type='button' class='btn btn-custon-rounded-three btn-danger'>Expulsar</button></a>
                                            
                                            </td>
                                            
                                            </tr>";
                                            
                                        }
                                        
                                        echo "</table>";
                                        
                                                    }
                                                    
                                                    else {
                                                        
                                                        
                                                        echo "<br><h3> No se encontraron usuarios. </h3>";
                                                        
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


        
   