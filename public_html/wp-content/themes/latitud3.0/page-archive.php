<?php
/*
Template Name: Archivos
*/
?>
<?php get_header(); ?>
<div class="container">
   <div class="row justify-content-center borde-rojo">
      <div class="col-10 col-md-5 text-center">
         <h1>Archivo historico</h1>
      </div>
   </div>
   <div class="row justify-content-center borde-rojo">
      <div class="col-12 col-md-10">
         <h3>Archivo por Mes:</h3>
         <ul>
         <?php wp_get_archives('type=monthly'); ?>
         </ul>
         <h3>Archivo por Categoría:</h3>
         <ul>
         <?php wp_list_cats(); ?>
         </ul>
         <h3>Archivo por usuario:</h3>
         <ul>
         <?php wp_list_authors( 'optioncount=1' ); ?>
         </ul>
         <h3>Etiquetas:</h3>
         <?php wp_tag_cloud(); ?>
      </div>
   </div>
</div>
<?php get_footer(); ?>
