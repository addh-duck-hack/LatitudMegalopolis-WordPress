<?php
//Se obtienen los datos de la base
$carousel2 = getDataFromWhereX2($connection,"publicidad_taurina","posicion",2,"estatus",200);
echo '<!--'.$carousel2.'-->';
?>
<br>
<div id="carousel2" class="carousel slide carousel-fade" data-ride="carousel">
   <ol class="carousel-indicators hidden-xs">
      <?php query_posts('category_name=deportes')?><!--Para elegir categoria en slider-->
      <?php $i = 0; if ( have_posts() ) : while ( have_posts() && $i < 10) : the_post(); ?>
         <!--Codigo que se ejecutara cuando encuentre algun post-->
         <li data-target="#carousel2" data-slide-to="<?php echo ($i); ?>"<?php if (($i) == 0): ?>
            class="active"
         <?php endif; ?>></li>
      <?php $i++; endwhile; endif; ?>
      <?php wp_reset_query();?>
  </ol>
  <div class="carousel-inner">
    <?php
        for($i = 0; $i < 10; $i++){
            if($i == 0){
                echo '<div class="carousel-item active"  style="background: black;">
                    <a href="'.$carousel2[$i]['url'].'">
                    <img class="d-block" src="'.$carousel2[$i]['img'].'" style="height: 39em;margin: auto;">
                    </a>
                </div>';
            }else{
                echo '<div class="carousel-item"  style="background: black;">
                    <a href="'.$carousel2[$i]['url'].'">
                    <img class="d-block" src="'.$carousel2[$i]['img'].'" style="height: 39em;margin: auto;">
                    </a>
                </div>';
            }
        }
    ?>
    
  </div>
  <a class="carousel-control-prev" href="#carousel2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>