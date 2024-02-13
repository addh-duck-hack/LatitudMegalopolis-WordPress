<?php
//Banner publicidad Megalopolis
$publicidad2 = getDataFromWhereX2($connection,"publicidad","posicion_publicidad",2,"estatus_publicidad",200);
$tamPub2 = count($publicidad2);
$tamCont2 = $tamPub2 * 190;
$movCont2 = ($tamPub2 - 1) * 190;
$tamContSec2 = 100 / $tamPub2;
$tiempoAnim2 = $tamPub2 * 7;
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
            #sec-megalopolis{
                height: <?php echo $tamCont2; ?>px;
                animation-duration: <?php echo $tiempoAnim2; ?>s;
                animation-name: carousel-publicidad2;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
                animation-direction: normal;
            }
            .pub2{
                height: <?php echo $tamContSec2; ?>%;
                width: 100%;
            }
            .pub2 img{
                height: 100%;
                max-height: 190px;
                width: 100%;
            }
            @media (max-width: 768px) {
                #sec-megalopolis{
                height: <?php echo $tamPub2 * 80; ?>px;
                animation-name: carousel-publicidad2xs;
                }
                .pub2{
                    height: <?php echo $tamContSec2; ?>%;
                    width: 100%;
                }
                .pub2 img{
                    height: 90%;
                    max-height: 80px;
                    width: 97%;
                }
            }
            @keyframes carousel-publicidad2{
                <?php 
                for($i = 0; $i <= $tamPub2; $i++){
                    if($i == 0){
                        $porcTam2 = $i * $tamContSec2;
                        $tamTam2 = $i * 190;
                        echo $porcTam2.'%{margin-top:-'.$tamTam2.'px;}';
                    }else if($i == $tamPub2){
                        $porcTam2 = ($i * $tamContSec2)-1;
                        $tamTam2 = ($i -1) * 190;
                        echo $porcTam2.'%{margin-top:-'.$tamTam2.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam2 = $i * $tamContSec2;
                        $tamTam2 = ($i - 1) * 190;                        
                        $porcTam2a = ($i * $tamContSec2) + 1;
                        $tamTam2a = $i * 190;
                        echo $porcTam2.'%{margin-top:-'.$tamTam2.'px;}';
                        echo $porcTam2a.'%{margin-top:-'.$tamTam2a.'px;}';
                    }
                }
                ?>
            }
            @keyframes carousel-publicidad2xs{
                <?php 
                for($i = 0; $i <= $tamPub2; $i++){
                    if($i == 0){
                        $porcTam2 = $i * $tamContSec2;
                        $tamTam2 = $i * 80;
                        echo $porcTam2.'%{margin-top:-'.$tamTam2.'px;}';
                    }else if($i == $tamPub1){
                        $porcTam2 = ($i * $tamContSec2)-1;
                        $tamTam2 = ($i -1) * 80;
                        echo $porcTam2.'%{margin-top:-'.$tamTam2.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam2 = $i * $tamContSec2;
                        $tamTam2 = ($i - 1) * 80;                        
                        $porcTam2a = ($i * $tamContSec2) + 1;
                        $tamTam2a = $i * 80;
                        echo $porcTam2.'%{margin-top:-'.$tamTam2.'px;}';
                        echo $porcTam2a.'%{margin-top:-'.$tamTam2a.'px;}';
                    }
                }
                ?>                
            }
    </style>
    <div class="row margen-top" id="sec-megalopolis">
        <?php
        echo "";
        foreach($publicidad2 as $publicidad){
            echo '<div class="pub2">
                    <a href="'.$publicidad['url_publicidad'].'">
                        <img src="'.$publicidad['img_publicidad'].'">
                    </a>
                </div>';
        } 
        ?>
    </div>
</div>
