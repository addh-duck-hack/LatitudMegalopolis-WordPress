<?php
/*
Template Name: Pagina Valores Columnistas
*/
?>
<?php
require (TEMPLATEPATH. '/config/configs.php');
require (TEMPLATEPATH. '/config/functions.php');
$connection = dbConnection($db_config_lat);
if (!$connection) {
    header('Location: error.php');
}
$users = getDataFrom($connection,"b3_users");
$longUsers = count($users);
?>
<?php get_header(); ?>
<div class="container">
   <div class="row" style="margin-top:20px;margin-left:5px;margin-right:5px;background:rgb(240,240,240)">
      <div class="col-12" style="padding:20px;border:2px solid grey;">
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h3 class="text-center">Editar columnistas</h3>
            <h5>El siguiente formulario sirve para cambiar los columnistas. <br>Instrucciones:</h5>
            <h6><ol>
                <li>Seleccionar la posicion del columnista (Del 1 al 6)</li>
                <li>Seleccionar el usuario de la lista desplegable</li>
                <li>Colocar la URL de la imagen del columnista</li>
            </ol></h6>
            <br>
            <form>
               <div class="form-group">
                <label for="posicionID">Seleccione la posicion de columniasta a editar, se cuentan de izqierda a derecha</label><br>
                <select name="posicionID" id="posicionID" class="custom-select">
                    <option value="0" selected>Posición columnista</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select><br><br>
                <label for="columnistaName">Seleccione el nombre del usuario</label><br>
                <select name="columnistaName" id="columnistaName" class="custom-select">
                    <option value="0" selected>Nuevo Columnista</option>
                    <?php
                    header("Content-Type: text/html;charset=utf-8");
                    for($i = 0;  $i < $longUsers; $i++){
                        $nicename = $users[$i]['user_nicename'];
                        $displayName = $users[$i]['display_name'];
                        $displayName = utf8_decode($displayName);
                        echo "<option value=".$nicename.">".$displayName."</option>";
                    }
                    ?>
                </select><br><br>
                <label for="valorImg">URL de la imagen del columnista</label>
                <input type="text" class="form-control" id="valorImg" style="width:80%;" placeholder="https://latitudmegalopolis.com/wp-content/uploads/2019/07/IMG-20190727-WA0001.jpg">
                <div id="imgCargando"></div>
               </div>
               <button type="button" class="btn btn-success" id="newColumnista">Guardar</button>
               <div id="resImg" style="font-weight:700;border-radius:3px;margin-top:20px;padding:20px"></div>
            </form>
         <?php endwhile; else: ?>
            <h3>Error 404 no se encontro el post Solicitado.</h3>
         <?php endif; ?>
         <?php wp_reset_query();?>
      </div>
   </div>
<?php get_footer(); ?>

<script type="text/javascript">
// Evento para la imagen de LUY
$("#newColumnista").click(function(){
  if ($("#valorImg").val() == "" || $("#posicionID").val() == 0 || $("#columnistaName").val() == 0) {
    $("#resImg").css("background","rgba(150,80,80,0.5)");
    $("#resImg").css("color","red");
    $("#resImg").css("border","2px solid red");
    $("#resImg").html("Uno o mas campos estan vacios o sin seleccionar<br>Favor de verificar.");
  }else {
    $("#newColumnista").attr("disabled",true)
    $("#imgCargando").html("<img src='https://api.latitudmegalopolis.com/functions/cargando.gif'>");
    $.get("https://api.latitudmegalopolis.com/functions/valores.php",{keycode: "EDITCOLUMNISTA", posicion: $("#posicionID").val(), autor: $("#columnistaName").val(), img: $("#valorImg").val()}, muestraMensaje, "json");
  }
 });

 function muestraMensaje(respuesta){
   if (respuesta.Success) {
     $("#resImg").css("background","rgba(80,150,80,0.5)");
     $("#resImg").css("color","green");
     $("#resImg").css("border","2px solid green");
     $("#resImg").html(respuesta.Mensaje);
     $("#enviarImg").attr("disabled",false)
     $("#imgCargando").html("");
   }else {
     $("#resImg").css("background","rgba(150,80,80,0.5)");
     $("#resImg").css("color","red");
     $("#resImg").css("border","2px solid red");
     $("#resImg").html(respuesta.Error);
     $("#enviarImg").attr("disabled",false)
     $("#imgCargando").html("");
   }
}
</script>
