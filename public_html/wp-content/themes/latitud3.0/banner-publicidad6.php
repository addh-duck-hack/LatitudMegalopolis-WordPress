<?php
//Banner publicidad Orgullo MX
$publicidad6 = getDataFromWhereX2($connection,"publicidad","posicion_publicidad",6,"estatus_publicidad",200);
$tamPub6 = count($publicidad6);
$tamCont6 = $tamPub6 * 190;
$movCont6 = ($tamPub6 - 1) * 190;
$tamContSec6 = 100 / $tamPub6;
$tiempoAnim6 = $tamPub6 * 7;
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
            #sec-orgullomx{
                height: <?php echo $tamCont6; ?>px;
                animation-duration: <?php echo $tiempoAnim6; ?>s;
                animation-name: carousel-publicidad6;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
                animation-direction: normal;
            }
            .pub6{
                height: <?php echo $tamContSec6; ?>%;
                width: 100%;
            }
            .pub6 img{
                height: 100%;
                max-height: 190px;
                width: 100%;
            }
            @media (max-width: 768px) {
                #sec-orgullomx{
                height: <?php echo $tamPub1 * 80; ?>px;
                animation-name: carousel-publicidad6xs;
                }
                .pub6{
                    height: <?php echo $tamContSec6; ?>%;
                    width: 100%;
                }
                .pub6 img{
                    height: 90%;
                    max-height: 80px;
                    width: 97%;
                }
            }
            @keyframes carousel-publicidad6{
                <?php 
                for($i = 0; $i <= $tamPub6; $i++){
                    if($i == 0){
                        $porcTam6 = $i * $tamContSec6;
                        $tamTam6 = $i * 190;
                        echo $porcTam6.'%{margin-top:-'.$tamTam6.'px;}';
                    }else if($i == $tamPub6){
                        $porcTam6 = ($i * $tamContSec6)-1;
                        $tamTam6 = ($i -1) * 190;
                        echo $porcTam6.'%{margin-top:-'.$tamTam6.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam6 = $i * $tamContSec6;
                        $tamTam6 = ($i - 1) * 190;                        
                        $porcTam6a = ($i * $tamContSec6) + 1;
                        $tamTam6a = $i * 190;
                        echo $porcTam6.'%{margin-top:-'.$tamTam6.'px;}';
                        echo $porcTam6a.'%{margin-top:-'.$tamTam6a.'px;}';
                    }
                }
                ?>
            }
            @keyframes carousel-publicidad6xs{
                <?php 
                for($i = 0; $i <= $tamPub6; $i++){
                    if($i == 0){
                        $porcTam6 = $i * $tamContSec6;
                        $tamTam6 = $i * 80;
                        echo $porcTam6.'%{margin-top:-'.$tamTam6.'px;}';
                    }else if($i == $tamPub6){
                        $porcTam6 = ($i * $tamContSec6)-1;
                        $tamTam6 = ($i -1) * 80;
                        echo $porcTam6.'%{margin-top:-'.$tamTam6.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam6 = $i * $tamContSec6;
                        $tamTam6 = ($i - 1) * 80;                        
                        $porcTam6a = ($i * $tamContSec6) + 1;
                        $tamTam6a = $i * 80;
                        echo $porcTam6.'%{margin-top:-'.$tamTam6.'px;}';
                        echo $porcTam6a.'%{margin-top:-'.$tamTam6a.'px;}';
                    }
                }
                ?>
            }
    </style>
    <div class="row margen-top" id="sec-orgullomx">
        <?php
        echo "";
        foreach($publicidad6 as $publicidad){
            echo '<div class="pub6">
                    <a href="'.$publicidad['url_publicidad'].'">
                        <img src="'.$publicidad['img_publicidad'].'">
                    </a>
                </div>';
        } 
        ?>
    </div>
</div>