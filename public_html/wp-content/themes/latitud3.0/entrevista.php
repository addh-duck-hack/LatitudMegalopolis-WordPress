<div class="row justify-content-md-center entrevista">
  <div class="col-12 col-lg-10">
    <div id="carouselEntrevista" class="carousel slide carousel-fade" data-ride="carousel">
       <ol class="carousel-indicators hidden-xs">
          <?php query_posts('category_name=entrevista')?><!--Para elegir categoria en slider-->
          <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 10) : the_post(); ?>
             <!--Codigo que se ejecutara cuando encuentre algun post-->
             <li data-target="#carouselEntrevista" data-slide-to="<?php echo ($i-1); ?>"<?php if (($i-1) == 0): ?>
                class="active"
             <?php endif; ?>></li>
          <?php $i++; endwhile; endif; ?>
          <?php wp_reset_query();?>
      </ol>
      <div class="carousel-inner">
         <?php query_posts('category_name=entrevista')?><!--Para elegir categoria en slider-->
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
      <a class="carousel-control-prev" href="#carouselEntrevista" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselEntrevista" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>
