<?php require 'banner-publicidad5.php'; ?>
<?php query_posts('category_name=tinta-rosa')?><!--Para elegir categoria en slider-->
<?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 3) : the_post(); ?>
<!--Codigo que se ejecutara cuando encuentre algun post-->
<?php if ($i%2 == 0): ?>
   <div class="row margen-top">
      <div class="col-12 col-md-6 h300 borde-rosa oculto-xs">
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
      <div class="col-12 col-md-6 h300 borde-rosa oculto-lg">
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
      <div class="col-12 col-md-6 h300 borde-rosa oculto-xs">
         <a href="<?php the_permalink();?>">
            <h1 class="text-left"><?php the_title(); ?></h1>
         </a>
         <p class="text-left"><?php $extracto = get_the_content() ;
         $extracto = strip_tags($extracto);
         echo substr($extracto, 0, 150); ?>
         <a href="<?php the_permalink();?>">...leer más.</a></p>
      </div>
      <div class="col-12 col-md-6 h300 borde-rosa oculto-lg">
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
<?php require 'banner-publicidad12.php'; ?>
<div class="row margen-top">
   <div class="col-12">
      <?php require 'carousel-cocina.php'; ?>
   </div>
</div>
<div class="row margen-top">
  <div class="col-12 text-center borde-azul1">
    <h1>LEONA VICARIO "LA VOZ"</h1>
  </div>
</div>
<?php require 'cuentos.php'; ?>
<?php require 'banner-publicidad6.php'; ?>
<div class="row margen-top">
   <div class="col-12">
      <?php require 'carousel-gotas.php'; ?>
   </div>
</div>
<?php require 'banner-publicidad7.php'; ?>
<div class="row justify-content-center">
   <?php query_posts('category_name=reportaje')?><!--Para elegir categoria en slider-->
   <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 7) : the_post(); ?>
   <!--Codigo que se ejecutara cuando encuentre algun post-->
	<?php if ($i % 2 == 0): ?>
	<div class="col-11 col-md-6 h300 margen-top margen-off-left s-reportaje">
         <a href="<?php the_permalink();?>">
           <img class="d-block full-img" src="
          <?php
             if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
               the_post_thumbnail_url('full');
             }
          ?>">
        </a>
      </div>
	<?php else: ?>
		<div class="col-11 col-md-6 h300 margen-top margen-off-right s-reportaje">
         <a href="<?php the_permalink();?>">
           <img class="d-block full-img" src="
          <?php
             if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
               the_post_thumbnail_url('full');
             }
          ?>">
        </a>
      </div>
   <?php endif; ?>
   <?php $i++; endwhile; else: ?>
   <!--Codigo que se ejecutara si no encuentra post-->
   <h1>Error 404 no se encontraron portadas.</h1>
   <?php endif; ?>
   <?php wp_reset_query();?>
</div>
<?php require 'banner-publicidad8.php'; ?>
<div class="row margen-top">
   <div class="col-12">
      <?php query_posts('category_name=Cultura')?><!--Para elegir categoria en slider-->
     <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 2) : the_post(); ?>
     <!--Codigo que se ejecutara cuando encuentre algun post-->
       <a href="<?php the_permalink();?>">
          <img class="d-block w-100" src="
         <?php
            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
              the_post_thumbnail_url('full');
            }
         ?>">
       </a>
     <?php $i++; endwhile; else: ?>
     <!--Codigo que se ejecutara si no encuentra post-->
     <h1>Error 404 no se encontraron portadas.</h1>
     <?php endif; ?>
     <?php wp_reset_query();?>
   </div>
</div>
<?php require 'banner-publicidad9.php'; ?>
<?php query_posts('category_name=entretenimiento')?><!--Para elegir categoria en slider-->
<?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 2) : the_post(); ?>
<!--Codigo que se ejecutara cuando encuentre algun post-->
   <?php if ($i == 1): ?>
      <div class="row margen-top">
         <div class="col-12 col-md-6 h300 borde-azul oculto-xs">
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
         <div class="col-12 col-md-6 h300 borde-azul oculto-lg">
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
   <?php query_posts('category_name=entretenimiento')?><!--Para elegir categoria en slider-->
   <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 8) : the_post(); ?>
   <!--Codigo que se ejecutara cuando encuentre algun post-->
      <?php if ($i == 1): ?>

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
            <div class="h300 borde-azul oculto-xs">
               <a href="<?php the_permalink();?>">
                  <h1 class="text-right"><?php the_title(); ?></h1>
               </a>
               <p class="text-right"><?php $extracto = get_the_content() ;
               $extracto = strip_tags($extracto);
               echo substr($extracto, 0, 150); ?>
               <a href="<?php the_permalink();?>">...leer más.</a></p>
            </div>
            <div class="h300 borde-azul oculto-lg">
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
<?php require 'banner-publicidad10.php'; ?>
<?php query_posts('category_name=deportes2')?><!--Para elegir categoria en slider-->
<?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 2) : the_post(); ?>
<!--Codigo que se ejecutara cuando encuentre algun post-->
   <div class="row">
      <div class="col-12 borde-verde">
         <a href="<?php the_permalink();?>">
            <h1 class="text-center"><?php the_title(); ?></h1>
         </a>
      </div>
      <div class="col-12 oculto-xs">
         <p class="text-center" style="font-size: 25px;"><?php $extracto = get_the_content() ;
         $extracto = strip_tags($extracto);
         echo substr($extracto, 0, 150); ?>
         <a href="<?php the_permalink();?>" style="color: green;">...leer más.</a></p>
      </div>
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
      <div class="col-12 h400 borde-verde oculto-lg">
         <p class="text-justify"><?php $extracto = get_the_content() ;
         $extracto = strip_tags($extracto);
         echo substr($extracto, 0, 150); ?>
         <a href="<?php the_permalink();?>">...leer más.</a></p>
      </div>
   </div>
<?php $i++; endwhile; else: ?>
<!--Codigo que se ejecutara si no encuentra post-->
<h1>Error 404 no se encontraron portadas.</h1>
<?php endif; ?>
<?php wp_reset_query();?>
<?php query_posts('category_name=deportes2')?><!--Para elegir categoria en slider-->
<?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 3) : the_post(); ?>
<!--Codigo que se ejecutara cuando encuentre algun post-->
   <?php if ($i == 2): ?>
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
   <?php query_posts('category_name=deportes2')?><!--Para elegir categoria en slider-->
   <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 7) : the_post(); ?>
   <!--Codigo que se ejecutara cuando encuentre algun post-->
      <?php if ($i < 3): ?>

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
