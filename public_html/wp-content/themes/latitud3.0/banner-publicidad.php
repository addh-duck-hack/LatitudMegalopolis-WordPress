<?php
//Banner publicidad Latitud TV
$publicidad1 = getDataFromWhereX2($connection,"publicidad","posicion_publicidad",1,"estatus_publicidad",200);
$tamPub1 = count($publicidad1);
$tamCont1 = $tamPub1 * 190;
$movCont1 = ($tamPub1 - 1) * 190;
$tamContSec1 = 100 / $tamPub1;
$tiempoAnim1 = $tamPub1 * 7;
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
            #sec-television{
                height: <?php echo $tamCont1; ?>px;
                animation-duration: <?php echo $tiempoAnim1; ?>s;
                animation-name: carousel-publicidad1;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
                animation-direction: normal;
            }
            .pub1{
                height: <?php echo $tamContSec1; ?>%;
                width: 100%;
            }
            .pub1 img{
                height: 100%;
                max-height: 190px;
                width: 100%;
            }
            @media (max-width: 768px) {
                #sec-television{
                height: <?php echo $tamPub1 * 80; ?>px;
                animation-name: carousel-publicidad1xs;
                }
                .pub1{
                    height: <?php echo $tamContSec1; ?>%;
                    width: 100%;
                }
                .pub1 img{
                    height: 90%;
                    max-height: 80px;
                    width: 97%;
                }
            }
            @keyframes carousel-publicidad1{
                <?php 
                for($i = 0; $i <= $tamPub1; $i++){
                    if($i == 0){
                        $porcTam1 = $i * $tamContSec1;
                        $tamTam1 = $i * 190;
                        echo $porcTam1.'%{margin-top:-'.$tamTam1.'px;}';
                    }else if($i == $tamPub1){
                        $porcTam1 = ($i * $tamContSec1)-1;
                        $tamTam1 = ($i -1) * 190;
                        echo $porcTam1.'%{margin-top:-'.$tamTam1.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam1 = $i * $tamContSec1;
                        $tamTam1 = ($i - 1) * 190;                        
                        $porcTam1a = ($i * $tamContSec1) + 1;
                        $tamTam1a = $i * 190;
                        echo $porcTam1.'%{margin-top:-'.$tamTam1.'px;}';
                        echo $porcTam1a.'%{margin-top:-'.$tamTam1a.'px;}';
                    }
                }
                ?>                
            }
            @keyframes carousel-publicidad1xs{
                <?php 
                for($i = 0; $i <= $tamPub1; $i++){
                    if($i == 0){
                        $porcTam1 = $i * $tamContSec1;
                        $tamTam1 = $i * 80;
                        echo $porcTam1.'%{margin-top:-'.$tamTam1.'px;}';
                    }else if($i == $tamPub1){
                        $porcTam1 = ($i * $tamContSec1)-1;
                        $tamTam1 = ($i -1) * 80;
                        echo $porcTam1.'%{margin-top:-'.$tamTam1.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam1 = $i * $tamContSec1;
                        $tamTam1 = ($i - 1) * 80;                        
                        $porcTam1a = ($i * $tamContSec1) + 1;
                        $tamTam1a = $i * 80;
                        echo $porcTam1.'%{margin-top:-'.$tamTam1.'px;}';
                        echo $porcTam1a.'%{margin-top:-'.$tamTam1a.'px;}';
                    }
                }
                ?>                
            }
    </style>
    <div class="row margen-top" id="sec-television">
        <?php
        echo "";
        foreach($publicidad1 as $publicidad){
            echo '<div class="pub1">
                    <a href="'.$publicidad['url_publicidad'].'">
                        <img src="'.$publicidad['img_publicidad'].'">
                    </a>
                </div>';
        } 
        ?>
    </div>
</div>
