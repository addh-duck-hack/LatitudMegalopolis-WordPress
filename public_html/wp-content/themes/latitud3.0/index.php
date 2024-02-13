<?php
/*
Template Name: Pagina principal
*/
?>
<?php $nombre = "index.php"; ?>
<?php get_header(); ?>
<body>
<div class="container">
   <?php
      require (TEMPLATEPATH. '/config/configs.php');
      require (TEMPLATEPATH. '/config/functions.php');

      $connection = dbConnection($db_config);
      if (!$connection) {
         header('Location: error.php');
      }
      $cDolarD = selectLastFromWhereX2($connection,"divisas","id_divisa","Compra","Dolar");
      $cDolar = $cDolarD[0]['valor_divisa'];
      $vDolarD = selectLastFromWhereX2($connection,"divisas","id_divisa","Venta","Dolar");
      $vDolar = $vDolarD[0]['valor_divisa'];
      $cEuroD = selectLastFromWhereX2($connection,"divisas","id_divisa","Compra","Euro");
      $cEuro = $cEuroD[0]['valor_divisa'];
      $vEuroD = selectLastFromWhereX2($connection,"divisas","id_divisa","Venta","Euro");
      $vEuro = $vEuroD[0]['valor_divisa'];
   ?>
   <?php require 'banner-publicidad11.php'; ?>
   <div class="row margen-top">
      <div class="col-12">
         <?php require 'carousel.php'; ?>
      </div>
   </div>
   <div class="row margen-top div-cir">
     <div class="col-12 col-lg-6 item-div">
       <img src="<?php bloginfo('template_url'); ?>/resources/divisas.gif" class="full-img" alt="">
       <div class="row">
         <div class="col-4 item-div1"><h5>Compra</h5></div>
         <div class="col-4 item-div2"><?php echo $cDolar; ?></div>
         <div class="col-4 item-div2"><?php echo $cEuro; ?></div>
       </div>
       <div class="row">
         <div class="col-4 item-div4"><h5>Venta</h5></div>
         <div class="col-4 item-div3"><?php echo $vDolar; ?></div>
         <div class="col-4 item-div3"><?php echo $vEuro; ?></div>
       </div>
     </div>
     <div class="col-12 col-lg-6 item-cir">
      <img src="<?php bloginfo('template_url'); ?>/resources/no_circula2.gif" class="full-img" alt="">
     </div>
   </div>
   <?php require 'banner-publicidad.php'; ?>
   <?php require 'new-playlist.php'; ?>
   <div class="row columnistas margen-top" style="height: auto;">
      <?php require 'columnistas.php'; ?>
   </div>
   <div class="row margen-top">
     <div class="col-12 text-center borde-lima">
       <h1>ALCALDÍAS</h1>
     </div>
   </div>
   <div class="row margen-top">
      <div class="col-12">
         <div id="carouselAlcaldias" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators hidden-xs">
               <?php query_posts('category_name=alcaldias')?><!--Para elegir categoria en slider-->
               <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 10) : the_post(); ?>
                  <!--Codigo que se ejecutara cuando encuentre algun post-->
                  <li data-target="#carouselAlcaldias" data-slide-to="<?php echo ($i-1); ?>"<?php if (($i-1) == 0): ?>
                     class="active"
                  <?php endif; ?>></li>
               <?php $i++; endwhile; endif; ?>
               <?php wp_reset_query();?>
           </ol>
           <div class="carousel-inner">
              <?php query_posts('category_name=alcaldias')?><!--Para elegir categoria en slider-->
              <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 10) : the_post(); ?>
              <!--Codigo que se ejecutara cuando encuentre algun post-->
                <div class="carousel-item <?php if (($i-1) == 0): ?>
                   active
                <?php endif; ?>">
                   <a href="<?php the_permalink();?>">
                      <img class="d-block w-100" src="
                     <?php
                        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                          the_post_thumbnail_url('full');
                        }
                     ?>">
                   </a>
                </div>
              <?php $i++; endwhile; else: ?>
              <!--Codigo que se ejecutara si no encuentra post-->
              <h1>Error 404 no se encontraron portadas.</h1>
              <?php endif; ?>
              <?php wp_reset_query();?>
           </div>
           <a class="carousel-control-prev" href="#carouselAlcaldias" role="button" data-slide="prev">
             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
             <span class="sr-only">Previous</span>
           </a>
           <a class="carousel-control-next" href="#carouselAlcaldias" role="button" data-slide="next">
             <span class="carousel-control-next-icon" aria-hidden="true"></span>
             <span class="sr-only">Next</span>
           </a>
         </div>
      </div>
   </div>
	<!-- <div class="row margen-top oculto-lg">
	<div class="col-11 marco contador" style="padding-left: 15px; padding-right: 15px;">
         <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar ( 'SidebarContador' ) ) : endif; ?>
      </div>
	</div> -->
   <?php require 'banner-publicidad2.php'; ?>
   <?php require 'titulares.php'; ?>
   <?php require 'banner-publicidad3.php'; ?>
   <?php require 'estados.php'; ?>
   <?php require 'banner-publicidad13.php'; ?>
   <div class="row margen-top">
      <div class="col-12">
         <?php require 'carousel-negocios.php'; ?>
      </div>
   </div>
   <?php require 'banner-publicidad4.php'; ?>
   <div class="row margen-top">
      <div class="col-12 col-md-9">
         <?php require 'carousel2.php'; ?>
      </div>
      <div class="col-12 col-md-3" style="padding-left: 0;">
      <a class="twitter-timeline" data-width="235" data-height="415" href="https://twitter.com/Latitud_mx?ref_src=twsrc%5Etfw">Tweets by Latitud_mx</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
   </div>
   <div class="row margen-top">
       <div class="col-12" style="padding-bottom: 25px;">
         <?php
           $data = selectLastFrom($connection,"img_luy","id_img");
           $img = $data[0]['url_img'];
           $img;
         ?>
          <img class="full-img" src="<?php echo $img; ?>" alt="">
       </div>
    </div>
   <?php require 'titulares2.php'; ?>
</div>


<?php get_footer(); ?>
