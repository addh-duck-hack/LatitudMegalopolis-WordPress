<?php
//Banner publicidad Estados
$publicidad3 = getDataFromWhereX2($connection,"publicidad","posicion_publicidad",3,"estatus_publicidad",200);
$tamPub3 = count($publicidad3);
$tamCont3 = $tamPub3 * 190;
$movCont3 = ($tamPub3 - 1) * 190;
$tamContSec3 = 100 / $tamPub3;
$tiempoAnim3 = $tamPub3 * 7;
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
            #sec-estados{
                height: <?php echo $tamCont3; ?>px;
                animation-duration: <?php echo $tiempoAnim3; ?>s;
                animation-name: carousel-publicidad3;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
                animation-direction: normal;
            }
            .pub3{
                height: <?php echo $tamContSec3; ?>%;
                width: 100%;
            }
            .pub3 img{
                height: 100%;
                max-height: 190px;
                width: 100%;
            }
            @media (max-width: 768px) {
                #sec-estados{
                height: <?php echo $tamPub3 * 80; ?>px;
                animation-name: carousel-publicidad3xs;
                }
                .pub3{
                    height: <?php echo $tamContSec3; ?>%;
                    width: 100%;
                }
                .pub3 img{
                    height: 90%;
                    max-height: 80px;
                    width: 97%;
                }
            }
            @keyframes carousel-publicidad3{
                <?php 
                for($i = 0; $i <= $tamPub3; $i++){
                    if($i == 0){
                        $porcTam3 = $i * $tamContSec3;
                        $tamTam3 = $i * 190;
                        echo $porcTam3.'%{margin-top:-'.$tamTam3.'px;}';
                    }else if($i == $tamPub3){
                        $porcTam3 = ($i * $tamContSec3)-1;
                        $tamTam3 = ($i -1) * 190;
                        echo $porcTam3.'%{margin-top:-'.$tamTam3.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam3 = $i * $tamContSec3;
                        $tamTam3 = ($i - 1) * 190;                        
                        $porcTam3a = ($i * $tamContSec3) + 1;
                        $tamTam3a = $i * 190;
                        echo $porcTam3.'%{margin-top:-'.$tamTam3.'px;}';
                        echo $porcTam3a.'%{margin-top:-'.$tamTam3a.'px;}';
                    }
                }
                ?>
            }
            @keyframes carousel-publicidad3xs{
                <?php 
                for($i = 0; $i <= $tamPub3; $i++){
                    if($i == 0){
                        $porcTam3 = $i * $tamContSec3;
                        $tamTam3 = $i * 80;
                        echo $porcTam3.'%{margin-top:-'.$tamTam3.'px;}';
                    }else if($i == $tamPub3){
                        $porcTam3 = ($i * $tamContSec3)-1;
                        $tamTam3 = ($i -1) * 80;
                        echo $porcTam3.'%{margin-top:-'.$tamTam3.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam3 = $i * $tamContSec3;
                        $tamTam3 = ($i - 1) * 80;                        
                        $porcTam3a = ($i * $tamContSec3) + 1;
                        $tamTam3a = $i * 80;
                        echo $porcTam3.'%{margin-top:-'.$tamTam3.'px;}';
                        echo $porcTam3a.'%{margin-top:-'.$tamTam3a.'px;}';
                    }
                }
                ?>
            }
    </style>
    <div class="row margen-top" id="sec-estados">
        <?php
        echo "";
        foreach($publicidad3 as $publicidad){
            echo '<div class="pub3">
                    <a href="'.$publicidad['url_publicidad'].'">
                        <img src="'.$publicidad['img_publicidad'].'">
                    </a>
                </div>';
        } 
        ?>
    </div>
</div>