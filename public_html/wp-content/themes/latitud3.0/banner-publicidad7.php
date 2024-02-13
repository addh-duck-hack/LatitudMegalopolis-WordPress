<?php
//Banner publicidad Reportajes
$publicidad7 = getDataFromWhereX2($connection,"publicidad","posicion_publicidad",7,"estatus_publicidad",200);
$tamPub7 = count($publicidad7);
$tamCont7 = $tamPub7 * 190;
$movCont7 = ($tamPub7 - 1) * 190;
$tamContSec7 = 100 / $tamPub7;
$tiempoAnim7 = $tamPub7 * 7;
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
            #sec-reportajes{
                height: <?php echo $tamCont7; ?>px;
                animation-duration: <?php echo $tiempoAnim7; ?>s;
                animation-name: carousel-publicidad7;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
                animation-direction: normal;
            }
            .pub7{
                height: <?php echo $tamContSec7; ?>%;
                width: 100%;
            }
            .pub7 img{
                height: 100%;
                max-height: 190px;
                width: 100%;
            }
            @media (max-width: 768px) {
                #sec-reportajes{
                height: <?php echo $tamPub7 * 80; ?>px;
                animation-name: carousel-publicidad7xs;
                }
                .pub7{
                    height: <?php echo $tamContSec7; ?>%;
                    width: 100%;
                }
                .pub7 img{
                    height: 90%;
                    max-height: 80px;
                    width: 97%;
                }
            }
            @keyframes carousel-publicidad7{
                <?php 
                for($i = 0; $i <= $tamPub7; $i++){
                    if($i == 0){
                        $porcTam7 = $i * $tamContSec7;
                        $tamTam7 = $i * 190;
                        echo $porcTam7.'%{margin-top:-'.$tamTam7.'px;}';
                    }else if($i == $tamPub7){
                        $porcTam7 = ($i * $tamContSec7)-1;
                        $tamTam7 = ($i -1) * 190;
                        echo $porcTam7.'%{margin-top:-'.$tamTam7.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam7 = $i * $tamContSec7;
                        $tamTam7 = ($i - 1) * 190;                        
                        $porcTam7a = ($i * $tamContSec7) + 1;
                        $tamTam7a = $i * 190;
                        echo $porcTam7.'%{margin-top:-'.$tamTam7.'px;}';
                        echo $porcTam7a.'%{margin-top:-'.$tamTam7a.'px;}';
                    }
                }
                ?>
            }
            @keyframes carousel-publicidad7xs{
                <?php 
                for($i = 0; $i <= $tamPub7; $i++){
                    if($i == 0){
                        $porcTam7 = $i * $tamContSec7;
                        $tamTam7 = $i * 80;
                        echo $porcTam7.'%{margin-top:-'.$tamTam7.'px;}';
                    }else if($i == $tamPub7){
                        $porcTam7 = ($i * $tamContSec7)-1;
                        $tamTam7 = ($i -1) * 80;
                        echo $porcTam7.'%{margin-top:-'.$tamTam7.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam7 = $i * $tamContSec7;
                        $tamTam7 = ($i - 1) * 80;                        
                        $porcTam7a = ($i * $tamContSec7) + 1;
                        $tamTam7a = $i * 80;
                        echo $porcTam7.'%{margin-top:-'.$tamTam7.'px;}';
                        echo $porcTam7a.'%{margin-top:-'.$tamTam7a.'px;}';
                    }
                }
                ?>
            }
    </style>
    <div class="row margen-top" id="sec-reportajes">
        <?php
        echo "";
        foreach($publicidad7 as $publicidad){
            echo '<div class="pub7">
                    <a href="'.$publicidad['url_publicidad'].'">
                        <img src="'.$publicidad['img_publicidad'].'">
                    </a>
                </div>';
        } 
        ?>
    </div>
</div>