<style type="text/css">
    .play-list{
        width: 100%;
        background-image: url('<?php bloginfo('template_url'); ?>/resources/background_videos.jpeg');
        padding-top: 5em;
        padding-bottom: 40px;
        overflow: hidden;
    }
    .play-list h1{
        font-family: 'Nimbus';
        font-style: italic;
        text-align: center;
        color: white;
        margin-bottom: 15cyberpx
    }
    #contenedorPlay{
        width: 100%;
    }
    .item-play-list{
        width: 40%;
        margin-left: 30%;
        border: 2px solid white;
        border-radius: 3px;
    }
    .item-play-list:hover{
        cursor: pointer;
    }
    .img-play-list{
        width: 100%;
        height: 150px;
    }
    .left-flecha{
        display: none;
        background: rgba(255,255,255,0.3);
        border: 1px solid white;
        border-radius: 100%;
        width: 35px;
        height: 35px;
        position: absolute;
        margin-left: 5px;
        margin-top: -5%;
    }
    .left-flecha:hover, .right-flecha:hover{
        background: rgba(255,255,255,0.7);
    }
    .left-flecha h2,.right-flecha h2{
        color: white;
        text-align: center;
        font-family: monospace;
        font-weight: bold;
    }
    .right-flecha{
        background: rgba(255,255,255,0.3);
        border: 1px solid white;
        border-radius: 100%;
        width: 35px;
        height: 35px;
        position: relative;
        float: right;
        margin-right: 5px;
        margin-top:-10%;
    }
    .fondo-play{
        width: 100%;
        min-height: 100%;
        height: !important;
        position: fixed;
        top: 0;
        left: 0;
        background: rgba(0,0,0,0.8);
        z-index: 99999;
        display: none;
    }
    .fondo2-play{
        position: absolute;
        width: 100%;
        min-height: 100%;
        height: !important;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .video-play{
        max-width: 90%;
        border: 5px solid white;
        border-radius: 2px;
        background: black;
    }    
    .video-play .wp-block-embed{
        margin-bottom: -6px;
        margin: 0;
    }
    .close-video{
        float: right;
        position: relative;
        margin-top: -30px;
        margin-right: -25px;
        width: 25px;
        height: 25px;
        background: black;
        border: 1px solid white;
        border-radius: 25px;
        color: white;
    }
    .close-video:hover{
        cursor: pointer;
        color: red;
        border: 2px solid red;
    }
    
    .close-video h4{
        margin-top: -6px;
        margin-left: 5px
    }
    .texto-play{
        position: relative;
        top: -40%;
    }
    .texto-play h6{
        font-family: 'Nimbus';
        color: white;
        text-align: center;
        position: absolute;
        background: rgba(0,0,0,0.7);
        padding: 5px;
    }
    .carousel-item .carousel-caption{
        right: 0px;
        bottom: 0px;
        left: 0px;
        background: rgba(0,0,0,0.5)
    }
    .addtoany_share_save_container{
        display: none;
    }
    @media (max-width: 992px) {
        .play-list{
            padding-top: 25px;
            padding-bottom: 25px;
        }
        .img-play-list{
            height: 125px;
        }
        .left-flecha{
            margin-top: -8%;
        }
        .right-flecha{
            margin-top: -11%;
        }
    }
    @media (max-width: 768px) {
        .play-list{
            padding-top: 25px;
            padding-bottom: 25px;
        }
        .img-play-list{
            height: 100px;
        }
        .left-flecha{
            margin-top: -9%;
        }
        .right-flecha{
            margin-top: -13%;
        }
        .video-play iframe.youtube-player{
            width: 100%;
        }
    }
    @media (max-width: 576px) {
        .play-list{
            padding-top: 20px;
            padding-bottom: 20px;
            background: #000000;
        }
        .img-play-list{
            height: 75px;
        }
        .item-play-list{
            width: 29%;
        }
        .left-flecha{
            margin-top: -15%;
        }
        .right-flecha{
            margin-top: -15%;
        }
        .video-play{
            width: 90%;
        }
        .video-play .wp-block-embed .wp-block-embed__wrapper iframe{
            width: 100%;
        }
        .video-play iframe.youtube-player{
            width: 100%;
        }
    }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $("#rightPlay").click(function(){
            $("#leftPlay").fadeIn(2500);
            $("#rightPlay").fadeOut(2500);
            $("#contenedorPlay").animate({marginLeft: "-65%"},3500,"swing");
        });
        $("#leftPlay").click(function(){
            $("#rightPlay").fadeIn(2500);
            $("#leftPlay").fadeOut(2500);
            $("#contenedorPlay").animate({marginLeft: "0%"},3500,"swing");
        });
    }); 
</script>

<div class="play-list oculto-xs">
    <h1></h1>
    <div class="cont-play-list" id="contenedorPlay">
        <?php query_posts('category_name=Videos')?><!--Para elegir categoria en slider-->
            <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 2) : the_post(); ?>
            <!--Codigo que se ejecutara cuando encuentre algun post-->
            <div class="item-play-list" id="img-<?php echo $i;?>">
                <?php the_content()?>
            </div>
            <?php $i++; endwhile; else: ?>
            <!--Codigo que se ejecutara si no encuentra post-->
            <h1>Error 404 no se encontraron videos.</h1>
            <?php endif; ?>
        <?php wp_reset_query();?>
    </div>
</div>
<!--Carousel para los videos del movil-->
<div class="play-list oculto-lg">
    <h1></h1>
    <div id="carouselNewPlaylist" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <?php query_posts('category_name=Videos')?><!--Para elegir categoria en slider-->
            <?php $i = 1; if ( have_posts() ) : while ( have_posts() && $i < 2) : the_post(); ?>
            <!--Codigo que se ejecutara cuando encuentre algun post-->
            <div class="carousel-item <?php if (($i-1) == 0): ?>
                active
            <?php endif; ?>" id="img-mov-<?php echo $i;?>">
                <?php the_content()?>
            </div>
            <?php $i++; endwhile; else: ?>
            <!--Codigo que se ejecutara si no encuentra post-->
            <h1>Error 404 no se encontraron portadas.</h1>
            <?php endif; ?>
            <?php wp_reset_query();?>
        </div>
    </div>
</div>