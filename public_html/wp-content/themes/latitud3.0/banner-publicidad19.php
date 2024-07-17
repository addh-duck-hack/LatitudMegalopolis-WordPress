<?php
//Banner publicidad Deportes
$publicidad19 = getDataFromWhereX2($connection,"publicidad","posicion_publicidad",19,"estatus_publicidad",200);
$tamPub19 = count($publicidad19);
$tamCont19 = $tamPub19 * 190;
$movCont19 = ($tamPub19 - 1) * 190;
$tamContSec19 = 100 / $tamPub19;
$tiempoAnim19 = $tamPub19 * 7;
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
                height: <?php echo $tamCont19; ?>px;
                animation-duration: <?php echo $tiempoAnim19; ?>s;
                animation-name: carousel-publicidad19;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
                animation-direction: normal;
            }
            .pub19{
                height: <?php echo $tamContSec19; ?>%;
                width: 100%;
            }
            .pub19 img{
                height: 100%;
                max-height: 190px;
                width: 100%;
            }
            @media (max-width: 768px) {
                #sec-eduardo{
                height: <?php echo $tamPub19 * 80; ?>px;
                animation-name: carousel-publicidad19xs;
                }
                .pub19{
                    height: <?php echo $tamContSec19; ?>%;
                    width: 100%;
                }
                .pub19 img{
                    height: 90%;
                    max-height: 80px;
                    width: 97%;
                }
            }
            @keyframes carousel-publicidad19{
                <?php 
                for($i = 0; $i <= $tamPub19; $i++){
                    if($i == 0){
                        $porcTam19 = $i * $tamContSec19;
                        $tamTam19 = $i * 190;
                        echo $porcTam19.'%{margin-top:-'.$tamTam19.'px;}';
                    }else if($i == $tamPub19){
                        $porcTam19 = ($i * $tamContSec19)-1;
                        $tamTam19 = ($i -1) * 190;
                        echo $porcTam19.'%{margin-top:-'.$tamTam19.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam19 = $i * $tamContSec19;
                        $tamTam19 = ($i - 1) * 190;                        
                        $porcTam19a = ($i * $tamContSec19) + 1;
                        $tamTam19a = $i * 190;
                        echo $porcTam19.'%{margin-top:-'.$tamTam19.'px;}';
                        echo $porcTam19a.'%{margin-top:-'.$tamTam19a.'px;}';
                    }
                }
                ?>
            }
            @keyframes carousel-publicidad19xs{
                <?php 
                for($i = 0; $i <= $tamPub19; $i++){
                    if($i == 0){
                        $porcTam19 = $i * $tamContSec19;
                        $tamTam19 = $i * 80;
                        echo $porcTam19.'%{margin-top:-'.$tamTam19.'px;}';
                    }else if($i == $tamPub19){
                        $porcTam19 = ($i * $tamContSec19)-1;
                        $tamTam19 = ($i -1) * 80;
                        echo $porcTam19.'%{margin-top:-'.$tamTam19.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam19 = $i * $tamContSec19;
                        $tamTam19 = ($i - 1) * 80;                        
                        $porcTam19a = ($i * $tamContSec19) + 1;
                        $tamTam19a = $i * 80;
                        echo $porcTam19.'%{margin-top:-'.$tamTam19.'px;}';
                        echo $porcTam19a.'%{margin-top:-'.$tamTam19a.'px;}';
                    }
                }
                ?>
            }
    </style>
    <div class="row margen-top" id="sec-eduardo">
        <?php
        echo "";
        foreach($publicidad19 as $publicidad){
            echo '<div class="pub19">
                    <a href="'.$publicidad['url_publicidad'].'">
                        <img src="'.$publicidad['img_publicidad'].'">
                    </a>
                </div>';
        } 
        ?>
    </div>
</div>