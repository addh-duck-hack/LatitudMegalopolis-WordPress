<?php
   $arrayNegocios = getDataFromWhere($connection,"pagina_publicidad","position",1);
?>
<div id="carouselNegocios" class="carousel slide carousel-fade" data-ride="carousel">
   <ol class="carousel-indicators hidden-xs">
      <?php
         for($i = 1; $i <= count($arrayNegocios); $i++){
            if (($i-1) == 0){
               echo '<li data-target="#carouselNegocios" data-slide-to="';
               echo ($i - 1);
               echo '" class="active"></li>';
            }else{
               echo '<li data-target="#carouselNegocios" data-slide-to="';
               echo ($i - 1);
               echo '"></li>';
            }
         }
      ?>
  </ol>
  <div class="carousel-inner">
      <?php
         for($i = 0; $i < count($arrayNegocios); $i++){
            if ($i == 0){
               echo '<div class="carousel-item active">';
               echo '<a href="https://latitudmegalopolis.com/red-negocios?publicidadID='.$arrayNegocios[$i]['id'].'">';
               echo '<img class="d-block w-100" src="'.$arrayNegocios[$i]['picture'].'">';
               echo '</a></div>';
            }else{
               echo '<div class="carousel-item">';
               echo '<a href="https://latitudmegalopolis.com/red-negocios?publicidadID='.$arrayNegocios[$i]['id'].'">';
               echo '<img class="d-block w-100" src="'.$arrayNegocios[$i]['picture'].'">';
               echo '</a></div>';
            }
         }
      ?>
  </div>
  <a class="carousel-control-prev" href="#carouselNegocios" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselNegocios" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>