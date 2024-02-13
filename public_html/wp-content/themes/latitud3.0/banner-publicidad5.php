<?php
//Banner publicidad Tinta Rosa
$publicidad5 = getDataFromWhereX2($connection,"publicidad","posicion_publicidad",5,"estatus_publicidad",200);
$tamPub5 = count($publicidad5);
$tamCont5 = $tamPub5 * 190;
$movCont5 = ($tamPub5 - 1) * 190;
$tamContSec5 = 100 / $tamPub5;
$tiempoAnim5 = $tamPub5 * 7;
?>
<style type="text/css">
    .cont-publicidad-new{
        height: 190px;
        overflow: hidden;
    }
    @media (max-width: 768px) {
        .cont-publicidad-new{
        height: 80px;
        }
    }
</style>
<div class="margen-top cont-publicidad-new">
    <style type="text/css">
            #sec-tinta{
                height: <?php echo $tamCont5; ?>px;
                animation-duration: <?php echo $tiempoAnim5; ?>s;
                animation-name: carousel-publicidad5;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
                animation-direction: normal;
            }
            .pub5{
                height: <?php echo $tamContSec5; ?>%;
                width: 100%;
            }
            .pub5 img{
                height: 100%;
                max-height: 190px;
                width: 100%;
            }
            @media (max-width: 768px) {
                #sec-tinta{
                height: <?php echo $tamPub1 * 80; ?>px;
                animation-name: carousel-publicidad5xs;
                }
                .pub5{
                    height: <?php echo $tamContSec5; ?>%;
                    width: 100%;
                }
                .pub5 img{
                    height: 90%;
                    max-height: 80px;
                    width: 97%;
                }
            }
            @keyframes carousel-publicidad5{
                <?php 
                for($i = 0; $i <= $tamPub5; $i++){
                    if($i == 0){
                        $porcTam5 = $i * $tamContSec5;
                        $tamTam5 = $i * 190;
                        echo $porcTam5.'%{margin-top:-'.$tamTam5.'px;}';
                    }else if($i == $tamPub5){
                        $porcTam5 = ($i * $tamContSec5)-1;
                        $tamTam5 = ($i -1) * 190;
                        echo $porcTam5.'%{margin-top:-'.$tamTam5.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam5 = $i * $tamContSec5;
                        $tamTam5 = ($i - 1) * 190;                        
                        $porcTam5a = ($i * $tamContSec5) + 1;
                        $tamTam5a = $i * 190;
                        echo $porcTam5.'%{margin-top:-'.$tamTam5.'px;}';
                        echo $porcTam5a.'%{margin-top:-'.$tamTam5a.'px;}';
                    }
                }
                ?>
            }
            @keyframes carousel-publicidad5xs{
                <?php 
                for($i = 0; $i <= $tamPub5; $i++){
                    if($i == 0){
                        $porcTam5 = $i * $tamContSec5;
                        $tamTam5 = $i * 80;
                        echo $porcTam5.'%{margin-top:-'.$tamTam5.'px;}';
                    }else if($i == $tamPub5){
                        $porcTam5 = ($i * $tamContSec5)-1;
                        $tamTam5 = ($i -1) * 80;
                        echo $porcTam5.'%{margin-top:-'.$tamTam5.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam5 = $i * $tamContSec5;
                        $tamTam5 = ($i - 1) * 80;                        
                        $porcTam5a = ($i * $tamContSec5) + 1;
                        $tamTam5a = $i * 80;
                        echo $porcTam5.'%{margin-top:-'.$tamTam5.'px;}';
                        echo $porcTam5a.'%{margin-top:-'.$tamTam5a.'px;}';
                    }
                }
                ?>
            }
    </style>
    <div class="row margen-top" id="sec-tinta">
        <?php
        echo "";
        foreach($publicidad5 as $publicidad){
            echo '<div class="pub5">
                    <a href="'.$publicidad['url_publicidad'].'">
                        <img src="'.$publicidad['img_publicidad'].'">
                    </a>
                </div>';
        } 
        ?>
    </div>
</div>