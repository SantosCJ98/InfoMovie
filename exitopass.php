<?php


	
    include("inicio.php");

    if (!isset($_SESSION['id'])) {
    

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

                                        echo '<h1>Contraseña cambiada con éxito</h1>

                                        <a href="index.php"><button class="btn btn-custon-rounded-two btn-primary">Regresar</button></a>';

                                       

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


        
   