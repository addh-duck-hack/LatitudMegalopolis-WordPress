<?php
/*
Template Name: Pagina Valores Publicidad Taurina
*/
?>
<?php
require (TEMPLATEPATH. '/config/configs.php');
require (TEMPLATEPATH. '/config/functions.php');
$connection = dbConnection($db_config);
if (!$connection) {
    header('Location: error.php');
}
$con2 = dbConnection($db_config);
if (!$con2) {
    header('Location: error.php');
}
$publicidadID = $_GET["publicidadID"];
if ($publicidadID > 0) {
   $publicidadArre = getDataFromWhere($con2,"publicidad_taurina","posicion",$publicidadID);
}
?>
<?php get_header(); ?>
<div class="container">
   <?php if (!isset($publicidadID)): ?>
      <div class="row" style="margin-top:20px;margin-left:5px;margin-right:5px;background:rgb(240,240,240)">
         <div class="col-12" style="padding:20px;border:2px solid grey;">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
               <h3 class="text-center">Editar Publicidad</h3>
               <h5>El siguiente formulario sirve para cambiar la publicidad de latitud taurina<br>Instrucciones:</h5>
               <h6><ol>
                   <li>Seleccionar el lugar donde se va a incluir la publicidad</li>
                   <li>Colocar la URL de la imagen de la publicidad</li>
                   <li>Colocar el link a donde va a llevar la publicidad, en caso de no ir a ningun lado colocar #</li>
               </ol></h6>
               <br>
               <form>
                  <div class="form-group">
                   <label for="posicionID">Seleccione en donde se va a colocar la publicidad</label><br>
                   <select name="posicionID" id="posicionID" class="custom-select">
                       <option value="0" selected>Posición publicidad</option>
                       <option value="1">Carousel de notas + publicidad</option>
                       <option value="2">Carousel solo publicidad de toros</option>
                   </select><br><br>
                   <label for="valorImg">URL de la imagen publicidad</label>
                   <input type="text" class="form-control" id="valorImg" style="width:80%;" placeholder="https://latitudmegalopolis.com/wp-content/uploads/2019/07/IMG-20190727-WA0001.jpg">
                   <br>
                   <label for="valorUrl">Link de la publicidad</label>
                   <input type="text" class="form-control" id="valorUrl" style="width:80%;" placeholder="https://paginadestino.com/link">
                   <div id="imgCargando"></div>
                  </div>
                  <button type="button" class="btn btn-success" id="newPublicidad">Guardar</button>
                  <div id="resImg" style="font-weight:700;border-radius:3px;margin-top:20px;padding:20px"></div>
               </form>
            <?php endwhile; else: ?>
               <h3>Error 404 no se encontro el post Solicitado.</h3>
            <?php endif; ?>
            <?php wp_reset_query();?>
         </div>
      </div>
   <?php endif; ?>

   <div class="row" style="margin-top:20px;margin-left:5px;margin-right:5px;background:rgb(240,240,240)">
      <div class="col-12" style="padding:20px;border:2px solid grey;">
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h3 class="text-center">Publicidad en el sitio</h3>
            <h5>El siguiente formulario sirve para visualizar y editar la publicidad en el sitio <br>Instrucciones:</h5>
            <h6><ul>
                <li>Seleccionar el lugar donde se quiere modificar la publicidad</li>
                <li>Se muestra cada imagen junto con el sitio a donde se dirige</li>
                <li>3 opciones de edición:</li>
                <ol>
                   <li>Activar publicidad</li>
                   <li>Desactivar Publicidad</li>
                   <li>Eliminar publicidad</li>
                </ol>
            </ul></h6>
            <br>
            <label for="posicionEditar">Seleccione en donde se va a editar la publicidad</label><br>
            <select name="posicionEditar" id="posicionEditar" class="custom-select">
                <option value="0" <?php if ($publicidadID == 0 || !isset($publicidadID)) {
                   echo "selected";
                } ?>>Posición publicidad</option>
                <option value="1" <?php if ($publicidadID == 1) {
                   echo "selected";
                } ?>>Carousel de notas + publicidad</option>
                <option value="2" <?php if ($publicidadID == 1) {
                   echo "selected";
                } ?>>Carousel solo publicidad de toros</option>
            </select>
            <div id="respuestaEdit"></div>
            <br><br>
            <?php if (isset($publicidadID) && $publicidadID > 0): ?>
               <table class="table table-striped table-bordered table-hover">
                 <thead class="thead-light">
                   <tr class="text-center">
                     <th scope="col">ID</th>
                     <th scope="col">Imagen</th>
                     <th scope="col">Liga</th>
                     <th scope="col">Acciones</th>
                   </tr>
                 </thead>
                 <tbody>
                    <?php if ($publicidadID > 0) {
                       foreach($publicidadArre as $publicidad){
                          $activar = "";
                          $desactivar = "";
                          $eliminar = "";
                          switch ($publicidad['estatus']) {
                             case 200:
                                $activar = "disabled";
                                break;
                             case 201:
                               $desactivar = "disabled";
                               break;
                             case 200:
                               $eliminar = "disabled";
                               break;
                          }
                           echo '<tr class="text-center">
                                    <th scope="row">'.$publicidad['id'].'</th>
                                    <td><img src="'.$publicidad['img'].'" width="250px"></td>
                                    <td><a href="'.$publicidad['url'].'">'.$publicidad['url'].'</a></td>
                                    <td>
                                       <button type="button" id="activar'.$publicidad['id'].'" class="btn btn-success btn-sm" '.$activar.'>Activar</button>
                                       <button type="button" id="desactivar'.$publicidad['id'].'" class="btn btn-warning btn-sm" '.$desactivar.'>Desactivar</button>
                                       <button type="button" id="eliminar'.$publicidad['id'].'" class="btn btn-danger btn-sm" '.$eliminar.'>Eliminar</button>
                                    </td>
                                 </tr>
                                 <script type="text/javascript">
                                 $("#activar'.$publicidad['id'].'").click(function(){
                                     $("#activar'.$publicidad['id'].'").attr("disabled",true);
                                     $("#desactivar'.$publicidad['id'].'").attr("disabled",false);
                                     $("#eliminar'.$publicidad['id'].'").attr("disabled",false);
                                     $("#respuestaEdit").html("<img src=\'https://api.latitudmegalopolis.com/functions/cargando.gif\'>");
                                     $.get("https://api.latitudmegalopolis.com/functions/valores.php",{keycode: "EDITPUBLICIDADTAURINA", id: '.$publicidad['id'].', estatus: 200}, respuestaEditar, "json");
                                  });
                                  $("#desactivar'.$publicidad['id'].'").click(function(){
                                     $("#activar'.$publicidad['id'].'").attr("disabled",false);
                                     $("#desactivar'.$publicidad['id'].'").attr("disabled",true);
                                     $("#eliminar'.$publicidad['id'].'").attr("disabled",false);
                                     $("#respuestaEdit").html("<img src=\'https://api.latitudmegalopolis.com/functions/cargando.gif\'>");
                                     $.get("https://api.latitudmegalopolis.com/functions/valores.php",{keycode: "EDITPUBLICIDADTAURINA", id: '.$publicidad['id'].', estatus: 201}, respuestaEditar, "json");
                                   });
                                   $("#eliminar'.$publicidad['id'].'").click(function(){
                                      $("#activar'.$publicidad['id'].'").attr("disabled",false);
                                      $("#desactivar'.$publicidad['id'].'").attr("disabled",false);
                                      $("#eliminar'.$publicidad['id'].'").attr("disabled",true);
                                      $("#respuestaEdit").html("<img src=\'https://api.latitudmegalopolis.com/functions/cargando.gif\'>");
                                      $.get("https://api.latitudmegalopolis.com/functions/valores.php",{keycode: "EDITPUBLICIDADTAURINA", id: '.$publicidad['id'].', estatus: 202}, respuestaEditar, "json");
                                   });
                                 </script>';
                       }
                    } ?>
                 </tbody>
               </table>

            <?php endif; ?>
         <?php endwhile; else: ?>
            <h3>Error 404 no se encontro el post Solicitado.</h3>
         <?php endif; ?>
         <?php wp_reset_query();?>
      </div>
   </div>
