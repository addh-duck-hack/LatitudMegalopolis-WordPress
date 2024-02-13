<?php
/*
Template Name: Pagina Valores Advertising
*/
?>
<?php
require (TEMPLATEPATH. '/config/configs.php');
require (TEMPLATEPATH. '/config/functions.php');
$connection = dbConnection($db_config);
if (!$connection) {
    header('Location: error.php');
}
$publicidadArre = getDataFrom($connection,"pagina_publicidad");
$categoriasArre = getDataFromWhere($connection,"categorias_publicidad","status",201);
$publicidadID = -1;
$editarPublicidad = false;
if (isset($_GET["publicidadID"])){
    $publicidadID = $_GET["publicidadID"];
    $publicidadSeleccionada = getDataFromWhere($connection,"pagina_publicidad","id",$publicidadID);
    $publicidadSeleccionada = $publicidadSeleccionada[0];
    $editarPublicidad = true;
}
?>
<?php get_header(); ?>
<div class="container">
<div class="row" style="margin-top:20px;margin-left:5px;margin-right:5px;background:rgb(240,240,240)">
    <div class="col-12" style="padding:20px;border:2px solid grey;">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h3 class="text-center">Nueva publicidad</h3>
        <h5>El siguiente formulario sirve agregar nueva marca a la pagina de publicidad<br>Instrucciones:</h5>
        <h6><ol>
            <li>Llenar el formulario con la informacion de la marca</li>
            <li>Colocar la URL de la imagen de la marca (970 X 200 pixeles)</li>
            <li>Colocar el link a donde va a llevar la publicidad, en caso de no ir a ningun lado colocar #</li>
        </ol></h6>
        <br>
        <form>
            <div class="form-group">
            <label for="valorImg">URL de la imagen de la marca</label>
            <input type="text" class="form-control" id="valorImg" style="width:80%;" placeholder="https://latitudmegalopolis.com/wp-content/uploads/2019/07/IMG-20190727-WA0001.jpg" value="<?php echo $publicidadSeleccionada['picture'];?>">
            <br>
            <label for="valorUrl">Link de la publicidad</label>
            <input type="text" class="form-control" id="valorUrl" style="width:80%;" placeholder="https://paginadestino.com/link"  value="<?php echo $publicidadSeleccionada['url'];?>">
            <br>
            <label for="valorName">Nombre de la marca</label>
            <input type="text" class="form-control" id="valorName" style="width:80%;"  value="<?php echo $publicidadSeleccionada['name'];?>">
            <br>
            <label for="valorDescription">Descipcion de la marca</label>
            <input type="text" class="form-control" id="valorDecription" style="width:80%;" value="<?php echo $publicidadSeleccionada['description'];?>">
            <br>
            <label for="categoryName">Seleccione en donde se va a colocar la publicidad</label><br>
            <select name="categoryName" id="categoryName" class="custom-select">
                <option value="0" <?php if (!isset($publicidadID)) {
                   echo "selected";
                } ?>>Seleccione categoria</option>
                <?php
                    foreach($categoriasArre as $categoria){
                        if ($publicidadSeleccionada['category'] == $categoria['name']){
                            echo '<option value="'.$categoria['name'].'" selected>'.$categoria['name'].'</option>';
                        }else{
                            echo '<option value="'.$categoria['name'].'">'.$categoria['name'].'</option>';
                        }
                    }
                ?>
            </select><br><br>
            <label for="positionBool">¿Se va a mostrar en carousel principal?</label><br>
            <select name="positionBool" id="positionBool" class="custom-select">
                <option value="0" <?php if ($publicidadSeleccionada['position'] == 0) {
                   echo "selected";
                } ?>>No</option>
                <option value="1" <?php if ($publicidadSeleccionada['position'] == 1) {
                   echo "selected";
                } ?>>Si</option>
            </select><br><br>
            <label for="colorFondo">Color de fondo</label><br>
            <select name="colorFondo" id="colorFondo" class="custom-select">
                <option value="#000000" <?php if ($publicidadSeleccionada['color'] == "#000000") {
                   echo "selected";
                } ?>>Negro</option>
                <option value="#DA0103" <?php if ($publicidadSeleccionada['color'] == "#DA0103") {
                   echo "selected";
                } ?>>Rojo</option>
                <option value="#00D0FD" <?php if ($publicidadSeleccionada['color'] == "#00D0FD") {
                   echo "selected";
                } ?>>Azul</option>
            </select><br><br>
            <div id="imgCargando"></div>
            </div>
            <?php
                if ($editarPublicidad){
                    echo '<input type="text" class="form-control" id="valorId" hidden  value="'.$publicidadSeleccionada['id'].'">';
                    echo '<button type="button" class="btn btn-success" id="editPublicidad">Editar publicidad</button>';
                    echo '<br><br><button type="button" class="btn btn-success" id="recargar">Nueva Publicidad</button>';
                }else{
                    echo '<button type="button" class="btn btn-success" id="newPublicidad">Crear publicidad</button>';
                }
            ?>
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
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-light">
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Marca</th>
                <th scope="col">Categoria</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach($publicidadArre as $publicidad){
                    echo '<tr class="text-center" id="row'.$publicidad['id'].'">
                            <th scope="row">'.$publicidad['id'].'</th>
                            <td>'.$publicidad['name'].'</td>
                            <td>'.$publicidad['category'].'</td>
                            <td>
                                <button type="button" id="editar'.$publicidad['id'].'" class="btn btn-success btn-sm">Editar</button>
                                <button type="button" id="eliminar'.$publicidad['id'].'" class="btn btn-danger btn-sm">Eliminar</button>
                            </td>
                            </tr>
                            <script type="text/javascript">
                            $("#editar'.$publicidad['id'].'").click(function(){
                                $("#respuestaEdit").html("<img src=\'https://api.latitudmegalopolis.com/functions/cargando.gif\'>");
                                window.location.href = "https://latitudmegalopolis.com/agregar-publicidad/?publicidadID='.$publicidad['id'].'";
                            });
                            $("#eliminar'.$publicidad['id'].'").click(function(){
                                $("#row'.$publicidad['id'].'").remove()
                                $("#respuestaEdit").html("<img src=\'https://api.latitudmegalopolis.com/functions/cargando.gif\'>");
                                $.get("https://api.latitudmegalopolis.com/functions/valores-publicidad.php",{keycode: "DELETEPUBLICIDAD", id: '.$publicidad['id'].'}, respuestaEditar, "json");
                            });
                            </script>';
                }
            ?>
            </tbody>
        </table>
        <div id="respuestaEdit"></div>
      </div>
    </div>
