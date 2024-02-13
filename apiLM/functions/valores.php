<?php
require '../config/configs.php';
require '../config/functions.php';

// Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

$connection = dbConnection($db_config);
if (!$connection) {
  header('Location: error.php');
}

if ($_GET['keycode'] == "EDITIMGLUY") {
  if (isset($_GET['img'])) {
    $urlImg = $_GET['img'];
    $dia = date("d");
    $mes = date("m");
    $year = date("Y");
    $fecha = $year . "-" . $mes . "-" . $dia;
    $updateImagen = $connection->prepare("INSERT INTO img_luy (id_img,url_img,fecha_img) VALUES (null, :url, :fecha)");
    $updateImagen->execute(array(':url' => $urlImg, ':fecha' => $fecha));

    $idImg = $connection->lastInsertId();
    if ($idImg > 0) {
      $array = array('Success' => true,'Mensaje' => "Se actualizo correctamente la imagen, ya se puede visualizar en la pagina principal.<br>Fecha de actualizacion: ".$fecha."<br>Identificador de la imagen: ".$idImg);
      $json = json_encode($array);
      print_r($json);
    }else {
      $array = array('Success' => false,'Error' => "Hubo un error al subir la imagen intentelo de nuevo. Error(EIL-001).");
      $json = json_encode($array);
      print_r($json);
    }
  }else {
    $array = array('Success' => false,'Error' => "No se recibieron todos los datos para procesar la consulta.");
    $json = json_encode($array);
    print_r($json);
  }
}

if ($_GET['keycode'] == "EDITDIVISA") {
  if (isset($_GET['valor']) && isset($_GET['tipo']) && isset($_GET['moneda'])) {
    $valor = $_GET['valor'];
    $tipo = $_GET['tipo'];
    $moneda = $_GET['moneda'];
    $dia = date("d");
    $mes = date("m");
    $year = date("Y");
    $fecha = $year . "-" . $mes . "-" . $dia;
    $updateDivisa = $connection->prepare("INSERT INTO divisas (id_divisa,tipo_divisa,moneda_divisa,valor_divisa,fecha_divisa) VALUES (null, :tipo, :moneda, :valor, :fecha)");
    $updateDivisa->execute(array(':tipo' => $tipo, ':moneda' => $moneda, ':valor' => $valor, ':fecha' => $fecha));

    $idDiv = $connection->lastInsertId();
    if ($idDiv > 0) {
      $array = array('Success' => true,'Mensaje' => "Se actualizo correctamente la ".$tipo." del ".$moneda." con el valor: $".$valor."<br>Fecha de actualizacion: ".$fecha."<br>Identificador de la divisa: ".$idDiv);
      $json = json_encode($array);
      print_r($json);
    }else {
      $array = array('Success' => false,'Error' => "Hubo un error al actualizar la divisa intentelo de nuevo. Error(DIV-002).");
      $json = json_encode($array);
      print_r($json);
    }
  }else {
    $array = array('Success' => false,'Error' => "No se recibieron todos los datos para procesar la consulta.");
    $json = json_encode($array);
    print_r($json);
  }
}

if ($_GET['keycode'] == "EDITVISITAS") {
  if (isset($_GET['visitas'])) {
    $visitas = $_GET['visitas'];
    $dia = date("d");
    $mes = date("m");
    $year = date("Y");
    $fecha = $year . "-" . $mes . "-" . $dia;
    $updateVisitas = $connection->prepare("INSERT INTO visitas (id,visita,fecha_visitas) VALUES (null, :visitas, :fecha)");
    $updateVisitas->execute(array(':visitas' => $visitas,':fecha' => $fecha));

    $idVis = $connection->lastInsertId();
    if ($idVis > 0) {
      $array = array('Success' => true,'Mensaje' => "Se actualizo correctamente el numero de visitantes a ".$visitas."<br>Fecha de actualizacion: ".$fecha."<br>Identificador del cambio: ".$idDiv);
      $json = json_encode($array);
      print_r($json);
    }else {
      $array = array('Success' => false,'Error' => "Hubo un error al actualizar las visitas intentelo de nuevo. Error(VIS-002).");
      $json = json_encode($array);
      print_r($json);
    }
  }else {
    $array = array('Success' => false,'Error' => "No se recibieron todos los datos para procesar la consulta.");
    $json = json_encode($array);
    print_r($json);
  }
}

if ($_GET['keycode'] == "SUMVISITAS") {
  $visitas = selectLastFrom($connection,"visitas","id");
  $visitas = $visitas[0]["visita"] + 1;
  $dia = date("d");
  $mes = date("m");
  $year = date("Y");
  $fecha = $year . "-" . $mes . "-" . $dia;
  $updateVisitas = $connection->prepare("INSERT INTO visitas (id,visita,fecha_visitas) VALUES (null, :visitas, :fecha)");
  $updateVisitas->execute(array(':visitas' => $visitas,':fecha' => $fecha));

  $idVis = $connection->lastInsertId();
  if ($idVis > 0) {
    $array = array('Success' => true,'Mensaje' => "Se actualizo correctamente el numero de visitantes a ".$visitas."<br>Fecha de actualizacion: ".$fecha."<br>Identificador del cambio: ".$idVis);
    $json = json_encode($array);
    print_r($json);
  }else {
    $array = array('Success' => false,'Mensaje' => "Hubo un error al actualizar las visitas intentelo de nuevo. Error(VIS-002).");
    $json = json_encode($array);
    print_r($json);
  }
}

