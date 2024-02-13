<?php
/*
Template Name: Pagina Valores
*/
?>
<?php
require (TEMPLATEPATH. '/config/configs.php');
require (TEMPLATEPATH. '/config/functions.php');
$connection = dbConnection($db_config);
if (!$connection) {
    header('Location: error.php');
}
$numVisitas = selectLastFrom($connection,"visitas","id");
?>
<?php get_header(); ?>
<div class="container">
   <div class="row" style="margin-top:20px;margin-left:5px;margin-right:5px;background:rgb(240,240,240)">
      <div class="col-12" style="padding:20px;border:2px solid grey;">
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h3 class="text-center">Cambiar imagen de Luy</h3>
            <h5>En la siguiente caja pege la URL de la imgen de Luy, el que comienza con https:// y termina con .jpg o .png y presione el boton guardar.</h5>
            <br>
            <form>
               <div class="form-group">
                 <label for="valorImg">URL de la imagen de Luy</label>
                 <input type="text" class="form-control" id="valorImg" style="width:80%;" placeholder="https://latitudmegalopolis.com/wp-content/uploads/2019/07/IMG-20190727-WA0001.jpg">
                 <div id="imgCargando"></div>
               </div>
               <button type="button" class="btn btn-success" id="enviarImg">Guardar</button>
               <div id="resImg" style="font-weight:700;border-radius:3px;margin-top:20px;padding:20px"></div>
            </form>
         <?php endwhile; else: ?>
            <h3>Error 404 no se encontro el post Solicitado.</h3>
         <?php endif; ?>
         <?php wp_reset_query();?>
      </div>
   </div>

   <div class="row" style="margin-top:20px;margin-left:5px;margin-right:5px;background:rgb(240,240,240)">
      <div class="col-12" style="padding:20px;border:2px solid grey;">
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h3 class="text-center">Cambiar valores de Dolar</h3>
            <h5>En el siguiente formulario se podran cambiar los valores de Compra/Venta del Dolar</h5>
            <br>
            <form>
               <div class="form-group">
                 <label for="compraDolar">Compra Dolar</label>
                 <input type="text" class="form-control" id="compraDolar" style="width:80%;" placeholder="18.00">
                 <div id="imgCargandoCD"></div>
               </div>
               <button type="button" class="btn btn-success" id="enviarCompraDolar">Guardar</button>
               <div id="resCompraDolar" style="font-weight:700;border-radius:3px;margin-top:20px;padding:20px"></div>
            </form>
            <form>
               <div class="form-group">
                 <label for="ventaDolar">Venta Dolar</label>
                 <input type="text" class="form-control" id="ventaDolar" style="width:80%;" placeholder="18.50">
                 <div id="imgCargandoVD"></div>
               </div>
               <button type="button" class="btn btn-success" id="enviarVentaDolar">Guardar</button>
               <div id="resVentaDolar" style="font-weight:700;border-radius:3px;margin-top:20px;padding:20px"></div>
            </form>
         <?php endwhile; else: ?>
            <h3>Error 404 no se encontro el post Solicitado.</h3>
         <?php endif; ?>
         <?php wp_reset_query();?>
      </div>
   </div>

   <div class="row" style="margin-top:20px;margin-left:5px;margin-right:5px;background:rgb(240,240,240)">
      <div class="col-12" style="padding:20px;border:2px solid grey;">
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h3 class="text-center">Cambiar valores de Euro</h3>
            <h5>En el siguiente formulario se podran cambiar los valores de Compra/Venta del Euro</h5>
            <br>
            <form>
               <div class="form-group">
                 <label for="compraEuro">Compra Euro</label>
                 <input type="text" class="form-control" id="compraEuro" style="width:80%;" placeholder="19.00">
                 <div id="imgCargandoCE"></div>
               </div>
               <button type="button" class="btn btn-success" id="enviarCompraEuro">Guardar</button>
               <div id="resCompraEuro" style="font-weight:700;border-radius:3px;margin-top:20px;padding:20px"></div>
            </form>
            <form>
               <div class="form-group">
                 <label for="ventaEuro">Venta Euro</label>
                 <input type="text" class="form-control" id="ventaEuro" style="width:80%;" placeholder="19.80">
                 <div id="imgCargandoVE"></div>
               </div>
               <button type="button" class="btn btn-success" id="enviarVentaEuro">Guardar</button>
               <div id="resVentaEuro" style="font-weight:700;border-radius:3px;margin-top:20px;padding:20px"></div>
            </form>
         <?php endwhile; else: ?>
            <h3>Error 404 no se encontro el post Solicitado.</h3>
         <?php endif; ?>
         <?php wp_reset_query();?>
      </div>
   </div>

   <div class="row" style="margin-top:20px;margin-left:5px;margin-right:5px;background:rgb(240,240,240)">
      <div class="col-12" style="padding:20px;border:2px solid grey;">
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h3 class="text-center">Cambiar valores de las visitas</h3>
            <h5>En el siguiente formulario se puede editar el numero de visitantes</h5>
            <h4>Recordar que el ultimo numero de visitantes es: <b><?php echo $numVisitas[0]["visita"]; ?></b></h4>
            <br>
            <form>
               <div class="form-group">
                 <label for="numVisitas">Numero de visitas:</label>
                 <input type="text" class="form-control" id="numVisitas" style="width:80%;" placeholder="Numero sin comillas ni espacios">
                 <div id="imgCargandoVisitas"></div>
               </div>
               <button type="button" class="btn btn-success" id="enviarVisitas">Guardar</button>
               <div id="resVisitas" style="font-weight:700;border-radius:3px;margin-top:20px;padding:20px"></div>
            </form>
         <?php endwhile; else: ?>
            <h3>Error 404 no se encontro el post Solicitado.</h3>
         <?php endif; ?>
         <?php wp_reset_query();?>
      </div>
   </div>

