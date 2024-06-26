<?php //Formamos los querys para los columnistas
//Columnista 1
$colum1 = selectLastFromWhere($connection,"columnistas","id_columnista","posicion_columnista",1);
$query1 = "category_name=Columnistas&author_name=".$colum1[0]["nombre_columnista"];
$img1 = $colum1[0]["foto_columnista"];
//Columnista 2
$colum2 = selectLastFromWhere($connection,"columnistas","id_columnista","posicion_columnista",2);
$query2 = "category_name=Columnistas&author_name=".$colum2[0]["nombre_columnista"];
$img2 = $colum2[0]["foto_columnista"];
//Columnista 3
$colum3 = selectLastFromWhere($connection,"columnistas","id_columnista","posicion_columnista",3);
$query3 = "category_name=Columnistas&author_name=".$colum3[0]["nombre_columnista"];
$img3 = $colum3[0]["foto_columnista"];
//Columnista 4
$colum4 = selectLastFromWhere($connection,"columnistas","id_columnista","posicion_columnista",4);
$query4 = "category_name=Columnistas&author_name=".$colum4[0]["nombre_columnista"];
$img4 = $colum4[0]["foto_columnista"];
//Columnista 5
$colum5 = selectLastFromWhere($connection,"columnistas","id_columnista","posicion_columnista",5);
$query5 = "category_name=Columnistas&author_name=".$colum5[0]["nombre_columnista"];
$img5 = $colum5[0]["foto_columnista"];
//Columnista 6
$colum6 = selectLastFromWhere($connection,"columnistas","id_columnista","posicion_columnista",6);
$query6 = "category_name=Columnistas&author_name=".$colum6[0]["nombre_columnista"];
$img6 = $colum6[0]["foto_columnista"];
?>

<div class="col-12 text-center" style="height: auto;">
	<img class="full-img" src="https://latitudmegalopolis.com/wp-content/uploads/2024/06/WhatsApp-Image-2024-06-19-at-3.40.56-PM.jpeg">
</div>
<div class="col-4 col-md-2 columnista">
  <?php query_posts($query1)?>
  <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 2 ) : the_post(); ?>
    <!--Codigo que se ejecutara cuando encuentre algun post-->
    <a href="<?php the_permalink();?>">
      <img class="full-img" src="<?php echo $img1;?>">
    </a>
    <?php $i++; endwhile; else: ?>
   <!--Codigo que se ejecutara si no encuentra post-->
   <h1>Error 404 no se encontro entradas para Hector Moctezuma.</h1>
   <?php endif; ?>
   <?php wp_reset_query();?>
</div>
<div class="col-4 col-md-2 columnista">
   <?php query_posts($query2)?>
   <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 2 ) : the_post(); ?>
   <!--Codigo que se ejecutara cuando encuentre algun post-->
   <a href="<?php the_permalink();?>">
     <img class="full-img" src="<?php echo $img2;?>">
   </a>
   <?php $i++; endwhile; else: ?>
   <!--Codigo que se ejecutara si no encuentra post-->
   <h1>Error 404 no se encontro entradas para Hector Moctezuma.</h1>
   <?php endif; ?>
   <?php wp_reset_query();?>
</div>
<div class="col-4 col-md-2 columnista">
   <?php query_posts($query3)?>
   <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 2 ) : the_post(); ?>
   <!--Codigo que se ejecutara cuando encuentre algun post-->
   <a href="<?php the_permalink();?>">
      <img class="full-img" src="<?php echo $img3;?>">
   </a>
   <?php $i++; endwhile; else: ?>
   <!--Codigo que se ejecutara si no encuentra post-->
   <h1>Error 404 no se encontro entradas para Hector Moctezuma.</h1>
   <?php endif; ?>
   <?php wp_reset_query();?>
</div>
<div class="col-4 col-md-2 columnista">
   <?php query_posts($query4)?>
   <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 2 ) : the_post(); ?>
   <!--Codigo que se ejecutara cuando encuentre algun post-->
   <a href="<?php the_permalink();?>">
      <img class="full-img" src="<?php echo $img4;?>">
   </a>
   <?php $i++; endwhile; else: ?>
   <!--Codigo que se ejecutara si no encuentra post-->
   <h1>Error 404 no se encontro entradas para Hector Moctezuma.</h1>
   <?php endif; ?>
   <?php wp_reset_query();?>
</div>
<div class="col-4 col-md-2 columnista">
   <?php query_posts($query5)?>
   <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 2 ) : the_post(); ?>
   <!--Codigo que se ejecutara cuando encuentre algun post-->
   <a href="<?php the_permalink();?>">
      <img class="full-img" src="<?php echo $img5;?>">
   </a>
   <?php $i++; endwhile; else: ?>
   <!--Codigo que se ejecutara si no encuentra post-->
   <h1>Error 404 no se encontro entradas para Hector Moctezuma.</h1>
   <?php endif; ?>
   <?php wp_reset_query();?>
</div>
<div class="col-4 col-md-2 columnista">
   <?php query_posts($query6)?>
   <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 2 ) : the_post(); ?>
   <!--Codigo que se ejecutara cuando encuentre algun post-->
   <a href="<?php the_permalink();?>">
      <img class="full-img" src="<?php echo $img6;?>">
   </a>
   <?php $i++; endwhile; else: ?>
   <!--Codigo que se ejecutara si no encuentra post-->
   <h1>Error 404 no se encontro entradas para Hector Moctezuma.</h1>
   <?php endif; ?>
   <?php wp_reset_query();?>
</div>