<?php
//Banner publicidad Cocina
$publicidad12 = getDataFromWhereX2($connection,"publicidad","posicion_publicidad",12,"estatus_publicidad",200);
$tamPub12 = count($publicidad12);
$tamCont12 = $tamPub12 * 190;
$movCont12 = ($tamPub12 - 1) * 190;
$tamContSec12 = 100 / $tamPub12;
$tiempoAnim12 = $tamPub12 * 7;
?>
<style type="text/css">
    .cont-publicidad-cocina{
        height: 190px;
        overflow: hidden;
    }
    @media (max-width: 768px) {
        .cont-publicidad-cocina{
        height: 80px;
        }
    }
</style>
<div class="margen-top cont-publicidad-cocina">
    <style type="text/css">
            #sec-cocina{
                height: <?php echo $tamCont12; ?>px;
                animation-duration: <?php echo $tiempoAnim12; ?>s;
                animation-name: carousel-publicidad12;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
                animation-direction: normal;
            }
            .pub12{
                height: <?php echo $tamContSec12; ?>%;
                width: 100%;
            }
            .pub12 img{
                height: 100%;
                max-height: 190px;
                width: 100%;
            }
            @media (max-width: 768px) {
                #sec-cocina{
                height: <?php echo $tamPub12 * 80; ?>px;
                animation-name: carousel-publicidad12xs;
                }
                .pub12{
                    height: <?php echo $tamContSec12; ?>%;
                    width: 100%;
                }
                .pub12 img{
                    height: 90%;
                    max-height: 80px;
                    width: 97%;
                }
            }
            @keyframes carousel-publicidad12{
                <?php 
                for($i = 0; $i <= $tamPub12; $i++){
                    if($i == 0){
                        $porcTam12 = $i * $tamContSec12;
                        $tamTam12 = $i * 190;
                        echo $porcTam12.'%{margin-top:-'.$tamTam12.'px;}';
                    }else if($i == $tamPub12){
                        $porcTam12 = ($i * $tamContSec12)-1;
                        $tamTam12 = ($i -1) * 190;
                        echo $porcTam12.'%{margin-top:-'.$tamTam12.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam12 = $i * $tamContSec12;
                        $tamTam12 = ($i - 1) * 190;                        
                        $porcTam12a = ($i * $tamContSec12) + 1;
                        $tamTam12a = $i * 190;
                        echo $porcTam12.'%{margin-top:-'.$tamTam12.'px;}';
                        echo $porcTam12a.'%{margin-top:-'.$tamTam12a.'px;}';
                    }
                }
                ?>
            }
            @keyframes carousel-publicidad12xs{
                <?php 
                for($i = 0; $i <= $tamPub12; $i++){
                    if($i == 0){
                        $porcTam12 = $i * $tamContSec12;
                        $tamTam12 = $i * 80;
                        echo $porcTam12.'%{margin-top:-'.$tamTam12.'px;}';
                    }else if($i == $tamPub12){
                        $porcTam12 = ($i * $tamContSec12)-1;
                        $tamTam12 = ($i -1) * 80;
                        echo $porcTam12.'%{margin-top:-'.$tamTam12.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam12 = $i * $tamContSec12;
                        $tamTam12 = ($i - 1) * 80;                        
                        $porcTam12a = ($i * $tamContSec12) + 1;
                        $tamTam12a = $i * 80;
                        echo $porcTam12.'%{margin-top:-'.$tamTam12.'px;}';
                        echo $porcTam12a.'%{margin-top:-'.$tamTam12a.'px;}';
                    }
                }
                ?>
            }
    </style>
    <div class="row margen-top" id="sec-cocina">
        <?php
        echo "";
        foreach($publicidad12 as $publicidad){
            echo '<div class="pub12">
                    <a href="'.$publicidad['url_publicidad'].'">
                        <img src="'.$publicidad['img_publicidad'].'">
                    </a>
                </div>';
        } 
        ?>
    </div>
</div>