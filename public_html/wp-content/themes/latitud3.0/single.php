<?php get_header(); ?>
<?php
 require (TEMPLATEPATH. '/config/configs.php');
 require (TEMPLATEPATH. '/config/functions.php');

 $connection = dbConnection($db_config);
 if (!$connection) {
   header('Location: error.php');
 }
 ?>
<div class="container">
   <div class="row">
      <div class="col-12">
         <div>
           <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
             <div class="container-fluid">
                <div class="row">
                   <div class="col-12 barra-single">
                     <?php if (in_category('portada2')): ?>
                      <?php require 'banner-publicidad4.php'; ?>
                     <?php endif; ?>
                     <?php if (in_category('titulares')): ?>
                      <?php require 'banner-publicidad2.php'; ?>
                     <?php endif; ?>
                     <?php if (in_category('tinta-rosa')): ?>
                      <?php require 'banner-publicidad5.php'; ?>
                     <?php endif; ?>
                     <?php if (in_category('estados')): ?>
                      <?php require 'banner-publicidad3.php'; ?>
                     <?php endif; ?>
                     <?php if (in_category('cuentos')): ?>
                      <?php require 'banner-publicidad7.php'; ?>
                     <?php endif; ?>
                     <?php if (in_category('orgullomx')): ?>
                      <?php require 'banner-publicidad6.php'; ?>
                     <?php endif; ?>
                     <?php if (in_category('reportaje')): ?>
                      <?php require 'banner-publicidad7.php'; ?>
                     <?php endif; ?>
                     <?php if (in_category('cultura')): ?>
                      <?php require 'banner-publicidad8.php'; ?>
                     <?php endif; ?>
                     <?php if (in_category('entretenimiento')): ?>
                      <?php require 'banner-publicidad9.php'; ?>
                     <?php endif; ?>
                     <?php if (in_category('deportes') or in_category('deportes2')): ?>
                      <?php require 'banner-publicidad10.php'; ?>
                     <?php endif; ?>
                  </div>
                </div>
               <div class="row cont-titulo align-items-center">
                 <div class="col-xs-0 col-sm-1">
                   <img class="l-titulo" src="https://latitudmegalopolis.com/wp-content/uploads/2018/07/Logo-nuevo.png" alt="">
                 </div>
                 <div class="col-xs-12 col-sm-10 <?php if (in_category('juridico')): ?>
                   oculto
                 <?php endif; ?>
                 <?php if (in_category('tendencias')): ?>
                   bb-lima
                 <?php endif; ?>
                 <?php if (in_category('entrevista')): ?>
                   bb-marron
                 <?php endif; ?>
                 <?php if (in_category('portada') or in_category('portada2')): ?>
                   bb-negro
                 <?php endif; ?>
                 <?php if (in_category('columnistas') or in_category('titulares')): ?>
                   bb-rojo
                 <?php endif; ?>
                 <?php if (in_category('tinta-rosa')): ?>
                   bb-rosa titulo-rosa
                 <?php endif; ?>
                 <?php if (in_category('cuentos')): ?>
                   bb-rosa
                 <?php endif; ?>
                 <?php if (in_category('orgullomx')): ?>
                   bb-gris
                 <?php endif; ?>
                 <?php if (in_category('reportaje')): ?>
                   bb-amarillo
                 <?php endif; ?>
                 <?php if (in_category('cultura')): ?>
                   bb-militar
                 <?php endif; ?>
                 <?php if (in_category('entretenimiento')): ?>
                   bb-azul
                 <?php endif; ?>
                 <?php if (in_category('deportes') or in_category('deportes2')): ?>
                   bb-verde
                 <?php endif; ?>">
                   <h1 class="contenido-titulo text-center"><?php the_title(); ?></h1>
                 </div>
                 <div class="col-xs-0 col-sm-1">

                 </div>
               </div>
             </div>

              <?php if (in_category('videos') or in_category('radio') or in_category('periodistas') or in_category('opinion') or in_category('opinions') or in_category('juridico')): ?>
              <?php else: ?>
                 <h3 class="contenido-autor text-center">Por: <?php the_author_posts_link(); ?></h3>
              <?php endif; ?>

              <div class="contenido-texto">
                 <?php the_content(); ?>
              </div>
              <h3 class="text-center margen-top single-compartir"><i class="material-icons">thumb_up</i> ¿Te gusta el contenido? Compártelo en tus redes sociales.</h3></p>
              <?php comments_template(); ?>
           <?php endwhile; else: ?>
              <h3>Error 404 no se encontro el post Solicitado.</h3>
           <?php endif; ?>
           <?php wp_reset_query();?>
         </div>
      </div>
   </div>
</div>
<?php get_footer(); ?>
