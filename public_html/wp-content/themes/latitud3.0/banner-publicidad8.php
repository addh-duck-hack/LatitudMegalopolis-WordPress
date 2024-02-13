<?php
//Banner publicidad Cultura
$publicidad8 = getDataFromWhereX2($connection,"publicidad","posicion_publicidad",8,"estatus_publicidad",200);
$tamPub8 = count($publicidad8);
$tamCont8 = $tamPub8 * 190;
$movCont8 = ($tamPub8 - 1) * 190;
$tamContSec8 = 100 / $tamPub8;
$tiempoAnim8 = $tamPub8 * 7;
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
            #sec-cultura{
                height: <?php echo $tamCont8; ?>px;
                animation-duration: <?php echo $tiempoAnim8; ?>s;
                animation-name: carousel-publicidad8;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
                animation-direction: normal;
            }
            .pub8{
                height: <?php echo $tamContSec8; ?>%;
                width: 100%;
            }
            .pub8 img{
                height: 100%;
                max-height: 190px;
                width: 100%;
            }
            @media (max-width: 768px) {
                #sec-cultura{
                height: <?php echo $tamPub1 * 80; ?>px;
                animation-name: carousel-publicidad8xs;
                }
                .pub8{
                    height: <?php echo $tamContSec8; ?>%;
                    width: 100%;
                }
                .pub8 img{
                    height: 90%;
                    max-height: 80px;
                    width: 97%;
                }
            }
            @keyframes carousel-publicidad8{
                <?php 
                for($i = 0; $i <= $tamPub8; $i++){
                    if($i == 0){
                        $porcTam8 = $i * $tamContSec8;
                        $tamTam8 = $i * 190;
                        echo $porcTam8.'%{margin-top:-'.$tamTam8.'px;}';
                    }else if($i == $tamPub8){
                        $porcTam8 = ($i * $tamContSec8)-1;
                        $tamTam8 = ($i -1) * 190;
                        echo $porcTam8.'%{margin-top:-'.$tamTam8.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam8 = $i * $tamContSec8;
                        $tamTam8 = ($i - 1) * 190;                        
                        $porcTam8a = ($i * $tamContSec8) + 1;
                        $tamTam8a = $i * 190;
                        echo $porcTam8.'%{margin-top:-'.$tamTam8.'px;}';
                        echo $porcTam8a.'%{margin-top:-'.$tamTam8a.'px;}';
                    }
                }
                ?>
            }
            @keyframes carousel-publicidad8xs{
                <?php 
                for($i = 0; $i <= $tamPub8; $i++){
                    if($i == 0){
                        $porcTam8 = $i * $tamContSec8;
                        $tamTam8 = $i * 80;
                        echo $porcTam8.'%{margin-top:-'.$tamTam8.'px;}';
                    }else if($i == $tamPub8){
                        $porcTam8 = ($i * $tamContSec8)-1;
                        $tamTam8 = ($i -1) * 80;
                        echo $porcTam8.'%{margin-top:-'.$tamTam8.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam8 = $i * $tamContSec8;
                        $tamTam8 = ($i - 1) * 80;                        
                        $porcTam8a = ($i * $tamContSec8) + 1;
                        $tamTam8a = $i * 80;
                        echo $porcTam8.'%{margin-top:-'.$tamTam8.'px;}';
                        echo $porcTam8a.'%{margin-top:-'.$tamTam8a.'px;}';
                    }
                }
                ?>
            }
    </style>
    <div class="row margen-top" id="sec-cultura">
        <?php
        echo "";
        foreach($publicidad8 as $publicidad){
            echo '<div class="pub8">
                    <a href="'.$publicidad['url_publicidad'].'">
                        <img src="'.$publicidad['img_publicidad'].'">
                    </a>
                </div>';
        } 
        ?>
    </div>
</div>