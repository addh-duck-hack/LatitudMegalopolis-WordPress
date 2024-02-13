<?php
/*
Template Name: Pagina Directorio
*/
?>
<?php get_header(); ?>
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-8 col-md-6">
            <img src="https://latitudmegalopolis-com.digitalserver.io/wp-content/themes/latitud3.0/resources/logo_transparente.png" alt="" class="full-img">
         </div>
      </div>
      <div class="row">
		 <div class="col-sm-0 col-md-2">
		</div>
         <div class="col-sm-12 col-md-8">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

               <div class="c-directorio">
                  <?php the_content(); ?>
               </div>
            <?php endwhile; else: ?>
               <h3>Error 404 no se encontro el post Solicitado.</h3>
            <?php endif; ?>
            <?php wp_reset_query();?>
         </div>
      </div>
   </div>
<?php get_footer(); ?>