<?php get_footer(); ?>

<script type="text/javascript">
// Evento para agregar publicidad
$("#newPublicidad").click(function(){
  if ($("#valorImg").val() == "" || $("#posicionID").val() == 0 || $("#valorUrl").val() == "") {
    $("#resImg").css("background","rgba(150,80,80,0.5)");
    $("#resImg").css("color","red");
    $("#resImg").css("border","2px solid red");
    $("#resImg").html("Uno o mas campos estan vacios o sin seleccionar<br>Favor de verificar.");
  }else {
    $("#newPublicidad").attr("disabled",true)
    $("#imgCargando").html("<img src='https://api.latitudmegalopolis.com/functions/cargando.gif'>");
    $.get("https://api.latitudmegalopolis.com/functions/valores.php",{keycode: "ADDPUBLICIDADTAURINA", posicion: $("#posicionID").val(), url: $("#valorUrl").val(), img: $("#valorImg").val()}, muestraMensaje, "json");
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

function respuestaEditar(respuesta){
   $("#respuestaEdit").css("background","rgba(80,150,80,0.5)");
   $("#respuestaEdit").css("color","green");
   $("#respuestaEdit").css("border","2px solid green");
   $("#respuestaEdit").css("margin-top","10px");
   $("#respuestaEdit").css("padding","15px");
   $("#respuestaEdit").html(respuesta.Mensaje);
}

//Funcion para detectar el cambio en el spinner
$("#posicionEditar").change(function(){
    window.location.href = "http://latitudmegalopolis.com/valores-publicidad-taurina?publicidadID=" + $("#posicionEditar").val();
});
</script>
