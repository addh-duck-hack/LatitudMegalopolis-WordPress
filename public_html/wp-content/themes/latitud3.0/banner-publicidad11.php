<?php
//Banner publicidad Deportes
$publicidad11 = getDataFromWhereX2($connection,"publicidad","posicion_publicidad",11,"estatus_publicidad",200);
$tamPub11 = count($publicidad11);
$tamCont11 = $tamPub11 * 190;
$movCont11 = ($tamPub11 - 1) * 190;
$tamContSec11 = 100 / $tamPub11;
$tiempoAnim11 = $tamPub11 * 7;
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
            #sec-eduardo{
                height: <?php echo $tamCont11; ?>px;
                animation-duration: <?php echo $tiempoAnim11; ?>s;
                animation-name: carousel-publicidad11;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
                animation-direction: normal;
            }
            .pub11{
                height: <?php echo $tamContSec11; ?>%;
                width: 100%;
            }
            .pub11 img{
                height: 100%;
                max-height: 190px;
                width: 100%;
            }
            @media (max-width: 768px) {
                #sec-eduardo{
                height: <?php echo $tamPub11 * 80; ?>px;
                animation-name: carousel-publicidad11xs;
                }
                .pub11{
                    height: <?php echo $tamContSec11; ?>%;
                    width: 100%;
                }
                .pub11 img{
                    height: 90%;
                    max-height: 80px;
                    width: 97%;
                }
            }
            @keyframes carousel-publicidad11{
                <?php 
                for($i = 0; $i <= $tamPub11; $i++){
                    if($i == 0){
                        $porcTam11 = $i * $tamContSec11;
                        $tamTam11 = $i * 190;
                        echo $porcTam11.'%{margin-top:-'.$tamTam11.'px;}';
                    }else if($i == $tamPub11){
                        $porcTam11 = ($i * $tamContSec11)-1;
                        $tamTam11 = ($i -1) * 190;
                        echo $porcTam11.'%{margin-top:-'.$tamTam11.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam11 = $i * $tamContSec11;
                        $tamTam11 = ($i - 1) * 190;                        
                        $porcTam11a = ($i * $tamContSec11) + 1;
                        $tamTam11a = $i * 190;
                        echo $porcTam11.'%{margin-top:-'.$tamTam11.'px;}';
                        echo $porcTam11a.'%{margin-top:-'.$tamTam11a.'px;}';
                    }
                }
                ?>
            }
            @keyframes carousel-publicidad11xs{
                <?php 
                for($i = 0; $i <= $tamPub11; $i++){
                    if($i == 0){
                        $porcTam11 = $i * $tamContSec11;
                        $tamTam11 = $i * 80;
                        echo $porcTam11.'%{margin-top:-'.$tamTam11.'px;}';
                    }else if($i == $tamPub11){
                        $porcTam11 = ($i * $tamContSec11)-1;
                        $tamTam11 = ($i -1) * 80;
                        echo $porcTam11.'%{margin-top:-'.$tamTam11.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam11 = $i * $tamContSec11;
                        $tamTam11 = ($i - 1) * 80;                        
                        $porcTam11a = ($i * $tamContSec11) + 1;
                        $tamTam11a = $i * 80;
                        echo $porcTam11.'%{margin-top:-'.$tamTam11.'px;}';
                        echo $porcTam11a.'%{margin-top:-'.$tamTam11a.'px;}';
                    }
                }
                ?>
            }
    </style>
    <div class="row margen-top" id="sec-eduardo">
        <?php
        echo "";
        foreach($publicidad11 as $publicidad){
            echo '<div class="pub11">
                    <a href="'.$publicidad['url_publicidad'].'">
                        <img src="'.$publicidad['img_publicidad'].'">
                    </a>
                </div>';
        } 
        ?>
    </div>
</div>