<div class="row margen-top">
   <div class="col-12">
      <div class="marco">
         <div class="row pleca">
            <div class="col-12 col-md-8 principal">
               <div id="videoPrincipal">
                 <?php query_posts('category_name=VideosEntretenimiento')?><!--Para elegir categoria en slider-->
                   <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 2) : the_post(); ?>
                   <!--Codigo que se ejecutara cuando encuentre algun post-->
                   <?php the_content()?>
                   <?php $i++; endwhile; else: ?>
                   <!--Codigo que se ejecutara si no encuentra post-->
                   <h1>Error 404 no se encontro video principal.</h1>
                   <?php endif; ?>
                 <?php wp_reset_query();?>
              </div>
            </div>
            <div class="col-12 col-md-4 secundario">
               <div class="contSecundario">
                 <?php query_posts('category_name=VideosEntretenimiento&posts_per_page=999')?><!--Para elegir categoria en slider-->
                   <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 9) : the_post(); ?>
                   <!--Codigo que se ejecutara cuando encuentre algun post-->
                      <div class="row rowEntretenimiento align-items-center" id="video-<?php echo get_the_ID(); ?>">
                         <div class="col-6">
                            <img class="full-img" src="
                            <?php
                               if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                                 the_post_thumbnail_url('full');
                               }
                            ?>">
                         </div>
                         <div class="col-6">
                           <h5><?php the_title()?></h5>
                         </div>
                         <textarea id="contenido-<?php echo get_the_ID(); ?>" style="display:none;"><?php the_content(); ?></textarea>
                      </div>
                      <?php
                      $id = get_the_ID();

                      echo '<script type="text/javascript">$(document).ready(function(){
                        $("#video-'.$id.'").click(function(){
                           $("#video-'.$id.'").toggle(500,"swing");
                           $("#videoPrincipal").html($("#contenido-'.$id.'").val());
                        });
                      });</script>'

                       ?>
                   <?php $i++; endwhile; else: ?>
                   <!--Codigo que se ejecutara si no encuentra post-->
                   <h1>Error 404 no se encontraron videos.</h1>
                   <?php endif; ?>
                 <?php wp_reset_query();?>
              </div>
            </div>
         </div>
      </div>
   </div>
</div>