</div>

<?php get_footer(); ?>

<script type="text/javascript">
// Evento para la imagen de LUY
$("#enviarImg").click(function(){
  if ($("#valorImg").val() == "") {
    $("#resImg").css("background","rgba(150,80,80,0.5)");
    $("#resImg").css("color","red");
    $("#resImg").css("border","2px solid red");
    $("#resImg").html("El campo no puede estar vacio.<br>Favor de verificar.");
  }else {
    $("#enviarImg").attr("disabled",true)
    $("#imgCargando").html("<img src='https://api.latitudmegalopolis.com/functions/cargando.gif'>");
    $.get("https://api.latitudmegalopolis.com/functions/valores.php",{keycode: "EDITIMGLUY",img: $("#valorImg").val()}, muestraMensaje, "json");
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

// Evento para cambiar la compra del Dolar
 $("#enviarCompraDolar").click(function(){
   if ($("#compraDolar").val() == "") {
     $("#resCompraDolar").css("background","rgba(150,80,80,0.5)");
     $("#resCompraDolar").css("color","red");
     $("#resCompraDolar").css("border","2px solid red");
     $("#resCompraDolar").html("El campo no puede estar vacio.<br>Favor de verificar.");
   }else {
     $("#enviarCompraDolar").attr("disabled",true)
     $("#imgCargandoCD").html("<img src='https://api.latitudmegalopolis.com/functions/cargando.gif'>");
     $.get("https://api.latitudmegalopolis.com/functions/valores.php",{keycode: "EDITDIVISA",valor: $("#compraDolar").val(),tipo: "Compra",moneda:"Dolar"}, mensajeCompraDolar, "json");
   }
  });

function mensajeCompraDolar(respuesta){
  if (respuesta.Success) {
    $("#resCompraDolar").css("background","rgba(80,150,80,0.5)");
    $("#resCompraDolar").css("color","green");
    $("#resCompraDolar").css("border","2px solid green");
    $("#resCompraDolar").html(respuesta.Mensaje);
    $("#enviarCompraDolar").attr("disabled",false)
    $("#imgCargandoCD").html("");
  }else {
    $("#resCompraDolar").css("background","rgba(150,80,80,0.5)");
    $("#resCompraDolar").css("color","red");
    $("#resCompraDolar").css("border","2px solid red");
    $("#resCompraDolar").html(respuesta.Error);
    $("#enviarCompraDolar").attr("disabled",false)
    $("#imgCargandoCD").html("");
  }
}
// Evento para cambiar la venta del Dolar
 $("#enviarVentaDolar").click(function(){
   if ($("#ventaDolar").val() == "") {
     $("#resVentaDolar").css("background","rgba(150,80,80,0.5)");
     $("#resVentaDolar").css("color","red");
     $("#resVentaDolar").css("border","2px solid red");
     $("#resVentaDolar").html("El campo no puede estar vacio.<br>Favor de verificar.");
   }else {
     $("#enviarVentaDolar").attr("disabled",true)
     $("#imgCargandoVD").html("<img src='https://api.latitudmegalopolis.com/functions/cargando.gif'>");
     $.get("https://api.latitudmegalopolis.com/functions/valores.php",{keycode: "EDITDIVISA",valor: $("#ventaDolar").val(),tipo: "Venta",moneda:"Dolar"}, mensajeVentaDolar, "json");
   }
  });

function mensajeVentaDolar(respuesta){
  if (respuesta.Success) {
    $("#resVentaDolar").css("background","rgba(80,150,80,0.5)");
    $("#resVentaDolar").css("color","green");
    $("#resVentaDolar").css("border","2px solid green");
    $("#resVentaDolar").html(respuesta.Mensaje);
    $("#enviarVentaDolar").attr("disabled",false)
    $("#imgCargandoVD").html("");
  }else {
    $("#resVentaDolar").css("background","rgba(150,80,80,0.5)");
    $("#resVentaDolar").css("color","red");
    $("#resVentaDolar").css("border","2px solid red");
    $("#resVentaDolar").html(respuesta.Error);
    $("#enviarVentaDolar").attr("disabled",false)
    $("#imgCargandoVD").html("");
  }
}

// Evento para cambiar la compra del Euro
 $("#enviarCompraEuro").click(function(){
   if ($("#compraEuro").val() == "") {
     $("#resCompraEuro").css("background","rgba(150,80,80,0.5)");
     $("#resCompraEuro").css("color","red");
     $("#resCompraEuro").css("border","2px solid red");
     $("#resCompraEuro").html("El campo no puede estar vacio.<br>Favor de verificar.");
   }else {
     $("#enviarCompraEuro").attr("disabled",true)
     $("#imgCargandoCE").html("<img src='https://api.latitudmegalopolis.com/functions/cargando.gif'>");
     $.get("https://api.latitudmegalopolis.com/functions/valores.php",{keycode: "EDITDIVISA",valor: $("#compraEuro").val(),tipo: "Compra",moneda:"Euro"}, mensajeCompraEuro, "json");
   }
  });

function mensajeCompraEuro(respuesta){
  if (respuesta.Success) {
    $("#resCompraEuro").css("background","rgba(80,150,80,0.5)");
    $("#resCompraEuro").css("color","green");
    $("#resCompraEuro").css("border","2px solid green");
    $("#resCompraEuro").html(respuesta.Mensaje);
    $("#enviarCompraEuro").attr("disabled",false)
    $("#imgCargandoCE").html("");
  }else {
    $("#resCompraEuro").css("background","rgba(150,80,80,0.5)");
    $("#resCompraEuro").css("color","red");
    $("#resCompraEuro").css("border","2px solid red");
    $("#resCompraEuro").html(respuesta.Error);
    $("#enviarCompraEuro").attr("disabled",false)
    $("#imgCargandoCE").html("");
  }
}

// Evento para cambiar la venta del Euro
 $("#enviarVentaEuro").click(function(){
   if ($("#ventaEuro").val() == "") {
     $("#resVentaEuro").css("background","rgba(150,80,80,0.5)");
     $("#resVentaEuro").css("color","red");
     $("#resVentaEuro").css("border","2px solid red");
     $("#resVentaEuro").html("El campo no puede estar vacio.<br>Favor de verificar.");
   }else {
     $("#enviarVentaEuro").attr("disabled",true)
     $("#imgCargandoVE").html("<img src='https://api.latitudmegalopolis.com/functions/cargando.gif'>");
     $.get("https://api.latitudmegalopolis.com/functions/valores.php",{keycode: "EDITDIVISA",valor: $("#ventaEuro").val(),tipo: "Venta",moneda:"Euro"}, mensajeVentaEuro, "json");
   }
  });

function mensajeVentaEuro(respuesta){
  if (respuesta.Success) {
    $("#resVentaEuro").css("background","rgba(80,150,80,0.5)");
    $("#resVentaEuro").css("color","green");
    $("#resVentaEuro").css("border","2px solid green");
    $("#resVentaEuro").html(respuesta.Mensaje);
    $("#enviarVentaEuro").attr("disabled",false)
    $("#imgCargandoVE").html("");
  }else {
    $("#resVentaEuro").css("background","rgba(150,80,80,0.5)");
    $("#resVentaEuro").css("color","red");
    $("#resVentaEuro").css("border","2px solid red");
    $("#resVentaEuro").html(respuesta.Error);
    $("#enviarVentaEuro").attr("disabled",false)
    $("#imgCargandoVE").html("");
  }
}

// Evento para cambiar las visitas
$("#enviarVisitas").click(function(){
   if ($("#numVisitas").val() == "") {
     $("#resVisitas").css("background","rgba(150,80,80,0.5)");
     $("#resVisitas").css("color","red");
     $("#resVisitas").css("border","2px solid red");
     $("#resVisitas").html("El campo no puede estar vacio.<br>Favor de verificar.");
   }else if(isNaN($("#numVisitas").val())){
    $("#resVisitas").css("background","rgba(150,80,80,0.5)");
     $("#resVisitas").css("color","red");
     $("#resVisitas").css("border","2px solid red");
     $("#resVisitas").html("Solo se pueden ingresar numeros.<br>Favor de verificar.");
   }else {
     $("#enviarVisitas").attr("disabled",true)
     $("#imgCargandoVisitas").html("<img src='https://api.latitudmegalopolis.com/functions/cargando.gif'>");
     var number = parseInt($("#numVisitas").val(), 10) + 719413;
     $.get("https://api.latitudmegalopolis.com/functions/valores.php",{keycode: "EDITVISITAS",visitas: new Intl.NumberFormat().format(number)}, mensajeVisitas, "json");
   }
  });

function mensajeVisitas(respuesta){
  if (respuesta.Success) {
    $("#resVisitas").css("background","rgba(80,150,80,0.5)");
    $("#resVisitas").css("color","green");
    $("#resVisitas").css("border","2px solid green");
    $("#resVisitas").html(respuesta.Mensaje);
    $("#enviarVisitas").attr("disabled",false)
    $("#imgCargandoVisitas").html("");
  }else {
    $("#resVisitas").css("background","rgba(150,80,80,0.5)");
    $("#resVisitas").css("color","red");
    $("#resVisitas").css("border","2px solid red");
    $("#resVisitas").html(respuesta.Error);
    $("#enviarVisitas").attr("disabled",false)
    $("#imgCargandoVisitas").html("");
  }
}
</script>