if ($_GET['keycode'] == "EDITCOLUMNISTA") {
  if (isset($_GET['img']) && isset($_GET['posicion']) && isset($_GET['autor'])) {
    $urlImg = $_GET['img'];
    $posicion = $_GET['posicion'];
    $autor = $_GET['autor'];
    $dia = date("d");
    $mes = date("m");
    $year = date("Y");
    $fecha = $year . "-" . $mes . "-" . $dia;
    $updateColumnista = $connection->prepare("INSERT INTO columnistas (id_columnista, nombre_columnista, foto_columnista, posicion_columnista, fecha_columnista) VALUES (null, :autor, :url, :posicion, :fecha)");
    $updateColumnista->execute(array(':autor' => $autor,
                                    ':url' => $urlImg,
                                    ':posicion' => $posicion,
                                    ':fecha' => $fecha));

    $idColumnista = $connection->lastInsertId();
    if ($idColumnista > 0) {
      $array = array('Success' => true,'Mensaje' => "Se actualizo correctamente el columista en la posicion ".$posicion.", ya se puede visualizar en la pagina principal.<br>Fecha de actualizacion: ".$fecha."<br>Identificador del columnista: ".$idColumnista);
      $json = json_encode($array);
      print_r($json);
    }else {
      $array = array('Success' => false,'Error' => "Hubo un error al subir la imagen intentelo de nuevo. Error(EDC-001).");
      $json = json_encode($array);
      print_r($json);
    }
  }else {
    $array = array('Success' => false,'Error' => "No se recibieron todos los datos para procesar la consulta.");
    $json = json_encode($array);
    print_r($json);
  }
}

if ($_GET['keycode'] == "ADDPUBLICIDAD") {
  if (isset($_GET['img']) && isset($_GET['posicion']) && isset($_GET['url'])) {
    $urlImg = $_GET['img'];
    $posicion = $_GET['posicion'];
    $url = $_GET['url'];
    $dia = date("d");
    $mes = date("m");
    $year = date("Y");
    $fecha = $year . "-" . $mes . "-" . $dia;
    $updatePublicidad = $connection->prepare("INSERT INTO publicidad (id_publicidad, img_publicidad, url_publicidad, posicion_publicidad, estatus_publicidad, fecha_publicidad) VALUES (null, :img, :url, :posicion, 200, :fecha)");
    $updatePublicidad->execute(array(':img' => $urlImg,
                                    ':url' => $url,
                                    ':posicion' => $posicion,
                                    ':fecha' => $fecha));

    $idPublicidad = $connection->lastInsertId();
    if ($idPublicidad > 0) {
      switch ($posicion) {
        case 1:
          $posicionStr = "Latitud TV";
          break;
        case 2:
          $posicionStr = "Megalópolis";
          break;
        case 3:
          $posicionStr = "Estados";
          break;
        case 4:
          $posicionStr = "Contra portada";
          break;
        case 5:
          $posicionStr = "Tinta rosa";
          break;
        case 6:
          $posicionStr = "Orgullo MX";
          break;
        case 7:
          $posicionStr = "Reportajes";
          break;
        case 8:
          $posicionStr = "Cultura";
          break;
        case 9:
          $posicionStr = "Entretenimiento";
          break;
        case 10:
          $posicionStr = "Deportes";
          break;
        case 11:
          $posicionStr = "Principal";
          break;
        case 12:
          $posicionStr = "Cocina";
          break;
        case 13:
          $posicionStr = "Negocios";
          break;
      }

      $array = array('Success' => true,'Mensaje' => "Se actualizo correctamente la publicidad en la seccion de ".$posicionStr.", ya se puede visualizar en la pagina principal.<br>Fecha de actualizacion: ".$fecha."<br>Identificador de publicidad: ".$idPublicidad);
      $json = json_encode($array);
      print_r($json);
    }else {
      $array = array('Success' => false,'Error' => "Hubo un error al subir la imagen intentelo de nuevo. Error(ADP-001).");
      $json = json_encode($array);
      print_r($json);
    }
  }else {
    $array = array('Success' => false,'Error' => "No se recibieron todos los datos para procesar la consulta.");
    $json = json_encode($array);
    print_r($json);
  }
}

if ($_GET['keycode'] == "EDITPUBLICIDAD") {
  if (isset($_GET['id']) && isset($_GET['estatus'])) {
    $id = $_GET['id'];
    $estatus = $_GET['estatus'];
    $dia = date("d");
    $mes = date("m");
    $year = date("Y");
    $fecha = $year . "-" . $mes . "-" . $dia;
    $updatePublicidad = $connection->prepare("UPDATE publicidad SET estatus_publicidad = ".$estatus.", fecha_publicidad = ".$fecha." WHERE id_publicidad = ".$id);
    $updatePublicidad->execute();
    $idPublicidad = $updatePublicidad->rowCount();
     if ($idPublicidad > 0) {
        $array = array('Success' => true,'Mensaje' => "Se actualizo correctamente la publicidad.<br>Fecha de actualizacion: ".$fecha."<br>Identificador de publicidad: ".$id);
       $json = json_encode($array);
       print_r($json);
     }else {
         $array = array('Success' => false,'Mensaje' => "No edito nada o se pulso un boton incorrecto(ADP-002).");
         $json = json_encode($array);
         print_r($json);
       }
  }else {
    $array = array('Success' => false,'Error' => "No se recibieron todos los datos para procesar la consulta.");
    $json = json_encode($array);
    print_r($json);
  }
}




 ?>
