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

if ($_GET['keycode'] == "NEWPUBLICIDAD") {
    if (isset($_GET['picture']) && isset($_GET['url']) && isset($_GET['name']) && isset($_GET['description']) && isset($_GET['category']) && isset($_GET['color'])) {
        $picture = $_GET['picture'];
        $url = $_GET['url'];
        $name = $_GET['name'];
        $description = $_GET['description'];
        $catregory = $_GET['category'];
        $color = $_GET['color'];
        $position = 0;
        if (isset($_GET['position'])){
            $posicion = $_GET['position'];
        }
        $day = date("d");
        $month = date("m");
        $year = date("Y");
        $date = $year . "-" . $month . "-" . $day;
        $insertAdvertising = $connection->prepare("INSERT INTO pagina_publicidad (id, picture, url, name, description, category, position, date, color, status) VALUES (null, :picture, :url, :name, :description, :category, :position, :date, :color, 201)");
        $insertAdvertising->execute(array('picture' => $picture,
                                        'url' => $url,
                                        'name' => $name,
                                        'description' => $description,
                                        'category' => $catregory,
                                        'position' => $position,
                                        'date' => $date,
                                        'color' => $color));
        $idAdvertising = $connection->lastInsertId();
        if ($idAdvertising > 0){
            $array = array('Success' => true,'Mensaje' => "Se agrego corectamente la publicidad ya se puedee visualizar en la pagina de publicidad.<br>Fecha de actualizacion: ".$date."<br>Identificador de la imagen: ".$idAdvertising);
            $json = json_encode($array);
            print_r($json);
        }else{
            $array = array('Success' => false,'Error' => "Hubo un error al agregar la publicidad. Error(VP-001).");
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
    if (isset($_GET['id']) && isset($_GET['picture']) && isset($_GET['url']) && isset($_GET['name']) && isset($_GET['description']) && isset($_GET['category']) && isset($_GET['color'])) {
        $id = $_GET['id'];
        $picture = $_GET['picture'];
        $url = $_GET['url'];
        $name = $_GET['name'];
        $description = $_GET['description'];
        $catregory = $_GET['category'];
        $color = $_GET['color'];
        $position = 0;
        if (isset($_GET['position'])){
            $position = $_GET['position'];
        }
        $day = date("d");
        $month = date("m");
        $year = date("Y");
        $date = $year . "-" . $month . "-" . $day;
        $insertAdvertising = $connection->prepare("UPDATE pagina_publicidad SET picture = :picture, url = :url, name = :name, description = :description, category = :category, position = :position, date = :date, color = :color WHERE id = :id");
        $insertAdvertising->execute(array('picture' => $picture,
                                        'url' => $url,
                                        'name' => $name,
                                        'description' => $description,
                                        'category' => $catregory,
                                        'position' => $position,
                                        'date' => $date,
                                        'color' => $color,
                                        'id' => $id));
        $idAdvertising = $insertAdvertising->rowCount();
        if ($idAdvertising > 0){
            $array = array('Success' => true,'Mensaje' => "La publicidad fue actualizada con exito.<br>Fecha de actualizacion: ".$date."<br>ID publicidad: ".$id);
            $json = json_encode($array);
            print_r($json);
        }else{
            $array = array('Success' => false,'Error' => "Hubo un error al agregar la publicidad. Error(VP-003).");
            $json = json_encode($array);
            print_r($json);
        }
    }else {
        $array = array('Success' => false,'Error' => "No se recibieron todos los datos para procesar la consulta.");
        $json = json_encode($array);
        print_r($json);
      }
}

if ($_GET['keycode'] == "DELETEPUBLICIDAD") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $delete = $connection->prepare("DELETE FROM pagina_publicidad WHERE id = :id");
        $delete->execute(array('id' => $id));
        $deleteRow = $delete->rowCount();
        if ($deleteRow > 0) {
            $array = array('Success' => true,'Mensaje' => "La publicidad se elimino correctamente");
            $json = json_encode($array);
            print_r($json);
        }else{
            $array = array('Success' => false,'Error' => "No se pudo eliminar el elemento. Error(VP-002).");
            $json = json_encode($array);
            print_r($json);
        }
    }else{
        $array = array('Success' => false,'Error' => "El ID no se envio correctamente");
        $json = json_encode($array);
        print_r($json);
    }
}
 ?>