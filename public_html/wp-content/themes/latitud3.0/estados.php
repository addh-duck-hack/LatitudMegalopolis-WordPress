<?php query_posts('category_name=estados')?><!--Para elegir categoria en slider-->
<?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 7) : the_post(); ?>
<!--Codigo que se ejecutara cuando encuentre algun post-->
<?php if ($i%2 == 0): ?>
   <div class="row margen-top">
      <div class="col-12 col-md-6 h300 borde-naranja oculto-xs">
         <a href="<?php the_permalink();?>">
            <h1 class="text-right"><?php the_title(); ?></h1>
         </a>
         <p class="text-right"><?php $extracto = get_the_content() ;
         $extracto = strip_tags($extracto);
         echo substr($extracto, 0, 150); ?>
         <a href="<?php the_permalink();?>">...leer más.</a></p>
      </div>
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
      <div class="col-12 col-md-6 h300 borde-naranja oculto-lg">
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
      <div class="col-12 col-md-6 h300 borde-naranja oculto-xs">
         <a href="<?php the_permalink();?>">
            <h1 class="text-left"><?php the_title(); ?></h1>
         </a>
         <p class="text-left"><?php $extracto = get_the_content() ;
         $extracto = strip_tags($extracto);
         echo substr($extracto, 0, 150); ?>
         <a href="<?php the_permalink();?>">...leer más.</a></p>
      </div>
      <div class="col-12 col-md-6 h300 borde-naranja oculto-lg">
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
