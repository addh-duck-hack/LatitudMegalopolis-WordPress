<?php
//Se obtienen los datos de la base
$carousel3 = getDataFromWhereX2($connection,"publicidad_taurina","posicion",3,"estatus",200);
?>
<br>
<div id="carousel3" class="carousel slide carousel-fade" data-ride="carousel" style="margin-top:-1em;">
   <ol class="carousel-indicators hidden-xs">
    <?php
        for($i = 0; $i < 5; $i++){
            if($i == 0){
                echo '<li data-target="#carousel3" data-slide-to="'.$i.'" class="active"></li>';
            }else{
                echo '<li data-target="#carousel3" data-slide-to="'.$i.'"></li>';
            }
        }
    ?>
  </ol>
  <div class="carousel-inner">
     <?php
        for($i = 0; $i < 7; $i++){
            if($i == 0){
                echo '<div class="carousel-item active"  style="background: black;">
                    <a href="'.$carousel3[$i]['url'].'">
                    <img class="d-block" src="'.$carousel3[$i]['img'].'" style="height: 39em;margin: auto;">
                    </a>
                </div>';
            }else{
                echo '<div class="carousel-item"  style="background: black;">
                    <a href="'.$carousel3[$i]['url'].'">
                    <img class="d-block" src="'.$carousel3[$i]['img'].'" style="height: 39em;margin: auto;">
                    </a>
                </div>';
            }
        }
    ?>
  </div>
  <a class="carousel-control-prev" href="#carousel3" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel3" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>