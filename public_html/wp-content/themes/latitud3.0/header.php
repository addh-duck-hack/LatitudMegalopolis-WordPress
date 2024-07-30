<?php $IMGLUY = ""; ?>
<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
   <head>
      <meta charset="<?php bloginfo('charset'); ?>">
      <title><?php bloginfo('name'); ?></title>
	   <meta name="google-site-verification" content="RQY_Jn3LU0djgLVDXY5sI3pE7QFCz07tpo72kiniwfc" />
      <meta name="viewport" content="width=device-width, user-escalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1">
	   <meta name="description" content="Latitud Megalópolis&nbsp;Periodismo con experiencia, seriedad y credibilidad" />
      <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
      <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/estilos15122020.css">
	    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans|Prosto+One|Russo+One|Questrial&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
      <script src="<?php bloginfo('template_url'); ?>/js/menu.js"></script>
      <?php wp_head(); ?>
   </head>
   <header>
      <?php include (TEMPLATEPATH. '/analyticstracking.php');?>
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-7 col-md-4 margen-top" style="margin-bottom: 10px;">
               <a href="https://latitudmegalopolis.com/">
                  <img class="full-img" src="https://latitudmegalopolis.com/wp-content/themes/latitud3.0/resources/logo_nuevo3.png" alt="">
               </a>
            </div>
            <!-- <div class="col-4">
               <div class="fecha text-right" id="fecha"></div>
            </div> -->
         </div>
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav-principal">
            <a class="navbar-brand" href="http://latitudmegalopolis.com/">INICIO</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>

           <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                 <a class="nav-link" href="https://latitudmegalopolis.com/directorio/">DIRECTORIO <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SECCIONES
                 </a>
                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="#" id="television">Televisión</a>
                   <a class="dropdown-item" href="#" id="megalopolis">Megalópolis</a>
                   <a class="dropdown-item" href="#" id="estados">Estados</a>
                   <a class="dropdown-item" href="#" id="portada2">Contra Portada</a>
                   <a class="dropdown-item" href="#" id="tinta">Tinta Rosa</a>
                   <a class="dropdown-item" href="#" id="cultura">Cultura</a>
                   <a class="dropdown-item" href="#" id="reportajes">Reportajes</a>
                   <a class="dropdown-item" href="#" id="entretenimiento">Entretenimiento</a>
                   <a class="dropdown-item" href="#" id="deportes">Deportes</a>
                 </div>
              </li>
              <li class="nav-item" style="position: absolute;margin-left: 55%;">
                <a href="#" class="nav-link" id="fecha"></a>
              </li>
             </ul>
             <form class="form-inline my-2 my-lg-0">
               <a href="https://www.facebook.com/Latitud-Megal%C3%B3polis-234577750271348/"><img class="icon-mov" src="<?php bloginfo('template_url'); ?>/resources/facebook.png" alt=""></a>
               <a href="https://twitter.com/@Latitud_mx"><img class="icon-mov" src="<?php bloginfo('template_url'); ?>/resources/twitter.png" alt=""></a>
               <a href="https://www.youtube.com/channel/UCoFRsjmNaTM6NTvg6taop0w"><img class="icon-mov" src="<?php bloginfo('template_url'); ?>/resources/youtube.png" alt=""></a>
               <a href="https://www.instagram.com/latitud.megalopolis/"><img class="icon-mov" src="<?php bloginfo('template_url'); ?>/resources/instagram.png" alt=""></a>
             </form>
           </div>
         </nav>
      </div>
   </header>
