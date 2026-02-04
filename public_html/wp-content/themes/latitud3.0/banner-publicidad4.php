<?php
//Banner publicidad Contra Portada
$publicidad4 = getDataFromWhereX2($connection,"publicidad","posicion_publicidad",4,"estatus_publicidad",200);
$tamPub4 = count($publicidad4);
$tamCont4 = $tamPub4 * 190;
$movCont4 = ($tamPub4 - 1) * 190;
$tamContSec4 = 100 / $tamPub4;
$tiempoAnim4 = $tamPub4 * 7;
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
            #sec-portada2{
                height: <?php echo $tamCont4; ?>px;
                animation-duration: <?php echo $tiempoAnim4; ?>s;
                animation-name: carousel-publicidad4;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
                animation-direction: normal;
            }
            .pub4{
                height: <?php echo $tamContSec4; ?>%;
                width: 100%;
            }
            .pub4 img{
                height: 100%;
                max-height: 190px;
                width: 100%;
            }
            @media (max-width: 768px) {
                #sec-portada2{
                height: <?php echo $tamPub4 * 80; ?>px;
                animation-name: carousel-publicidad4xs;
                }
                .pub4{
                    height: <?php echo $tamContSec4; ?>%;
                    width: 100%;
                }
                .pub4 img{
                    height: 90%;
                    max-height: 80px;
                    width: 97%;
                }
            }
            @keyframes carousel-publicidad4{
                <?php 
                for($i = 0; $i <= $tamPub4; $i++){
                    if($i == 0){
                        $porcTam4 = $i * $tamContSec4;
                        $tamTam4 = $i * 190;
                        echo $porcTam4.'%{margin-top:-'.$tamTam4.'px;}';
                    }else if($i == $tamPub4){
                        $porcTam4 = ($i * $tamContSec4)-1;
                        $tamTam4 = ($i -1) * 190;
                        echo $porcTam4.'%{margin-top:-'.$tamTam4.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam4 = $i * $tamContSec4;
                        $tamTam4 = ($i - 1) * 190;                        
                        $porcTam4a = ($i * $tamContSec4) + 1;
                        $tamTam4a = $i * 190;
                        echo $porcTam4.'%{margin-top:-'.$tamTam4.'px;}';
                        echo $porcTam4a.'%{margin-top:-'.$tamTam4a.'px;}';
                    }
                }
                ?>
            }
            @keyframes carousel-publicidad4xs{
                <?php 
                for($i = 0; $i <= $tamPub4; $i++){
                    if($i == 0){
                        $porcTam4 = $i * $tamContSec4;
                        $tamTam4 = $i * 80;
                        echo $porcTam4.'%{margin-top:-'.$tamTam4.'px;}';
                    }else if($i == $tamPub4){
                        $porcTam4 = ($i * $tamContSec4)-1;
                        $tamTam4 = ($i -1) * 80;
                        echo $porcTam4.'%{margin-top:-'.$tamTam4.'px;}';
                        echo '100%{margin-top:0px;}';
                    }else{
                        $porcTam4 = $i * $tamContSec4;
                        $tamTam4 = ($i - 1) * 80;                        
                        $porcTam4a = ($i * $tamContSec4) + 1;
                        $tamTam4a = $i * 80;
                        echo $porcTam4.'%{margin-top:-'.$tamTam4.'px;}';
                        echo $porcTam4a.'%{margin-top:-'.$tamTam4a.'px;}';
                    }
                }
                ?>
            }
    </style>
    <div class="row margen-top" id="sec-portada2">
        <?php
        echo "";
        foreach($publicidad4 as $publicidad){
            echo '<div class="pub4">
                    <a href="'.$publicidad['url_publicidad'].'">
                        <img src="'.$publicidad['img_publicidad'].'">
                    </a>
                </div>';
        } 
        ?>
    </div>
</div>