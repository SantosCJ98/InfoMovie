﻿<?php
session_start();
include("conex.php");


?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>InfoMovie</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/misestilos.css">

    <!-- favicon
		============================================ -->
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- nalika Icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/nalika-icon.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
	
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

<div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.php"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
              
                    <ul class="metismenu" id="menu1">

                  <li><a class="has-arrow" href="#" aria-expanded="false"><i class="icon nalika-youtube"></i> <span class="mini-click-non">Películas</span></a>
					<ul class="submenu-angle" aria-expanded="false">

                    <?php
                    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {

                   echo "<li><a href='sincronizar.php' span class='mini-sub-pro'>Sincronizar</span></a></li>";
                   
                     }

                    ?>

					<li><a href='porinicial.php?id=0'span class='mini-sub-pro'>Del 0 al 9</span></a></li>
					<li><a href='porinicial.php?id=1'><span class='mini-sub-pro'>De la A a la N</span></a></li>
					<li><a href='porinicial.php?id=2'><span class='mini-sub-pro'>De la O a la Z</span></a></li>
					<li><a href='porinicial.php?id=3'><span class='mini-sub-pro'>Otros</span></a></li>
					</ul>
					
					</li>
				   
                    <li>


    <a class="has-arrow" href="#" aria-expanded="false"><i class="icon nalika-folder"></i> <span class="mini-click-non">Géneros</span></a>
    <ul class="submenu-angle" aria-expanded="false">
        
         <?php
                                                
                                                if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                                                
                                            echo "<li><a href='generos.php'span class='mini-sub-pro'>Administrar</span></a></li>";
                                            
                                                }
                                            
                                            ?>
        
        

<?php

$result = mysqli_query($conex, "SELECT * FROM genero ORDER BY 2;");

if (mysqli_num_rows($result) > 0) {

while ($fila = mysqli_fetch_assoc($result)) {

echo "<li><a href='porgenero.php?id=".$fila['id_gen']."'span class='mini-sub-pro'>".$fila['nom_gen']."</span></a></li>";

}

}

else {
    
    echo "<li><a href='#'span class='mini-sub-pro'>No hay géneros</span></a></li>";
    
}

?>

        
    </ul>
</li>

<?php

    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
   
                    echo '<li>


    <a href="users.php" aria-expanded="false"><i class="icon nalika-user"></i> <span class="mini-click-non">Usuarios</span></a>
    
    </li>';
    
    }
    
    ?>



                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.php"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n hd-search-rp">
                                            <div class="breadcome-heading">
												<form role="search" action="buscar.php" method="POST" enctype="multipart/form-data" class="">
                                                    <table width="100%">
                                                    <tr>
													<td><input type="text" name="buscar" placeholder="Buscar película" class="form-control"></td>
                                                    <td class="btn-buscar"><button type="submit" name="submit" class="btn btn-custon-rounded-three btn-primary">Buscar por nombre</button></td>
                                                    </tr>

                                                    </table>

                                                    <br>

                                                    </form>

                                                    <form role="search2" action="buscar.php" method="POST" enctype="multipart/form-data" class="">

                                                    <table width="100%">
                                                    <tr>

                                                    <td><select name='año1' class="select2_demo_3 form-control">
                                                    <?php

                                                        for ($i = date('Y'); $i >= 1900; $i--) {

                                                            echo "<option value=".$i.">".$i."</option>";

                                                        }

                                                        ?>

													
														
                                                    </select>
                                                    </td>

                                                    <td>
                                                    -
                                                    <td>
                                                    <td><select name='año2' class="select2_demo_3 form-control">
                                                    <?php

                                                        for ($i = date('Y'); $i >= 1900; $i--) {

                                                            echo "<option value=".$i.">".$i."</option>";

                                                        }

                                                        ?>

													
														
                                                    </select>
                                                    </td>
                                                    <td class="btn-buscar"><button type="submit" name="submit2" class="btn btn-custon-rounded-three btn-primary">Buscar por año</button></td>
													</tr>
                                                    </table>
												</form>
											</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                            <br>
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<i class="icon nalika-menu"></i>
                                                            <span class="admin-name">
                                                            <?php
                                                            
                                                            if (isset($_SESSION['user'])) {

                                                                echo $_SESSION['user'];

                                                            }

                                                            else {

                                                                echo "Invitado";

                                                            }

                                                            ?>
                                                            </span>
															<i class="icon nalika-down-arrow nalika-angle-dw"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <?php
                                                        if (!isset($_SESSION['user'])) {
                                                        echo "<li><a href='register.php'><span class='icon nalika-home author-log-ic'></span>Registrarse</a>
                                                        </li>
                                                        <li><a href='login.php'><span class='icon nalika-user author-log-ic'></span>Iniciar Sesión</a>
                                                        </li>";
                                                        }
                                                        ?>
                                                        <?php
                                                        if (isset($_SESSION['user'])) {
                                                        echo "<li><a href='cambiarpass.php'><span class='icon nalika-settings author-log-ic'></span> Cambiar contraseña</a>
                                                        </li>";
                                                         echo "<li><a href='login.php'><span class='icon nalika-user author-log-ic'></span> Cambiar de usuario</a>
                                                        </li>";
                                                        echo "<li><a href='logout.php'><span class='icon nalika-unlocked author-log-ic'></span> Cerrar Sesión</a>
                                                        </li>";
                                                        }
                                                        ?>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <br>
                <div class="buscar">
            <div class="breadcome-heading">
            <form role="search" action="buscar.php" method="POST" enctype="multipart/form-data" class="">
                                                    
            <table width="100%">
                                                    <tr>
													<td><input type="text" name="buscar" placeholder="Buscar película" class="form-control"></td>
                                                    <td class="btn-buscar"><button type="submit" class="btn btn-custon-rounded-three btn-primary">Buscar</button></td>
													</tr>
                                                    </table>
													
												</form>
                                            </div>
</div>    
                                        
                                    
                <div class="container">
               
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
									
									<li><a data-toggle="collapse" data-target="#Charts" href="#">Películas<span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
												<li><a href='porinicial?id=0'>Del 0 al 9</a></li>
												<li><a href='porinicial?id=1'>De la A a la N</a></li>
												<li><a href='porinicial?id=2'>De la O a la Z</a></li>
												<li><a href='porinicial?id=3'>Otros</a></li>
                                            </ul>
                                        </li>
									
						
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Géneros <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                
                                                <?php
                                                
                                                if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                                                
                                            echo "<li><a href='generos.php' span class='mini-sub-pro'>Administrar</span></a></li>";
                                            
                                                }
                                            
                                            ?>
												<?php

                                                $result2 = mysqli_query($conex, "SELECT * FROM genero ORDER BY 2;");
                                                
                                                if (mysqli_num_rows($result2) > 0) {

                                                while ($fila2 = mysqli_fetch_assoc($result2)) {

                                                echo "<li><a href='porgenero.php?id=".$fila2['id_gen']."'span class='mini-sub-pro'>".$fila2['nom_gen']."</span></a></li>";
                                            

}

}

else {
    
     echo "<li><a href=''#'span class='mini-sub-pro'>No hay géneros</span></a></li>";
                                            

    
}

                                                ?>


                                               
                                            </ul>
                                        </li>
                                        
                                        <?php
                                        
                                        
                                        if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
   
                    echo '<li><a data-toggle="collapse" data-target="#Charts" href="users.php">Usuarios<span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                        </li>';
    
    }
    
    ?>
                                        
                                        
                                    </ul>
                                </nav>
                            </div>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>