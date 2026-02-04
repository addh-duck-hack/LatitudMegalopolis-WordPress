<?php
/*
Template Name: LatitudTaurina
*/
?>
<?php
require (TEMPLATEPATH. '/config/configs.php');
require (TEMPLATEPATH. '/config/functions.php');
$connection = dbConnection($db_config);
if (!$connection) {
    header('Location: error.php');
}
?>

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
               <a href="https://latitudmegalopolis.com/latitud-taurina/">
                  <img class="full-img" src="<?php bloginfo('template_url'); ?>/resources/latitud_taurina_nuevo1.png" alt="">
               </a>
            </div>
            <!-- <div class="col-4">
               <div class="fecha text-right" id="fecha"></div>
            </div> -->
         </div>
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav-principal">
            <!-- <a class="navbar-brand" href="#">Director Carlos Yarza</a> -->
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>

           <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav mr-auto">
              <li class="nav-item" style="position: absolute;margin-left: 55%;">
                <a href="#" class="nav-link" id="fecha" style="margin-top: -19px;"></a>
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
<body>
    <div class="container">
      <!--Banner de publicidad 19 Latitud taurina, se repetira mas abajo-->
      <?php require 'banner-publicidad19.php'; ?>
      <!--Espacio para primer carousel, el cual contendra las primeras 2 notas de latitud taurina y 1 publicidad de la base publicidad_taurina en la pocision 1 con estatus 200-->
      <?php require 'carousel-taurina1.php'; ?>
      <?php query_posts('category_name=deportes')?><!--Para elegir categoria en slider-->
      <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 5) : the_post(); ?>
      <!--Codigo que se ejecutara cuando encuentre algun post-->
      <?php if ($i == 4): ?>
         <div class="row margen-top">
               <div class="col-12 col-md-6 h300">
                  <a href="<?php the_permalink();?>">
                  <img class="d-block full-img" src="
                  <?php
                     if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                     the_post_thumbnail_url('full');
                     }
                  ?>">
                  </a>
               </div>
               <div class="col-12 col-md-6 h300 borde-verde oculto-xs">
                  <a href="<?php the_permalink();?>">
                  <h1 class="text-left"><?php the_title(); ?></h1>
                  </a>
                  <p class="text-left"><?php $extracto = get_the_content() ;
                  $extracto = strip_tags($extracto);
                  echo substr($extracto, 0, 150); ?>
                  <a href="<?php the_permalink();?>">...leer más.</a></p>
               </div>
               <div class="col-12 col-md-6 h300 borde-verde oculto-lg">
                  <a href="<?php the_permalink();?>">
                  <h1 class="text-center"><?php the_title(); ?></h1>
                  </a>
                  <p class="text-justify"><?php $extracto = get_the_content() ;
                  $extracto = strip_tags($extracto);
                  echo substr($extracto, 0, 150); ?>
                  <a href="<?php the_permalink();?>">...leer más.</a></p>
               </div>
         </div>
      <?php else: ?>

      <?php endif; ?>
      <?php $i++; endwhile; else: ?>
      <!--Codigo que se ejecutara si no encuentra post-->
      <h1>Error 404 no se encontraron portadas.</h1>
      <?php endif; ?>
      <?php wp_reset_query();?>

      <div class="row margen-top">
      <?php query_posts('category_name=deportes')?><!--Para elegir categoria en slider-->
      <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 7) : the_post(); ?>
      <!--Codigo que se ejecutara cuando encuentre algun post-->
         <?php if ($i < 5): ?>

         <?php else: ?>
               <div class="col-12 col-md-6">
                  <div class="h300">
                  <a href="<?php the_permalink();?>">
                     <img class="d-block full-img" src="
                     <?php
                           if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                           the_post_thumbnail_url('full');
                           }
                     ?>">
                  </a>
                  </div>
                  <div class="h300 borde-verde oculto-xs">
                  <a href="<?php the_permalink();?>">
                     <h1 class="text-right"><?php the_title(); ?></h1>
                  </a>
                  <p class="text-right"><?php $extracto = get_the_content() ;
                  $extracto = strip_tags($extracto);
                  echo substr($extracto, 0, 150); ?>
                  <a href="<?php the_permalink();?>">...leer más.</a></p>
                  </div>
                  <div class="h300 borde-verde oculto-lg">
                  <a href="<?php the_permalink();?>">
                     <h1 class="text-center"><?php the_title(); ?></h1>
                  </a>
                  <p class="text-justify"><?php $extracto = get_the_content() ;
                  $extracto = strip_tags($extracto);
                  echo substr($extracto, 0, 150); ?>
                  <a href="<?php the_permalink();?>">...leer más.</a></p>
                  </div>
               </div>
         <?php endif; ?>
      <?php $i++; endwhile; else: ?>
      <!--Codigo que se ejecutara si no encuentra post-->
      <h1>Error 404 no se encontraron portadas.</h1>
      <?php endif; ?>
      <?php wp_reset_query();?>
      </div>
      <!--Carousel exclusivo de publicidad de toros traido desde base de datos-->
      <?php require 'carousel-taurina2.php'; ?>
      <div class="row margen-top">
      <?php query_posts('category_name=deportes')?><!--Para elegir categoria en slider-->
      <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 11) : the_post(); ?>
      <!--Codigo que se ejecutara cuando encuentre algun post-->
         <?php if ($i < 7): ?>

         <?php else: ?>
               <div class="col-12 col-md-6">
                  <div class="h300">
                  <a href="<?php the_permalink();?>">
                     <img class="d-block full-img" src="
                     <?php
                           if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                           the_post_thumbnail_url('full');
                           }
                     ?>">
                  </a>
                  </div>
                  <div class="h300 borde-verde oculto-xs">
                  <a href="<?php the_permalink();?>">
                     <h1 class="text-right"><?php the_title(); ?></h1>
                  </a>
                  <p class="text-right"><?php $extracto = get_the_content() ;
                  $extracto = strip_tags($extracto);
                  echo substr($extracto, 0, 150); ?>
                  <a href="<?php the_permalink();?>">...leer más.</a></p>
                  </div>
                  <div class="h300 borde-verde oculto-lg">
                  <a href="<?php the_permalink();?>">
                     <h1 class="text-center"><?php the_title(); ?></h1>
                  </a>
                  <p class="text-justify"><?php $extracto = get_the_content() ;
                  $extracto = strip_tags($extracto);
                  echo substr($extracto, 0, 150); ?>
                  <a href="<?php the_permalink();?>">...leer más.</a></p>
                  </div>
               </div>
         <?php endif; ?>
      <?php $i++; endwhile; else: ?>
      <!--Codigo que se ejecutara si no encuentra post-->
      <h1>Error 404 no se encontraron portadas.</h1>
      <?php endif; ?>
      <?php wp_reset_query();?>
      </div>
      <!--Imagen de banner nueva-->
      <div class="col-12" style="padding: 0;">
         <img src="<?php bloginfo('template_url'); ?>/resources/cronista_hidalgo.jpg" alt="" style="width:100%">
      </div>
      <!--Carousel estatico con 5 fotos que no se modificaran-->
      <?php require 'carousel-taurina3.php'; ?>
      <!--Banner de publicidad 19 Latitud taurina, se repetira mas abajo-->
      <?php require 'banner-publicidad19.php'; ?>
      <!--Seccion de latitud taurina-->
      <?php query_posts('category_name=latitud-taurina')?><!--Para elegir categoria en slider-->
      <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 2) : the_post(); ?>
      <!--Codigo que se ejecutara cuando encuentre algun post-->
      <div class="row">
         <div class="col-12">
               <div class="h400">
                  <a href="<?php the_permalink();?>">
                  <img class="d-block full-img" src="
                  <?php
                     if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                     the_post_thumbnail_url('full');
                     }
                  ?>">
                  </a>
               </div>
         </div>
         <div class="col-12 borde-verde">
               <a href="<?php the_permalink();?>">
                  <h1 class="text-center"><?php the_title(); ?></h1>
               </a>
               <div class="col-12 oculto-xs">
               <p class="text-center" style="font-size: 25px;"><?php $extracto = get_the_content() ;
               $extracto = strip_tags($extracto);
               echo substr($extracto, 0, 150); ?>
               <a href="<?php the_permalink();?>" style="color: green;">...leer más.</a></p>
         </div>
         <div class="col-12 h400 oculto-lg">
               <p class="text-justify"><?php $extracto = get_the_content() ;
               $extracto = strip_tags($extracto);
               echo substr($extracto, 0, 150); ?>
               <a href="<?php the_permalink();?>">...leer más.</a></p>
         </div>
         </div>
      </div>
      <?php $i++; endwhile; else: ?>
      <!--Codigo que se ejecutara si no encuentra post-->
      <h1>Error 404 no se encontraron portadas.</h1>
      <?php endif; ?>
      <?php wp_reset_query();?>
    </div> 
</body>

<?php get_footer(); ?>