<?php get_footer(); ?>

<script type="text/javascript">
// Evento para agregar publicidad
$("#newPublicidad").click(function(){
  if ($("#valorImg").val() == "" || $("#categoryName").val() == 0 || $("#valorUrl").val() == "") {
    $("#resImg").css("background","rgba(150,80,80,0.5)");
    $("#resImg").css("color","red");
    $("#resImg").css("border","2px solid red");
    $("#resImg").html("Uno o mas campos estan vacios o sin seleccionar<br>Favor de verificar.");
  }else {
    $("#newPublicidad").attr("disabled",true)
    $("#imgCargando").html("<img src='https://api.latitudmegalopolis.com/functions/cargando.gif'>");
    $.get("https://api.latitudmegalopolis.com/functions/valores-publicidad.php",{keycode: "NEWPUBLICIDAD",
                                                                                picture: $("#valorImg").val(),
                                                                                url: $("#valorUrl").val(),
                                                                                name: $("#valorName").val(),
                                                                                description: $("#valorDecription").val(),
                                                                                position: $("#positionBool").val(),
                                                                                category: $("#categoryName").val(),
                                                                                color: $("#colorFondo").val()}, muestraMensaje, "json");
  }
 });

 $("#recargar").click(function(){
    window.location.href = "http://latitudmegalopolis.com/agregar-publicidad/";
 });

 $("#editPublicidad").click(function(){
  if ($("#valorImg").val() == "" || $("#categoryName").val() == 0 || $("#valorUrl").val() == "") {
    $("#resImg").css("background","rgba(150,80,80,0.5)");
    $("#resImg").css("color","red");
    $("#resImg").css("border","2px solid red");
    $("#resImg").html("Uno o mas campos estan vacios o sin seleccionar<br>Favor de verificar.");
  }else {
    $("#imgCargando").html("<img src='https://api.latitudmegalopolis.com/functions/cargando.gif'>");
    $.get("https://api.latitudmegalopolis.com/functions/valores-publicidad.php",{keycode: "EDITPUBLICIDAD",
                                                                                id: $("#valorId").val(),
                                                                                picture: $("#valorImg").val(),
                                                                                url: $("#valorUrl").val(),
                                                                                name: $("#valorName").val(),
                                                                                description: $("#valorDecription").val(),
                                                                                position: $("#positionBool").val(),
                                                                                category: $("#categoryName").val(),
                                                                                color: $("#colorFondo").val()}, muestraMensajeEdit, "json");
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
     window.location.href = "http://latitudmegalopolis.com/agregar-publicidad/";
   }else {
     $("#resImg").css("background","rgba(150,80,80,0.5)");
     $("#resImg").css("color","red");
     $("#resImg").css("border","2px solid red");
     $("#resImg").html(respuesta.Error);
     $("#enviarImg").attr("disabled",false)
     $("#imgCargando").html("");
   }
}

function muestraMensajeEdit(respuesta){
   if (respuesta.Success) {
     $("#resImg").css("background","rgba(80,150,80,0.5)");
     $("#resImg").css("color","green");
     $("#resImg").css("border","2px solid green");
     $("#resImg").html(respuesta.Mensaje);
     $("#enviarImg").attr("disabled",false)
     $("#imgCargando").html("");
     window.location.href = "http://latitudmegalopolis.com/agregar-publicidad?publicidadID=" + $("#valorId").val();
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
            window.location.href = "http://latitudmegalopolis.com/valores-publicidad?publicidadID=" + $("#posicionEditar").val();
	});
</script>
