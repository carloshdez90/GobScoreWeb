<!DOCTYPE html>
<!--
* A Design by GraphBerry
* Author: GraphBerry
* Author URL: http://graphberry.com
* License: http://graphberry.com/pages/license
-->
<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GobScore El Salvador</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/pluton.css" />
        <!--[if IE 7]>
        <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
        <!-- Fav and touch icons -->
        <!--<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="images/ico/favicon.ico"> -->
		<?php echo $this->Html->script('jquery.min'); ?>
		<?php echo $this->Html->script('servidor'); ?>
    </head>
    
    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand">
                        <img src="images/GobScore.png" width="120" height="40" alt="Logo" />
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                            <li class="active">
                                <a href="#home">Inicio</a>
                            </li>
                            <li>
                                <a href="#service">GobScore</a>
                            </li>
                            <li>
                                <a href="#portfolio">Ranking</a>
                            </li>
                            <!--<li>
                            <a href="#about">About</a>
                            </li> --> 
                            <li>
                                <a href="#clients">Ultimos Interaciones</a>
                            </li>
                            <!--<li>
                            <a href="#price">Price</a>
                            </li> -->
                            <li>
                                <a href="#contact">Participar</a>
                            </li>
							<li>
                                <a id="openBtn">Ingresar</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <!-- Start home section -->
        <div id="home">
            <!-- Start cSlider -->
            <div id="da-slider" class="da-slider">
                <div class="triangle"></div>
                <!-- mask elemet use for masking background image -->
                <div class="mask"></div>
                <!-- All slides centred in container element -->
                <div class="container">
                    <!-- Start first slide -->
                    <div class="da-slide">
                        <h2 class="fittext2">Bienvenido a GobScore</h2>
                        <h4>Nos interesa conocer tu opinión</h4>
                        <p>Por medio de la participacion cuidadana, hagamos un mejor El Salvador, dejando atras la corrupcion y mal uso de los fondos públicos.</p>
                        <a href="#" class="da-link button">Participar</a>
                        <div class="da-img">
                            <img src="images/GobScore.png" alt="image01" width="320">
                        </div>
                    </div>
                    <!-- End first slide -->
                    <!-- Start second slide -->
                    <div class="da-slide">
                        <h2>InfoÚtil El Salvador</h2>
                        <h4>Información que empodera al usuario</h4>
                        <p>Es una herramienta que busca empoderar al usuario para  que este pueda interactuar y puntuar toda la informacion que gracias a la Ley de acceso a la informacion publica, puede ser consultada en infoÚtil.</p>
                        <a href="#" class="da-link button">Visitar</a>
                        <div class="da-img">
                            <img src="images/InfoUtil.png" alt="image02" width="320">

                        </div>
                    </div>
                    <!-- End second slide -->
                    <!-- Start third slide -->
                    <div class="da-slide">
                        <h2>El Salvador Online</h2>
                        <h4>El gobierno de El Salvador</h4>
                        <p>Le apuesta fuertemente al avance técnologico en materia de las técnologias de la información y crea este tipo de espacios para que el cuidadano aporte en materia de las tic's dentro del gobierno.</p>
                        <a href="#" class="da-link button">Visitar</a>
                        <div class="da-img">
                            <img src="images/logosv.png" width="320" alt="image03">
                        </div>
                    </div>
                    <!-- Start third slide -->
                    <!-- Start third slide -->
                    <div class="da-slide">
                        <h2>Gobierno Abierto</h2>
                        <h4>Participa y unamonos para crecer</h4>
                        <p>Las tecnologias de la información han cambiado la forma de hacer gobierno, por eso se presenta la estrategia del gobierno abierto, que incentiva la participación cuidadana.</p>
                        <a href="#" class="da-link button">Visitar</a>
                        <div class="da-img">
                            <img src="images/logoGA.png" width="320" alt="image04">
                        </div>
                    </div>
                    <!-- Start third slide -->
                    <!-- Start cSlide navigation arrows -->
                    <div class="da-arrows">
                        <span class="da-arrows-prev"></span>
                        <span class="da-arrows-next"></span>
                    </div>
                    <!-- End cSlide navigation arrows -->
                </div>
            </div>
        </div>
        <!-- End home section -->
        <!-- Service section start -->
        <div class="section primary-section" id="service">
            <div class="container">
                <!-- Start title section -->
                <div class="title">
                    <!--<h1>¿Que es GobScore?</h1>-->
                    <img src="images/GobScore.png" width="400" height="200" alt="Logo" />
                    <!-- Section's title goes here -->
                    <p>GobScore trata .... Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, libero reiciendis esse pariatur magni, ipsa minima illum nihil voluptatibus distinctio.</p>
                    <!--Simple description for section goes here. -->
                </div>
                <div class="row-fluid">
                    <div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <img class="img-circle" src="images/Servicio1.png" alt="service 1">
                            </div>
                            <h3>Plataforma Web</h3>
                            <p>Puntuacion de las la información de gobierno</p>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <img class="img-circle" src="images/Servicio2.png" alt="service 2" />
                            </div>
                            <h3>App Móvil</h3>
                            <p>Participa desde tu móvil.</p>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <img class="img-circle" src="images/Servicio3.png" alt="service 3">
                            </div>
                            <h3>Participación por SMS</h3>
                            <p>We Create Modern And Powerful Html5 And CSS3 Code Easy For Read And Customize.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service section end -->
        <!-- Portfolio section start -->
        <div class="section secondary-section " id="portfolio">
            <div class="triangle"></div>
            <div class="container">
                <div class=" title">
                    <h1>Información mejor calificada</h1>
                    <p>Acontinuación se presentan los mejores 9 calificados de toda la información disponible en infoÚtil.</p>
                </div>
                <ul class="nav nav-pills">
                    <li class="filter" data-filter="all">
                        <a href="#noAction">All</a>
                    </li>
                    <li class="filter" data-filter="web">
                        <a href="#noAction">Web</a>
                    </li>
                    <li class="filter" data-filter="photo">
                        <a href="#noAction">Photo</a>
                    </li>
                    <li class="filter" data-filter="identity">
                        <a href="#noAction">Identity</a>
                    </li>
                </ul>
                <!-- Start details for portfolio project 1 -->
                



                <!-- Inicio  Contenedor de los bloques y fichas para la info mejor rankeada -->
                <div id="single-project">

                    <!-- *********** Inicio FICHA para la info mejor rankeada ************************************-->
                    <div id="slidingDiv" class="toggleDiv row-fluid single-project">
                        <div class="span6" >
                            <img src="images/Portfolio01.png" style="margin-top:10%;" alt="project 1" />
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Ranking 1</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        Medicinas</div>
                                    <p>Descripcion: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil autem quisquam voluptate, dolorem non vel consequatur rem? Iusto, delectus quo!</p>
                                    <div>
                                        Rastreo desde Julio 2012</div>
                                    <div>
                                        Encargado MINSAL, MARN, INDES</div>
                                    <div>
                                        http://examplecomp.com</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <!-- *********** FIN FICHA para la info mejor rankeada ************************************-->
                    <!-- End details for portfolio project 1 -->
                    <!-- Start details for portfolio project 2 -->
                    <div id="slidingDiv1" class="toggleDiv row-fluid single-project">
						<div class="span6" >
                            <img src="images/Portfolio02.png" style="margin-top:10%;" alt="project 2" />
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Ranking 2</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        Medicinas</div>
                                    <p>Descripcion: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil autem quisquam voluptate, dolorem non vel consequatur rem? Iusto, delectus quo!</p>
                                    <div>
                                        Rastreo desde Julio 2012</div>
                                    <div>
                                        Encargado MINSAL, MARN, INDES</div>
                                    <div>
                                        http://examplecomp.com</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- End details for portfolio project 2 -->
                    <!-- Start details for portfolio project 3 -->
                    <div id="slidingDiv2" class="toggleDiv row-fluid single-project">
                        <div class="span6" >
                            <img src="images/Portfolio03.png" style="margin-top:10%;" alt="project 3" />
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Ranking 3</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        Medicinas</div>
                                    <p>Descripcion: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil autem quisquam voluptate, dolorem non vel consequatur rem? Iusto, delectus quo!</p>
                                    <div>
                                        Rastreo desde Julio 2012</div>
                                    <div>
                                        Encargado MINSAL, MARN, INDES</div>
                                    <div>
                                        http://examplecomp.com</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- End details for portfolio project 3 -->
                    <!-- Start details for portfolio project 4 -->
                    <div id="slidingDiv3" class="toggleDiv row-fluid single-project">
                        <div class="span6" >
                            <img src="images/Portfolio04.png" style="margin-top:10%;" alt="project 4" />
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Ranking 4</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        Medicinas</div>
                                    <p>Descripcion: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil autem quisquam voluptate, dolorem non vel consequatur rem? Iusto, delectus quo!</p>
                                    <div>
                                        Rastreo desde Julio 2012</div>
                                    <div>
                                        Encargado MINSAL, MARN, INDES</div>
                                    <div>
                                        http://examplecomp.com</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- End details for portfolio project 4 -->
                    <!-- Start details for portfolio project 5 -->
                    <div id="slidingDiv4" class="toggleDiv row-fluid single-project">
                        <div class="span6" >
                            <img src="images/Portfolio05.png" style="margin-top:10%;" alt="project 5" />
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Ranking 5</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        Medicinas</div>
                                    <p>Descripcion: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil autem quisquam voluptate, dolorem non vel consequatur rem? Iusto, delectus quo!</p>
                                    <div>
                                        Rastreo desde Julio 2012</div>
                                    <div>
                                        Encargado MINSAL, MARN, INDES</div>
                                    <div>
                                        http://examplecomp.com</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- End details for portfolio project 5 -->
                    <!-- Start details for portfolio project 6 -->
                    <div id="slidingDiv5" class="toggleDiv row-fluid single-project">
                        <div class="span6" >
                            <img src="images/Portfolio06.png" style="margin-top:10%;" alt="project 6" />
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Ranking 6</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        Medicinas</div>
                                    <p>Descripcion: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil autem quisquam voluptate, dolorem non vel consequatur rem? Iusto, delectus quo!</p>
                                    <div>
                                        Rastreo desde Julio 2012</div>
                                    <div>
                                        Encargado MINSAL, MARN, INDES</div>
                                    <div>
                                        http://examplecomp.com</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- End details for portfolio project 6 -->
                    <!-- Start details for portfolio project 7 -->
                    <div id="slidingDiv6" class="toggleDiv row-fluid single-project">
                        <div class="span6" >
                            <img src="images/Portfolio07.png" style="margin-top:10%;" alt="project 7" />
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Ranking 7</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        Medicinas</div>
                                    <p>Descripcion: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil autem quisquam voluptate, dolorem non vel consequatur rem? Iusto, delectus quo!</p>
                                    <div>
                                        Rastreo desde Julio 2012</div>
                                    <div>
                                        Encargado MINSAL, MARN, INDES</div>
                                    <div>
                                        http://examplecomp.com</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- End details for portfolio project 7 -->
                    <!-- Start details for portfolio project 8 -->
                    <div id="slidingDiv7" class="toggleDiv row-fluid single-project">
                        <div class="span6" >
                            <img src="images/Portfolio08.png" style="margin-top:10%;" alt="project 8" />
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Ranking 8</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        Medicinas</div>
                                    <p>Descripcion: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil autem quisquam voluptate, dolorem non vel consequatur rem? Iusto, delectus quo!</p>
                                    <div>
                                        Rastreo desde Julio 2012</div>
                                    <div>
                                        Encargado MINSAL, MARN, INDES</div>
                                    <div>
                                        http://examplecomp.com</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- End details for portfolio project 8 -->
                    <!-- Start details for portfolio project 9 -->
                    <div id="slidingDiv8" class="toggleDiv row-fluid single-project">
                        <div class="span6" >
                            <img src="images/Portfolio09.png" style="margin-top:10%;" alt="project 9" />
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Ranking 9</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        Medicinas</div>
                                    <p>Descripcion: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil autem quisquam voluptate, dolorem non vel consequatur rem? Iusto, delectus quo!</p>
                                    <div>
                                        Rastreo desde Julio 2012</div>
                                    <div>
                                        Encargado MINSAL, MARN, INDES</div>
                                    <div>
                                        http://examplecomp.com</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <!-- End details for portfolio project 9 -->
                    <!-- *********** BLOQUES  para la info mejor rankeada ************************************-->

                    <ul id="portfolio-grid" class="thumbnails row">

                        <!-- *********** INICIO Del BLOQUE ************-->
                        <li class="span4 mix web">
                            <div class="thumbnail">
                                <img src="images/Portfolio01.png" alt="project 1">
                                <a href="#single-project" class="more show_hide" rel="#slidingDiv">
                                    <i class="icon-plus"></i>
                                    <div style="font-size:10px; ">Ver más</div>

                                </a>
                                <h3>Ranking 1</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, atque.</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <!-- *********** FIN del BLOQUE ************-->
                        <li class="span4 mix photo">
                            <div class="thumbnail">
                                <img src="images/Portfolio02.png" alt="project 2">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv1">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Ranking 2</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, atque.</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix identity">
                            <div class="thumbnail">
                                <img src="images/Portfolio03.png" alt="project 3">
                                <a href="#single-project" class="more show_hide" rel="#slidingDiv2">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Ranking 3</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, atque.</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix web">
                            <div class="thumbnail">
                                <img src="images/Portfolio04.png" alt="project 4">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv3">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Ranking 4</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, atque.</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix photo">
                            <div class="thumbnail">
                                <img src="images/Portfolio05.png" alt="project 5">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv4">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Ranking 5</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, atque.</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix identity">
                            <div class="thumbnail">
                                <img src="images/Portfolio06.png" alt="project 6">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv5">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Ranking 6</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, atque.</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix web">
                            <div class="thumbnail">
                                <img src="images/Portfolio07.png" alt="project 7" />
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv6">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Ranking 7</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, atque.</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix photo">
                            <div class="thumbnail">
                                <img src="images/Portfolio08.png" alt="project 8">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv7">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Ranking 8</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, atque.</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix identity">
                            <div class="thumbnail">
                                <img src="images/Portfolio09.png" alt="project 9">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv8">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Ranking 9</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, atque.</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Fin  Contenedor de los bloques para la info mejor rankeada -->
            </div>
        </div>
        <!-- Portfolio section end -->

        <!-- About us section start -->
        <!--
        <div class="section primary-section" id="about">
        <div class="triangle"></div>
        <div class="container">
        <div class="title">
        <h1>Who We Are?</h1>
        <p>Duis mollis placerat quam, eget laoreet tellus tempor eu. Quisque dapibus in purus in dignissim.</p>
        </div>
        <div class="row-fluid team">
        <div class="span4" id="first-person">
        <div class="thumbnail">
        <img src="images/Team1.png" alt="team 1">
        <h3>John Doe</h3>
        <ul class="social">
        <li>
        <a href="">
        <span class="icon-facebook-circled"></span>
        </a>
        </li>
        <li>
        <a href="">
        <span class="icon-twitter-circled"></span>
        </a>
        </li>
        <li>
        <a href="">
        <span class="icon-linkedin-circled"></span>
        </a>
        </li>
        </ul>
        <div class="mask">
        <h2>Copywriter</h2>
        <p>When you stop expecting people to be perfect, you can like them for who they are.</p>
        </div>
        </div>
        </div>
        <div class="span4" id="second-person">
        <div class="thumbnail">
        <img src="images/Team2.png" alt="team 1">
        <h3>John Doe</h3>
        <ul class="social">
        <li>
        <a href="">
        <span class="icon-facebook-circled"></span>
        </a>
        </li>
        <li>
        <a href="">
        <span class="icon-twitter-circled"></span>
        </a>
        </li>
        <li>
        <a href="">
        <span class="icon-linkedin-circled"></span>
        </a>
        </li>
        </ul>
        <div class="mask">
        <h2>Designer</h2>
        <p>When you stop expecting people to be perfect, you can like them for who they are.</p>
        </div>
        </div>
        </div>
        <div class="span4" id="third-person">
        <div class="thumbnail">
        <img src="images/Team3.png" alt="team 1">
        <h3>John Doe</h3>
        <ul class="social">
        <li>
        <a href="">
        <span class="icon-facebook-circled"></span>
        </a>
        </li>
        <li>
        <a href="">
        <span class="icon-twitter-circled"></span>
        </a>
        </li>
        <li>
        <a href="">
        <span class="icon-linkedin-circled"></span>
        </a>
        </li>
        </ul>
        <div class="mask">
        <h2>Photographer</h2>
        <p>When you stop expecting people to be perfect, you can like them for who they are.</p>
        </div>
        </div>
        </div>
        </div>
        <div class="about-text centered">
        <h3>About Us</h3>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
        </div>
        <h3>Skills</h3>
        <div class="row-fluid">
        <div class="span6">
        <ul class="skills">
        <li>
        <span class="bar" data-width="80%"></span>
        <h3>Graphic Design</h3>
        </li>
        <li>
        <span class="bar" data-width="95%"></span>
        <h3>Html & Css</h3>
        </li>
        <li>
        <span class="bar" data-width="68%"></span>
        <h3>jQuery</h3>
        </li>
        <li>
        <span class="bar" data-width="70%"></span>
        <h3>Wordpress</h3>
        </li>
        </ul>
        </div>
        <div class="span6">
        <div class="highlighted-box center">
        <h1>We're Hiring</h1>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, ullamcorper suscipit lobortis nisl ut aliquip consequat. I learned that we can do anything, but we can't do everything...</p>
        <button class="button button-sp">Join Us</button>
        </div>
        </div>
        </div>
        </div>
        </div>
        -->
        <!-- About us section end -->
        <!--<div class="section secondary-section">
        <div class="triangle"></div>
        <div class="container centered">
        <p class="large-text">Elegance is not the abundance of simplicity. It is the absence of complexity.</p>
        <a href="#" class="button">Purshase now</a>
        </div>
        </div>
        -->
        <!-- Client section start -->
        <!-- Client section start -->
        <div id="clients">
            <div class="section primary-section">
                <div class="triangle"></div>
                <div class="container">
                    <div class="title">
                        <h1>Ultimos Comentarios/ Rankeos </h1>
                        <p>Duis mollis placerat quam, eget laoreet tellus tempor eu. Quisque dapibus in purus in dignissim.</p>
                    </div>
                    <div class="row">
                        <div class="span4">
                            <div class="testimonial">
                                <p>"I've worked too hard and too long to let anything stand in the way of my goals. I will not let my teammates down and I will not let myself down."</p>
                                <div class="whopic">
                                    <div class="arrow"></div>
                                    <img src="images/Client1.png" class="centered" alt="client 1">
                                    <strong>John Doe
                                        <small>Client</small>
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="testimonial">
                                <p>"In motivating people, you've got to engage their minds and their hearts. I motivate people, I hope, by example - and perhaps by excitement, by having productive ideas to make others feel involved."</p>
                                <div class="whopic">
                                    <div class="arrow"></div>
                                    <img src="images/Client2.png" class="centered" alt="client 2">
                                    <strong>John Doe
                                        <small>Client</small>
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="testimonial">
                                <p>"Determine never to be idle. No person will have occasion to complain of the want of time who never loses any. It is wonderful how much may be done if we are always doing."</p>
                                <div class="whopic">
                                    <div class="arrow"></div>
                                    <img src="images/Client3.png" class="centered" alt="client 3">
                                    <strong>John Doe
                                        <small>Client</small>
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="testimonial">
                                <p>"Determine never to be idle. No person will have occasion to complain of the want of time who never loses any. It is wonderful how much may be done if we are always doing."</p>
                                <div class="whopic">
                                    <div class="arrow"></div>
                                    <img src="images/Client3.png" class="centered" alt="client 3">
                                    <strong>John Doe
                                        <small>Client</small>
                                    </strong>
                                </div>
                            </div>
                        </div>

                        <div class="span4">
                            <div class="testimonial">
                                <p>"Determine never to be idle. No person will have occasion to complain of the want of time who never loses any. It is wonderful how much may be done if we are always doing."</p>
                                <div class="whopic">
                                    <div class="arrow"></div>
                                    <img src="images/Client3.png" class="centered" alt="client 3">
                                    <strong>John Doe
                                        <small>Client</small>
                                    </strong>
                                </div>
                            </div>
                        </div>

                        <div class="span4">
                            <div class="testimonial">
                                <p>"Determine never to be idle. No person will have occasion to complain of the want of time who never loses any. It is wonderful how much may be done if we are always doing."</p>
                                <div class="whopic">
                                    <div class="arrow"></div>
                                    <img src="images/Client3.png" class="centered" alt="client 3">
                                    <strong>John Doe
                                        <small>Client</small>
                                    </strong>
                                </div>
                            </div>
                        </div>

                        <div class="span4">
                            <div class="testimonial">
                                <p>"Determine never to be idle. No person will have occasion to complain of the want of time who never loses any. It is wonderful how much may be done if we are always doing."</p>
                                <div class="whopic">
                                    <div class="arrow"></div>
                                    <img src="images/Client3.png" class="centered" alt="client 3">
                                    <strong>John Doe
                                        <small>Client</small>
                                    </strong>
                                </div>
                            </div>
                        </div>

                        <div class="span4">
                            <div class="testimonial">
                                <p>"Determine never to be idle. No person will have occasion to complain of the want of time who never loses any. It is wonderful how much may be done if we are always doing."</p>
                                <div class="whopic">
                                    <div class="arrow"></div>
                                    <img src="images/Client3.png" class="centered" alt="client 3">
                                    <strong>John Doe
                                        <small>Client</small>
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="testimonial-text">
                        "Cambia todo, menos a tu mujer y tus hijos, dicho popular en korea del norte"
                    </p>
                </div>
            </div>
        </div>
        <!--
        <div class="section third-section">
        <div class="container centered">
        <div class="sub-section">
        <div class="title clearfix">
        <div class="pull-left">
        <h3>Our Clients</h3>
        </div>
        <ul class="client-nav pull-right">
        <li id="client-prev"></li>
        <li id="client-next"></li>
        </ul>
        </div>
        <ul class="row client-slider" id="clint-slider">
        <li>
        <a href="">
        <img src="images/clients/ClientLogo01.png" alt="client logo 1">
        </a>
        </li>
        <li>
        <a href="">
        <img src="images/clients/ClientLogo02.png" alt="client logo 2">
        </a>
        </li>
        <li>
        <a href="">
        <img src="images/clients/ClientLogo03.png" alt="client logo 3">
        </a>
        </li>
        <li>
        <a href="">
        <img src="images/clients/ClientLogo04.png" alt="client logo 4">
        </a>
        </li>
        <li>
        <a href="">
        <img src="images/clients/ClientLogo05.png" alt="client logo 5">
        </a>
        </li>
        <li>
        <a href="">
        <img src="images/clients/ClientLogo02.png" alt="client logo 6">
        </a>
        </li>
        <li>
        <a href="">
        <img src="images/clients/ClientLogo04.png" alt="client logo 7">
        </a>
        </li>
        </ul>
        </div>
        </div>
        </div> -- >
        <!-- Price section start -->
        <!--
        <div id="price" class="section secondary-section">
        <div class="container">
        <div class="title">
        <h1>Price</h1>
        <p>Duis mollis placerat quam, eget laoreet tellus tempor eu. Quisque dapibus in purus in dignissim.</p>
        </div>
        <div class="price-table row-fluid">
        <div class="span4 price-column">
        <h3>Basic</h3>
        <ul class="list">
        <li class="price">$19,99</li>
        <li><strong>Free</strong> Setup</li>
        <li><strong>24/7</strong> Support</li>
        <li><strong>5 GB</strong> File Storage</li>
        </ul>
        <a href="#" class="button button-ps">BUY</a>
        </div>
        <div class="span4 price-column">
        <h3>Pro</h3>
        <ul class="list">
        <li class="price">$39,99</li>
        <li><strong>Free</strong> Setup</li>
        <li><strong>24/7</strong> Support</li>
        <li><strong>25 GB</strong> File Storage</li>
        </ul>
        <a href="#" class="button button-ps">BUY</a>
        </div>
        <div class="span4 price-column">
        <h3>Premium</h3>
        <ul class="list">
        <li class="price">$79,99</li>
        <li><strong>Free</strong> Setup</li>
        <li><strong>24/7</strong> Support</li>
        <li><strong>50 GB</strong> File Storage</li>
        </ul>
        <a href="#" class="button button-ps">BUY</a>
        </div>
        </div>
        <div class="centered">
        <p class="price-text">We Offer Custom Plans. Contact Us For More Info.</p>
        <a href="#contact" class="button">Contact Us</a>
        </div>
        </div>
        </div>
        -->
        <!-- Price section end -->
        <!-- Newsletter section start -->
        <!--
        <div class="section third-section">
        <div class="container newsletter">
        <div class="sub-section">
        <div class="title clearfix">
        <div class="pull-left">
        <h3>Newsletter</h3>
        </div>
        </div>
        </div>
        <div id="success-subscribe" class="alert alert-success invisible">
        <strong>Well done!</strong>You successfully subscribet to our newsletter.</div>
        <div class="row-fluid">
        <div class="span5">
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
        </div>
        <div class="span7">
        <form class="inline-form">
        <input type="email" name="email" id="nlmail" class="span8" placeholder="Enter your email" required />
        <button id="subscribe" class="button button-sp">Subscribe</button>
        </form>
        <div id="err-subscribe" class="error centered">Please provide valid email address.</div>
        </div>
        </div>
        </div>
        </div>
        -->
        <!-- Newsletter section end -->
        <!-- Contact section start -->
        <div id="contact" class="contact ">
            <div class="section secondary-section">
                <div class="container">
                    <div class="title">
                        <h1>Rankea La informacion de tu interes</h1>
                        <p>Duis mollis placerat quam, eget laoreet tellus tempor eu. Quisque dapibus in purus in dignissim.</p>
                    </div>
                </div>
                <div class="map-wrapper">
                    <div class="map-canvas" id="map-canvas">Loading map...</div>
                    <div class="container">
                        <div class="row-fluid">
                            <div class="span5 contact-form centered">
                                <h3>Participar!!</h3>
                                <div id="successSend" class="alert alert-success invisible">
                                    <strong>Well done!</strong>Your message has been sent.</div>
									<div id="errorSend" class="alert alert-error invisible">There was an error.</div>
									<div id="formulario"> ff </div>
									<script>
										$.ajax({
											'type' : 'get',
											'url'  : 'http://'+servidor+'/crear-denuncias',
											'data' : {},
											'success' : function (data) {
												$('#formulario').html(data);
											}
										});
									</script>
                            </div>
                        </div>
                    </div>
                </div>
                <!--
                <div class="container">
                <div class="span9 center contact-info">
                <p>123 Fifth Avenue, 12th,New York,NY 10010</p>
                <p class="info-mail">ourstudio@somemail.com</p>
                <p>+11 234 567 890</p>
                <p>+11 286 543 850</p>
                <div class="title">
                <h3>We Are Social</h3>
                </div>
                </div>
                <div class="row-fluid centered">
                <ul class="social">
                <li>
                <a href="">
                <span class="icon-facebook-circled"></span>
                </a>
                </li>
                <li>
                <a href="">
                <span class="icon-twitter-circled"></span>
                </a>
                </li>
                <li>
                <a href="">
                <span class="icon-linkedin-circled"></span>
                </a>
                </li>
                <li>
                <a href="">
                <span class="icon-pinterest-circled"></span>
                </a>
                </li>
                <li>
                <a href="">
                <span class="icon-dribbble-circled"></span>
                </a>
                </li>
                <li>
                <a href="">
                <span class="icon-gplus-circled"></span>
                </a>
                </li>
                </ul>
                </div>
                </div> -->
            </div>
        </div>
        <!-- Contact section edn -->
        <!-- Footer section start -->
        <div class="footer">
            <p>&copy; 2013 All Rights Reserved</p>
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->
        <!-- Include javascript -->
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="js/jquery.cslider.js"></script>
        <script type="text/javascript" src="js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="js/jquery.inview.js"></script>
        <!-- Load google maps api and call initializeMap function defined in app.js -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;callback=initializeMap"></script>
        <!-- css3-mediaqueries.js for IE8 or older -->
        <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="js/app.js"></script>
		<!--*********************************** MODAL ******************************************-->

 
<!_________________________-- Cuerpo Modal _______________________________-->

 <div id="myModal" class="modal hide fade centro " tabindex="-1" role="dialog">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3 class="azul">Ingresar a GobScore</h3>
            </div>
            <div class="modal-body azul">
                    <form role="form">
                      
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                               placeholder="Introduce tu email" required>
                      
                     
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="password" 
                               placeholder="Contraseña" required>
                               <br>
                      
                    
                      <button type="submit" class="btn btn-success btn-default">Enviar</button>
                      <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    </form>
                
            </div>
            
        </div>
<--____________________________Script Modal ________________________________-->
 <script type="text/javascript">

                $('#openBtn').click(function(){
  
                    $('.modal-body').load('/render/62805',function(result){
                        $('#myModal').modal({show:true});
                    });
                  
                    
                });    
</script>

<!--*********************************** FIN MODAL ******************************************-->

    </body>
</html>