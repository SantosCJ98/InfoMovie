<?php


	
    include("inicio.php");

    if (!isset($_POST['submit']) || !isset($_SESSION['id'])) {


            echo "<script type='text/javascript'>
             window.location='index.php';
             </script>";
     

}

else {

    $sqlpel = "SELECT * FROM pelicula WHERE cod_pel = ".$_POST['id'].";";

    $resultpel = mysqli_query($conex, $sqlpel);

    $pelicula = mysqli_fetch_assoc($resultpel);

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

                                        echo '<h1>Tu reseña de la película "'.$pelicula['nom_pel'].'"</h1>';

                                        echo "<form action='addresena2.php' method='POST' enctype='multipart/form-data'>";

                                        echo "<br><h5>Título:</h5> <input type='text' required name='titulo' class='form-control'>";

                                        echo "<br><h5>Reseña:</h5> <textarea rows='5' required name='desc' class='form-control'></textarea>";

                                        echo "<br><h5>Puntuación:</h5>";

                                        echo "<table width='75%'>
                                        <tr>";

                                        for ($i = 0; $i <= 10; $i++) {

                                            echo "<td><input type='radio' required name='puntos' value='".$i."'>
                                            <label for='".$i."'>".$i."</label></td>";

                                        }

                                        echo "</tr>



                                        </table>
                                        
                                        <br>";

                                        echo "<br><h5>Tu reacción:</h5>";

                                        echo "<table width='75%'>

                                        <tr style='font-size: 40px;'>

                                        <td><input type='radio' required name='reac' value='🤯'>
                                        <label>🤯</label></td>

                                        
                                        <td><input type='radio' required name='reac' value='🤣'>
                                        <label>🤣</label></td>

                                        <td><input type='radio' required name='reac' value='😭'>
                                        <label>😭</label></td>

                                        <td><input type='radio' required name='reac' value='😴'>
                                        <label>😴</label></td>

                                        <td><input type='radio' required name='reac' value='😑'>
                                        <label>😑</label></td>

                                        <td><input type='radio' required name='reac' value='😍'>
                                        <label>😍</label></td>

                                        
                                        <td><input type='radio' required name='reac' value='🤮'>
                                        <label>🤮</label></td>

                                        <td><input type='radio' required name='reac' value='🤔'>
                                        <label>🤔</label></td>

                                        <td><input type='radio' required name='reac' value='😠'>
                                        <label>😠</label></td>


                                        
                                       
                                        </tr>

                                        </table>

                                        <input type='hidden' name='id_pel' value=".$pelicula['cod_pel'].">

                                        <input type='hidden' name='id_us' value=".$_SESSION['id'].">

                                        <button type='submit' name='submit' class='btn btn-custon-rounded-two btn-success'>Enviar reseña</button>
                            
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


        
   