<?php
//Banner publicidad Entretenimiento
$publicidad9 = getDataFromWhereX2($connection,"publicidad","posicion_publicidad",9,"estatus_publicidad",200);
$tamPub9 = count($publicidad9);
$tamCont9 = $tamPub9 * 190;
$movCont9 = ($tamPub9 - 1) * 190;
$tamContSec9 = 100 / $tamPub9;
$tiempoAnim9 = $tamPub9 * 7;
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
            #sec-entretenimiento{
                height: <?php echo $tamCont9; ?>px;
                animation-duration: <?php echo $tiempoAnim9; ?>s;
                animation-name: carousel-publicidad9;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
                animation-direction: normal;
            }
            .pub9{
                height: <?php echo $tamContSec9; ?>%;
                width: 100%;
            }
            .pub9 img{
                height: 100%;
                max-height: 190px;
                width: 100%;
            }
            @media (max-width: 768px) {
                #sec-entretenimiento{
                height: <?php echo $tamPub9 * 80; ?>px;
                animation-name: carousel-publicidad9xs;
                }
                .pub9{
                    height: <?php echo $tamContSec9; ?>%;
                    width: 100%;
                }
                .pub9 img{
                    height: 90%;
                    max-height: 80px;
                    width: 97%;
                }
            }
            @keyframes carousel-publicidad9{
                <?php 
                for($i = 0; $i <= $tamPub9; $i++){
                    if($i == 0){
                        $porcTam9 = $i * $tamContSec9;
                        $tamTam9 = $i * 190;
                        echo $porcTam9.'%{margin-top:-'.$tamTam9.'px;}';
                    }else if($i == $tamPub9){
                        $porcTam9 = ($i * $tamContSec9)-1;
                        $tamTam9 = ($i -1) * 190;
                        echo $porcTam9.'%{margin-top:-'.$tamTam9.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam9 = $i * $tamContSec9;
                        $tamTam9 = ($i - 1) * 190;                        
                        $porcTam9a = ($i * $tamContSec9) + 1;
                        $tamTam9a = $i * 190;
                        echo $porcTam9.'%{margin-top:-'.$tamTam9.'px;}';
                        echo $porcTam9a.'%{margin-top:-'.$tamTam9a.'px;}';
                    }
                }
                ?>
            }
            @keyframes carousel-publicidad9xs{
                <?php 
                for($i = 0; $i <= $tamPub9; $i++){
                    if($i == 0){
                        $porcTam9 = $i * $tamContSec9;
                        $tamTam9 = $i * 80;
                        echo $porcTam9.'%{margin-top:-'.$tamTam9.'px;}';
                    }else if($i == $tamPub9){
                        $porcTam9 = ($i * $tamContSec9)-1;
                        $tamTam9 = ($i -1) * 80;
                        echo $porcTam9.'%{margin-top:-'.$tamTam9.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam9 = $i * $tamContSec9;
                        $tamTam9 = ($i - 1) * 80;                        
                        $porcTam9a = ($i * $tamContSec9) + 1;
                        $tamTam9a = $i * 80;
                        echo $porcTam9.'%{margin-top:-'.$tamTam9.'px;}';
                        echo $porcTam9a.'%{margin-top:-'.$tamTam9a.'px;}';
                    }
                }
                ?>
            }
    </style>
    <div class="row margen-top" id="sec-entretenimiento">
        <?php
        echo "";
        foreach($publicidad9 as $publicidad){
            echo '<div class="pub9">
                    <a href="'.$publicidad['url_publicidad'].'">
                        <img src="'.$publicidad['img_publicidad'].'">
                    </a>
                </div>';
        } 
        ?>
    </div>
</div>