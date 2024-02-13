<?php
/*
Template Name: VisualizadorPublicidad
*/
?>
<?php
require (TEMPLATEPATH. '/config/configs.php');
require (TEMPLATEPATH. '/config/functions.php');
$connection = dbConnection($db_config);
if (!$connection) {
    header('Location: error.php');
}
$categoriasArre = getDataFromWhere($connection,"categorias_publicidad","status",201);
$arrayNegocios = getDataFromLimit($connection,"pagina_publicidad","id",12);
?>

<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
   <head>
      <meta charset="<?php bloginfo('charset'); ?>">
      <title><?php bloginfo('name'); ?></title>
	   <meta name="google-site-verification" content="RQY_Jn3LU0djgLVDXY5sI3pE7QFCz07tpo72kiniwfc" />
      <meta name="viewport" content="width=device-width, user-escalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1">
	   <meta name="description" content="Latitud Megalópolis&nbsp;Periodismo con experiencia, seriedad y credibilidad" />
      <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
      <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/estilos15122020.css">
	    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans|Prosto+One|Russo+One|Questrial&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
      <script src="<?php bloginfo('template_url'); ?>/js/menu.js"></script>
      <?php wp_head(); ?>
   </head>
   <header>
      <?php include (TEMPLATEPATH. '/analyticstracking.php');?>
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-7 col-md-4 margen-top" style="margin-bottom: 10px;">
               <a href="https://latitudmegalopolis.com/">
                  <img class="full-img" src="https://latitudmegalopolis-com.digitalserver.io/wp-content/themes/latitud3.0/resources/logo_transparente.png" alt="">
               </a>
            </div>
            <!-- <div class="col-4">
               <div class="fecha text-right" id="fecha"></div>
            </div> -->
         </div>
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav-principal">
            <a class="navbar-brand" href="http://latitudmegalopolis.com/">INICIO</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>

           <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav mr-auto">
               <!--<li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CATEGORIAS
                 </a>
                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <?php
                        foreach($categoriasArre as $categoria){
                            echo '<a class="dropdown-item" href="https://latitudmegalopolis.com/red-negocios?categoria='.$categoria['name'].'">'.$categoria['name'].'</a>';
                        }
                     ?>
                 </div>
              </li>-->
              <li class="nav-item" style="position: absolute;margin-left: 55%;">
                <a href="#" class="nav-link" id="fecha" style="margin-top: -19px;"></a>
              </li>
             </ul>
             <form class="form-inline my-2 my-lg-0">
               <a href="https://www.facebook.com/Latitud-Megal%C3%B3polis-234577750271348/"><img class="icon-mov" src="<?php bloginfo('template_url'); ?>/resources/facebook.png" alt=""></a>
               <a href="https://twitter.com/@Latitud_mx"><img class="icon-mov" src="<?php bloginfo('template_url'); ?>/resources/twitter.png" alt=""></a>
               <a href="https://www.youtube.com/channel/UCoFRsjmNaTM6NTvg6taop0w"><img class="icon-mov" src="<?php bloginfo('template_url'); ?>/resources/youtube.png" alt=""></a>
               <a href="https://www.instagram.com/latitud.megalopolis/"><img class="icon-mov" src="<?php bloginfo('template_url'); ?>/resources/instagram.png" alt=""></a>
             </form>
           </div>
         </nav>
      </div>
   </header>
