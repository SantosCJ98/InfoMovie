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

$sqlres = "SELECT * FROM usuario WHERE cod_us = ".$_GET['id'].";";

 $res = mysqli_query($conex, $sqlres);

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
                                        
                                        echo '<h2>¿Está seguro de que desea expulsar a este usuario? Se borrarán todas las reseñas que haya escrito</h2>';

                                  echo '<table style="border-collapse: separate;border-spacing: 0px 17px;" width=100%>
                                        <tr>
                                        <th>ID</th><th>Nombre</th><th>Email</th><th>Tipo</th>
                                        </tr>';
                                        while ($fila = mysqli_fetch_assoc($res)) {
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
                                            
                                            
                                           echo "</tr>";
                                            
                                        }
                                        
                                        echo "</table>";

                                echo "<br>

                                <form action='expulsaruser2.php' method='POST' enctype='multipart/form-data'>
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


        
   