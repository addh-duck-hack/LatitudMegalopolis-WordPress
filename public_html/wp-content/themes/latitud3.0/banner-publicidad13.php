<?php
//Banner publicidad Negocios
$publicidad13 = getDataFromWhereX2($connection,"publicidad","posicion_publicidad",13,"estatus_publicidad",200);
$tamPub13 = count($publicidad13);
$tamCont13 = $tamPub13 * 190;
$movCont13 = ($tamPub13 - 1) * 190;
$tamContSec13 = 100 / $tamPub13;
$tiempoAnim13 = $tamPub13 * 7;
?>
<style type="text/css">
    .cont-publicidad-negocios{
        height: 190px;
        overflow: hidden;
    }
    @media (max-width: 768px) {
        .cont-publicidad-negocios{
        height: 80px;
        }
    }
</style>
<div class="margen-top cont-publicidad-negocios">
    <style type="text/css">
            #sec-negocios{
                height: <?php echo $tamCont13; ?>px;
                animation-duration: <?php echo $tiempoAnim13; ?>s;
                animation-name: carousel-publicidad13;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
                animation-direction: normal;
            }
            .pub13{
                height: <?php echo $tamContSec13; ?>%;
                width: 100%;
            }
            .pub13 img{
                height: 100%;
                max-height: 190px;
                width: 100%;
            }
            @media (max-width: 768px) {
                #sec-negocios{
                height: <?php echo $tamPub13 * 80; ?>px;
                animation-name: carousel-publicidad13xs;
                }
                .pub13{
                    height: <?php echo $tamContSec13; ?>%;
                    width: 100%;
                }
                .pub13 img{
                    height: 90%;
                    max-height: 80px;
                    width: 97%;
                }
            }
            @keyframes carousel-publicidad13{
                <?php 
                for($i = 0; $i <= $tamPub13; $i++){
                    if($i == 0){
                        $porcTam13 = $i * $tamContSec13;
                        $tamTam13 = $i * 190;
                        echo $porcTam13.'%{margin-top:-'.$tamTam13.'px;}';
                    }else if($i == $tamPub13){
                        $porcTam13 = ($i * $tamContSec13)-1;
                        $tamTam13 = ($i -1) * 190;
                        echo $porcTam13.'%{margin-top:-'.$tamTam13.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam13 = $i * $tamContSec13;
                        $tamTam13 = ($i - 1) * 190;                        
                        $porcTam13a = ($i * $tamContSec13) + 1;
                        $tamTam13a = $i * 190;
                        echo $porcTam13.'%{margin-top:-'.$tamTam13.'px;}';
                        echo $porcTam13a.'%{margin-top:-'.$tamTam13a.'px;}';
                    }
                }
                ?>
            }
            @keyframes carousel-publicidad13xs{
                <?php 
                for($i = 0; $i <= $tamPub13; $i++){
                    if($i == 0){
                        $porcTam13 = $i * $tamContSec13;
                        $tamTam13 = $i * 80;
                        echo $porcTam13.'%{margin-top:-'.$tamTam13.'px;}';
                    }else if($i == $tamPub13){
                        $porcTam13 = ($i * $tamContSec13)-1;
                        $tamTam13 = ($i -1) * 80;
                        echo $porcTam13.'%{margin-top:-'.$tamTam13.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam13 = $i * $tamContSec13;
                        $tamTam13 = ($i - 1) * 80;                        
                        $porcTam13a = ($i * $tamContSec13) + 1;
                        $tamTam13a = $i * 80;
                        echo $porcTam13.'%{margin-top:-'.$tamTam13.'px;}';
                        echo $porcTam13a.'%{margin-top:-'.$tamTam13a.'px;}';
                    }
                }
                ?>
            }
    </style>
    <div class="row margen-top" id="sec-negocios">
        <?php
        echo "";
        foreach($publicidad13 as $publicidad){
            echo '<div class="pub13">
                    <a href="'.$publicidad['url_publicidad'].'">
                        <img src="'.$publicidad['img_publicidad'].'">
                    </a>
                </div>';
        } 
        ?>
    </div>
</div>