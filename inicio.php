<div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                <strong><img src="img/logo/logosn.png" alt="" /></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
              
                    <ul class="metismenu" id="menu1">

                   <li><a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-non">Película Aleatoria</span></a>
				   </li>
				   <ul class="submenu-angle" aria-expanded="false"></ul>
				   
                    <li>

<?php

    include("conex.php");

    $sql = "SELECT * FROM genero ORDER BY 2;";

    $result = mysqli_query($conex, $sql);

?>

    <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-non">Géneros</span></a>
    <ul class="submenu-angle" aria-expanded="false">
        <?php
        while ($fila = mysqli_fetch_assoc($result)) {
        echo "<li><a title='Google Map' href='google-map.html'><span class='mini-sub-pro'>". $fila['nom_gen'] ."</span></a></li>";
        }
        ?>
        
    </ul>
</li>
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
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
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
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="icon nalika-menu-task"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n hd-search-rp">
                                            <div class="breadcome-heading">
												<form role="search" class="">
													<input type="text" placeholder="Buscar película" class="form-control">
													<a href=""><i class="fa fa-search"></i></a>
												</form>
											</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<i class="icon nalika-user"></i>
															<span class="admin-name">Invitado</span>
															<i class="icon nalika-down-arrow nalika-angle-dw"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="register.html"><span class="icon nalika-home author-log-ic"></span> Registrarse</a>
                                                        </li>
                                                        <li><a href="login.html"><span class="icon nalika-user author-log-ic"></span> Iniciar Sesión</a>
                                                        </li>
                                                        <li><a href="#"><span class="icon nalika-user author-log-ic"></span> Mis aportes</a>
                                                        </li>
                                                        <li><a href="login.html"><span class="icon nalika-unlocked author-log-ic"></span> Cerrar Sesión</a>
                                                        </li>
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
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                    <li><a data-toggle="collapse" data-target="#demo" href="#">Película Aleatoria<span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Géneros <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                            <?php
                                        
                                            
                                            $sql2 = "SELECT * FROM genero ORDER BY 2;";

                                            $result2 = mysqli_query($conex, $sql2);



                                                 while ($fila2 = mysqli_fetch_assoc($result2)) {
                                                echo "<li><a href='google-map.html'>". $fila2['nom_gen'] ."</a></li>";
                                               }
                                                 ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>