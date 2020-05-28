<?php


	
    include("inicio.php");

    if (!isset($_SESSION['admin']) || $_SESSION['admin'] == 0) {
    

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

                                <form action='sincronizar2.php' method='POST' enctype='multipart/form-data'>
                                   
                                    <h1> Sincronizar películas </h1>

                                    <br>

                                    <h6> Se recomienda especificar intervalos de tiempo cortos, debido a los grandes tiempos de carga que se pueden generar </h6>

                                    <br>


                                    <h5>Desde:</h5>

                                    <div class='input-group date'>
                                        <span class='input-group-addon'><i class='fa fa-calendar'></i></span>
                                        <input type='date' required name='fecha1' class='form-control' placeholder='YYYY-MM-DD'>
                                        </div>

                                        </br>

                                        <h5>Hasta:</h5>

                                        <div class='input-group date'>
                                        <span class='input-group-addon'><i class='fa fa-calendar'></i></span>
                                        <input type='date' required name='fecha2' class='form-control' placeholder='YYYY-MM-DD'>
                                        </div>

                                        <br>

                                        <button type='submit' name='submit' class='btn btn-custon-rounded-two btn-success'>Sincronizar</button>;

                                        </form>








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


        
   