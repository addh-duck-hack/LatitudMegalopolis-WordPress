<?php get_header(); ?>
   <div class="container">
      <div class="row borde-rojo">
         <div class="col-12">
            <h1 class="contenido-titulo text-center">Fecha: <?php the_time('j \d\e F \d\e Y'); ?></h1>
         </div>
      </div>
      <?php if ( have_posts() ) : ?>
         <?php while ( have_posts() ) : the_post(); ?>
            <div class="row borde-rojo margen-top">
               <div class="col-12 col-md-4 col-lg-3">
                  <a href="<?php the_permalink(); ?>">
                    <img class="d-block full-img" src="
                    <?php
                       if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                         the_post_thumbnail_url('full');
                       }
                    ?>" style="height: auto;">
                  </a>
               </div>
               <div class="col-12 col-md-8 col-lg-9">
                  <h1 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <h3>Escrito por: <?php the_author_posts_link() ?></h3>
                  <h4>Publicado: <?php the_time('l, j \d\e F \d\e\l Y \a \l\a\s g\:i A');?></h4>
                  <h5>Categoria(s): <?php the_category(' \ ');?></h5>
                  <h5><?php the_tags('Etiqueta(s): ',' / ');?></h5>
                  <p class="text-justify"><?php $extracto = get_the_content() ;
                  $extracto = strip_tags($extracto);
                  echo substr($extracto, 0, 150); ?>
                  <a href="<?php the_permalink();?>">...leer más.</a></p>
               </div>
            </div>
          <?php wp_reset_query();?>
          <?php endwhile; ?>
          <div class="pagination">
            <span class="in-left"><?php next_posts_link('« Anterior'); ?></span>
            <span class="in-right"><?php previous_posts_link('Siguiente »'); ?></span>
          </div>
      <?php else : ?>
          <p><?php _e('Ups!, no hay entradas para la categoria seleccionada.'); ?></p>
      <?php endif; ?>
      <?php wp_reset_query();?>
   </div>
<?php get_footer(); ?>
