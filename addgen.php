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

                                    <?php

                                        echo '<h1>Añadir género</h1>';

                                        echo "<form action='addgen2.php' method='POST' enctype='multipart/form
                                        -data'>
                                        
                                        <table style='border-collapse: separate;border-spacing: 0px 0px 0px 15px;' width=80%>    
                                        
                                        <tr>
                                        
                                        <th width='7%'>Nombre:</th>
                                        
                                        <th>
                                        
                                         <input type='text' name='nombre' class='form-control'>
                                         
                                         </th>
                                         
                                         <th width='65%'>
                                         
                                         <button type='submit' name='submit' class='btn btn-custon-rounded-two btn-success'>Añadir</button>
                                         
                                         </th>
                                         
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


        
   