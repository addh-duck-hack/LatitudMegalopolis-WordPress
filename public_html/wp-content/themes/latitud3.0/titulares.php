<?php
      $vVisitantes = selectLastFrom($connection,"visitas","id");
      $vVisitantes = $vVisitantes[0]["visita"];
      $vVisitantes = number_format($vVisitantes, 0, ".","," );
   ?>
<div class="row margen-top">
	<div class="col-12 col-lg-3 marco contador cont2">
      <h3>Nuestros lectores</h3>
      <ul><li><?php echo $vVisitantes; ?></li></ul>
		<!--<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar ( 'SidebarContador' ) ) : endif; ?> -->
	</div>
	<div class="col-12 col-lg-8 clima">
		<div class="row">
			<div class="col-4 col-sm-2 clima-item">
				<h5>CDMX</h5>
							<!-- www.tutiempo.net - Ancho:96px - Alto:24px -->
				<div id="TT_JeZwLhdhdSKc4BKKLAzjzzjDD7aK1pQ2btkdkZCoq1z"></div>
				<script type="text/javascript" src="https://www.tutiempo.net/s-widget/l_JeZwLhdhdSKc4BKKLAzjzzjDD7aK1pQ2btkdkZCoq1z"></script>
			</div>
			<div class="col-4 col-sm-2 clima-item">
				<h5>México</h5>
							<!-- www.tutiempo.net - Ancho:96px - Alto:24px -->
				<div id="TT_FW1wbhYBt8aBzBKUMAuDzjDzzvuULz82LtkYEsCIq1D"></div>
				<script type="text/javascript" src="https://www.tutiempo.net/s-widget/l_FW1wbhYBt8aBzBKUMAuDzjDzzvuULz82LtkYEsCIq1D"></script>
			</div>
			<div class="col-4 col-sm-2 clima-item">
				<h5>Hidalgo</h5>
							<!-- www.tutiempo.net - Ancho:96px - Alto:24px -->
				<div id="TT_Je1gLBdBdWacYBjULfujzjjzz7aUMz8FLtEY1Zy5KEj"></div>
				<script type="text/javascript" src="https://www.tutiempo.net/s-widget/l_Je1gLBdBdWacYBjULfujzjjzz7aUMz8FLtEY1Zy5KEj"></script>
			</div>
			<div class="col-3 col-sm-2 clima-item clima-item-5">
				<h5>Morelos</h5>
							<!-- www.tutiempo.net - Ancho:96px - Alto:24px -->
				<div id="TT_yW1AbhdBYc89YBjUMfujzDjjz7uUMzaFLt1dEZy5q1z"></div>
				<script type="text/javascript" src="https://www.tutiempo.net/s-widget/l_yW1AbhdBYc89YBjUMfujzDjjz7uUMzaFLt1dEZy5q1z"></script>
			</div>
			<div class="col-2 clima-item clima-item-5">
				<h5>Puebla</h5>
							<!-- www.tutiempo.net - Ancho:96px - Alto:24px -->
				<div id="TT_Ju1ArxYxtczBUBjULAujzzzzD7lUT8W2btEd1cCIa1z"></div>
				<script type="text/javascript" src="https://www.tutiempo.net/s-widget/l_Ju1ArxYxtczBUBjULAujzzzzD7lUT8W2btEd1cCIa1z"></script>
			</div>
			<div class="col-2 clima-item clima-item-6">
				<h5>Tlaxcala</h5>
							<!-- www.tutiempo.net - Ancho:96px - Alto:24px -->
				<div id="TT_FuZArBYhYKpapBjKMfzjjDDzjvaKTpn2rt1Y1sCoakj"></div>
				<script type="text/javascript" src="https://www.tutiempo.net/s-widget/l_FuZArBYhYKpapBjKMfzjjDDzjvaKTpn2rt1Y1sCoakj"></script>
			</div>
		</div>
	</div>
</div>

<?php query_posts('category_name=titulares')?><!--Para elegir categoria en slider-->
<?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 17) : the_post(); ?>
<!--Codigo que se ejecutara cuando encuentre algun post-->
<?php if ($i%2 == 0): ?>
   <div class="row margen-top">
      <div class="col-12 col-md-6 h300 borde-rojo oculto-xs">
         <a href="<?php the_permalink();?>">
            <h2 class="text-right"><?php the_title(); ?></h2>
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
      <div class="col-12 col-md-6 h300 borde-rojo oculto-lg">
         <a href="<?php the_permalink();?>">
            <h2 class="text-center"><?php the_title(); ?></h2>
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
      <div class="col-12 col-md-6 h300 borde-rojo oculto-xs">
         <a href="<?php the_permalink();?>">
            <h2 class="text-left"><?php the_title(); ?></h2>
         </a>
         <p class="text-left"><?php $extracto = get_the_content() ;
         $extracto = strip_tags($extracto);
         echo substr($extracto, 0, 150); ?>
         <a href="<?php the_permalink();?>">...leer más.</a></p>
      </div>
      <div class="col-12 col-md-6 h300 borde-rojo oculto-lg">
         <a href="<?php the_permalink();?>">
            <h2 class="text-center"><?php the_title(); ?></h2>
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