<body>
    <div class="container">
        <style type="text/css">
                .texto-descripcion{
                  font-size: 25px;
                  font-family: 'Nimbus';
                }
                @media (max-width: 768px) {
                }
        </style>
        <?php
            $numPublicidad = 14;
            for($i = 0; $i < count($arrayNegocios); $i++){
                if ($i%2 == 0){
                    echo '<div class="row margen-top">
                    <div class="col-12 col-md-6 h300 oculto-xs">
                     <div style="width:100%;height:100%;">
                        <a style="color:'.$arrayNegocios[$i]['color'].'" href="'.$arrayNegocios[$i]['url'].'">
                              <h2 class="text-center contenido-titulo">'.$arrayNegocios[$i]['name'].'</h2>
                        </a>
                        <p style="color:'.$arrayNegocios[$i]['color'].'" class="text-center texto-descripcion">'.$arrayNegocios[$i]['description'].'</p>
                     </div>
                    </div>
                    <div class="col-12 col-md-6 h300">
                       <a href="'.$arrayNegocios[$i]['url'].'">
                          <img class="d-block full-img" src="'.$arrayNegocios[$i]['picture'].'">
                       </a>
                    </div>
                    <div class="col-12 col-md-6 h300 oculto-lg">
                     <div style="width:100%;height:100%;">
                        <a style="color:'.$arrayNegocios[$i]['color'].'" href="'.$arrayNegocios[$i]['url'].'">
                            <h2 class="text-center contenido-titulo">'.$arrayNegocios[$i]['name'].'</h2>
                        </a>
                        <p style="color:'.$arrayNegocios[$i]['color'].'" class="text-center texto-descripcion">'.$arrayNegocios[$i]['description'].'</p>
                     </div>
                    </div></div>';
                }else{
                    echo '<div class="row margen-top">
                        <div class="col-12 col-md-6 h300">
                        <a href="'.$arrayNegocios[$i]['url'].'">
                           <img class="d-block full-img" src="'.$arrayNegocios[$i]['picture'].'">
                        </a>
                     </div>
                        <div class="col-12 col-md-6 h300 oculto-xs">
                        <div style="width:100%;height:100%;">
                           <a style="color:'.$arrayNegocios[$i]['color'].'" href="'.$arrayNegocios[$i]['url'].'">
                              <h2 class="text-center contenido-titulo">'.$arrayNegocios[$i]['name'].'</h2>
                           </a>
                           <p style="color:'.$arrayNegocios[$i]['color'].'" class="text-center texto-descripcion">'.$arrayNegocios[$i]['description'].'</p>
                        </div>
                     </div>
                     <div class="col-12 col-md-6 h300 oculto-lg">
                        <div style="width:100%;height:100%;">
                           <a style="color:'.$arrayNegocios[$i]['color'].'" href="'.$arrayNegocios[$i]['url'].'">
                              <h2 class="text-center contenido-titulo">'.$arrayNegocios[$i]['name'].'</h2>
                           </a>
                           <p style="color:'.$arrayNegocios[$i]['color'].'" class="text-center texto-descripcion">'.$arrayNegocios[$i]['description'].'</p>
                        </div>
                     </div></div>';
                     if ($numPublicidad < 19){
                        createAdvertising($numPublicidad,$connection);
                        $numPublicidad++;
                     }
                }
            }
        ?>
    </div>
</body>

<?php get_footer(); ?>

<?php
function createAdvertising($num,$conn){
   //Banner publicidad Latitud TV
   $publicidad1 = getDataFromWhereX2($conn,"publicidad","posicion_publicidad",$num,"estatus_publicidad",200);
   $tamPub1 = count($publicidad1);
   $tamCont1 = $tamPub1 * 190;
   $movCont1 = ($tamPub1 - 1) * 190;
   $tamContSec1 = 100 / $tamPub1;
   $tiempoAnim1 = $tamPub1 * 7;
   echo '<style type="text/css">
         .cont-publicidad-new{
            height: 190px;
            overflow: hidden;
         }
         @media (max-width: 768px) {
            .cont-publicidad-new{
            height: 80px;
            }
         }
         </style>';
   echo '<div class="margen-top cont-publicidad-new">
            <style type="text/css">
                  #sec-television{
                        height: <?php echo $tamCont1; ?>px;
                        animation-duration: '.$tiempoAnim1.'s;
                        animation-name: carousel-publicidad1;
                        animation-iteration-count: infinite;
                        animation-timing-function: linear;
                        animation-direction: normal;
                  }
                  .pub'.$num.'{
                        height: '.$tamContSec1.'%;
                        width: 100%;
                  }
                  .pub'.$num.' img{
                        height: 100%;
                        max-height: 190px;
                        width: 100%;
                  }
                  @media (max-width: 768px) {
                        #sec-television{
                        height: '.($tamPub1 * 80).'px;
                        animation-name: carousel-publicidad1xs;
                        }
                        .pub'.$num.'{
                           height: '.$tamContSec1.'%;
                           width: 100%;
                        }
                        .pub'.$num.' img{
                           height: 90%;
                           max-height: 80px;
                           width: 97%;
                        }
                  }
                  @keyframes carousel-publicidad'.$num.'{';
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
                  echo '}@keyframes carousel-publicidad'.$num.'xs{';
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
                  echo '}
                     </style>
                     <div class="row margen-top" id="sec-television">';
                        echo "";
                        foreach($publicidad1 as $publicidad){
                           echo '<div class="pub'.$num.'">
                                    <a href="'.$publicidad['url_publicidad'].'">
                                       <img src="'.$publicidad['img_publicidad'].'">
                                    </a>
                                 </div>';
                        } 
                     echo '</div>
                  </div>';
}
?>