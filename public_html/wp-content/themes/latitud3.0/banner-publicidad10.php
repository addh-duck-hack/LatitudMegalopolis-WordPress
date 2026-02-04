<?php
//Banner publicidad Deportes
$publicidad10 = getDataFromWhereX2($connection,"publicidad","posicion_publicidad",10,"estatus_publicidad",200);
$tamPub10 = count($publicidad10);
$tamCont10 = $tamPub10 * 190;
$movCont10 = ($tamPub10 - 1) * 190;
$tamContSec10 = 100 / $tamPub10;
$tiempoAnim10 = $tamPub10 * 7;
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
            #sec-deportes{
                height: <?php echo $tamCont10; ?>px;
                animation-duration: <?php echo $tiempoAnim10; ?>s;
                animation-name: carousel-publicidad10;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
                animation-direction: normal;
            }
            .pub10{
                height: <?php echo $tamContSec10; ?>%;
                width: 100%;
            }
            .pub10 img{
                height: 100%;
                max-height: 190px;
                width: 100%;
            }
            @media (max-width: 768px) {
                #sec-deportes{
                height: <?php echo $tamPub10 * 80; ?>px;
                animation-name: carousel-publicidad10xs;
                }
                .pub10{
                    height: <?php echo $tamContSec10; ?>%;
                    width: 100%;
                }
                .pub10 img{
                    height: 90%;
                    max-height: 80px;
                    width: 97%;
                }
            }
            @keyframes carousel-publicidad10{
                <?php 
                for($i = 0; $i <= $tamPub10; $i++){
                    if($i == 0){
                        $porcTam10 = $i * $tamContSec10;
                        $tamTam10 = $i * 190;
                        echo $porcTam10.'%{margin-top:-'.$tamTam10.'px;}';
                    }else if($i == $tamPub10){
                        $porcTam10 = ($i * $tamContSec10)-1;
                        $tamTam10 = ($i -1) * 190;
                        echo $porcTam10.'%{margin-top:-'.$tamTam10.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam10 = $i * $tamContSec10;
                        $tamTam10 = ($i - 1) * 190;                        
                        $porcTam10a = ($i * $tamContSec10) + 1;
                        $tamTam10a = $i * 190;
                        echo $porcTam10.'%{margin-top:-'.$tamTam10.'px;}';
                        echo $porcTam10a.'%{margin-top:-'.$tamTam10a.'px;}';
                    }
                }
                ?>
            }
            @keyframes carousel-publicidad10xs{
                <?php 
                for($i = 0; $i <= $tamPub10; $i++){
                    if($i == 0){
                        $porcTam10 = $i * $tamContSec10;
                        $tamTam10 = $i * 80;
                        echo $porcTam10.'%{margin-top:-'.$tamTam10.'px;}';
                    }else if($i == $tamPub10){
                        $porcTam10 = ($i * $tamContSec10)-1;
                        $tamTam10 = ($i -1) * 80;
                        echo $porcTam10.'%{margin-top:-'.$tamTam10.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam10 = $i * $tamContSec10;
                        $tamTam10 = ($i - 1) * 80;                        
                        $porcTam10a = ($i * $tamContSec10) + 1;
                        $tamTam10a = $i * 80;
                        echo $porcTam10.'%{margin-top:-'.$tamTam10.'px;}';
                        echo $porcTam10a.'%{margin-top:-'.$tamTam10a.'px;}';
                    }
                }
                ?>
            }
    </style>
    <div class="row margen-top" id="sec-deportes">
        <?php
        echo "";
        foreach($publicidad10 as $publicidad){
            echo '<div class="pub10">
                    <a href="'.$publicidad['url_publicidad'].'">
                        <img src="'.$publicidad['img_publicidad'].'">
                    </a>
                </div>';
        } 
        ?>
    </div>
</div>