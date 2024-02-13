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

if ($_GET['keycode'] == "NEWUSER") {
    if (isset($_GET['user']) && isset($_GET['name']) && isset($_GET['mail']) && isset($_GET['phone'])) {
        $user = $_GET['user'];
        $mail = $_GET['mail'];
        $name = $_GET['name'];
        $phone = $_GET['phone'];
        $day = date("d");
        $month = date("m");
        $year = date("Y");
        $date = $year . "-" . $month . "-" . $day;
        $insertUser = $connection->prepare("INSERT INTO users (id, user, name, mail, phone, date_create) VALUES (null, :user, :name, :mail, :phone, :date)");
        $insertUser->execute(array('user' => $user,
                                        'name' => $name,
                                        'mail' => $mail,
                                        'phone' => $phone,
                                        'date' => $date));
        $idUser = $connection->lastInsertId();
        if ($idUser > 0){
            $array = array('success' => true,'mensaje' => "Se creo el usuario con exito.\nIDUsuario: ".$idUser);
            $json = json_encode($array);
            print_r($json);
        }else{
            $array = array('success' => false,'mensaje' => "Hubo un error al registrar al usuario. Error(TS-001).");
            $json = json_encode($array);
            print_r($json);
        }
    }else {
        $array = array('success' => false,'mensaje' => "No se recibieron todos los datos para procesar la consulta.");
        $json = json_encode($array);
        print_r($json);
    }
}

if ($_GET['keycode'] == "NEWUSERPOST") {
    if (isset($_POST['user']) && isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['phone']) && isset($_POST['pass'])) {
        $user = $_POST['user'];
        $mail = $_POST['mail'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        //Verificaciones de telefono correo y usaurio
        $verify1 = getDataFromWhere($connection,"users","user",$user);
        $verify2 = getDataFromWhere($connection,"users","mail",$mail);
        $verify3 = getDataFromWhere($connection,"users","phone",$phone);

        if ($verify1[0]['id'] > 0){
            $array = array('success' => false,'mensaje' => "El nombre de usuario ya se encuentra registrado");
            $json = json_encode($array);
            print_r($json);
        }else if ($verify2[0]['id'] > 0){
            $array = array('success' => false,'mensaje' => "El correo ya se encuentra registrado");
            $json = json_encode($array);
            print_r($json);
        }else if ($verify3[0]['id'] > 0){
            $array = array('success' => false,'mensaje' => "El teléfono ya se encuentra registrado");
            $json = json_encode($array);
            print_r($json);
        }else{
            $pass = $_POST['pass'];
            $day = date("d");
            $month = date("m");
            $year = date("Y");
            $date = $year . "-" . $month . "-" . $day;
            $insertUser = $connection->prepare("INSERT INTO users (id, user, name, mail, phone, date_create, pass) VALUES (null, :user, :name, :mail, :phone, :date, :pass)");
            $insertUser->execute(array('user' => $user,
                                            'name' => $name,
                                            'mail' => $mail,
                                            'phone' => $phone,
                                            'date' => $date,
                                            'pass' => $pass));
            $idUser = $connection->lastInsertId();
            if ($idUser > 0){
                $array = array('success' => true,'mensaje' => "Se creo el usuario con exito.\nIDUsuario: ".$idUser);
                $json = json_encode($array);
                print_r($json);
            }else{
                $array = array('success' => false,'mensaje' => "Hubo un error al registrar al usuario. Error(TS-001).");
                $json = json_encode($array);
                print_r($json);
            }
        }
    }else {
        $array = array('success' => false,'mensaje' => "No se recibieron todos los datos para procesar la consulta.");
        $json = json_encode($array);
        print_r($json);
    }
}

if ($_GET['keycode'] == "LOGINPOST") {
    if (isset($_POST['phone']) && isset($_POST['pass'])) {
        $phone = $_POST['phone'];
        $pass = $_POST['pass'];
        $user = getDataFromWhereX2($connection,"users","phone",$phone,"pass",$pass);
        $idUser = $user[0]['id'];
        if ($idUser > 0){
            $array = array('success' => true,'mensaje' => "Logeo exitoso.\nBienvenido ".$user[0]['name']);
            $json = json_encode($array);
            print_r($json);
        }else{
            $array = array('success' => false,'mensaje' => "Verifique sus credenciales.\nCorreo o contraseña incorrectos");
            $json = json_encode($array);
            print_r($json);
        }
    }else {
        $array = array('success' => false,'mensaje' => "No se recibieron todos los datos para procesar la consulta.");
        $json = json_encode($array);
        print_r($json);
    }
}

if ($_GET['keycode'] == "LOGIN") {
    if (isset($_GET['mail']) && isset($_GET['phone'])) {
        $mail = $_GET['mail'];
        $phone = $_GET['phone'];
        $user = getDataFromWhereX2($connection,"users","mail",$mail,"phone",$phone);
        $idUser = $user[0]['id'];
        if ($idUser > 0){
            $array = array('success' => true,'mensaje' => "Logeo exitoso.\nBienvenido ".$user[0]['user']);
            $json = json_encode($array);
            print_r($json);
        }else{
            $array = array('success' => false,'mensaje' => "Verifique sus credenciales.\nCorreo o contraseña incorrectos");
            $json = json_encode($array);
            print_r($json);
        }
    }else {
        $array = array('success' => false,'mensaje' => "No se recibieron todos los datos para procesar la consulta.");
        $json = json_encode($array);
        print_r($json);
    }
}

if ($_GET['keycode'] == "DETAILUSER") {
    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
        $users = getDataFromWhere($connection,"users","phone",$phone);
        if (count($users) > 0){
            $data[0] = [
                "usuario" => $users[0]['user'],
                "nombre" => $users[0]['name'],
                "correo" => $users[0]['mail'],
                "imagen" => $users[0]['img']
            ];
            $array = array('success' => true,'data' => $data);
            $json = json_encode($array);
            print_r($json);
        }else{
            $array = array('success' => false,'mensaje' => "No se encontraron datos para el usuario solicitado");
            $json = json_encode($array);
            print_r($json);
        }
    }else{
        $array = array('success' => false,'mensaje' => "No se recibieron todos los datos para procesar la consulta.");
        $json = json_encode($array);
        print_r($json);
    }
}

if ($_GET['keycode'] == "STORES") {
    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
        $users = getDataFromWhere($connection,"users","phone",$phone);
        if (count($users) > 0){
            $stores = getDataFromWhere($connection,"stores","status",200);
            if (count($stores) > 0){
                $data = [];
                for ($i=0; $i < count($stores); $i++) { 
                    $data[$i] = [
                        "id" => $stores[$i]['id'],
                        "nombre" => $stores[$i]['name'],
                        "categoria" => $stores[$i]['category'],
                        "descripcion" => $stores[$i]['description'],
                        "horario" => $stores[$i]['timetable'],
                        "imagen" => $stores[$i]['picture'],
                        "latitud" => $stores[$i]['lat'],
                        "longitud" => $stores[$i]['lon']
                    ];
                }
                $array = array('success' => true,'data' => $data);
                $json = json_encode($array);
                print_r($json);
            }else{
                $array = array('success' => false,'mensaje' => "No hay tiendas registradas o activas.");
                $json = json_encode($array);
                print_r($json);
            }
        }else{
            $array = array('success' => false,'mensaje' => "Usuario no autorizado para realizar esta acción.");
            $json = json_encode($array);
            print_r($json);
        }
    }else{
        $array = array('success' => false,'mensaje' => "No se recibieron todos los datos para procesar la consulta.");
        $json = json_encode($array);
        print_r($json);
    }
}

if ($_GET['keycode'] == "PRODUCTS") {
    if (isset($_POST['phone']) && isset($_POST['idStore'])) {
        $phone  = $_POST['phone'];
        $users = getDataFromWhere($connection,"users","phone",$phone);
        if (count($users) > 0){
            $idStore = $_POST['idStore'];
            $products = getDataFromWhereX2($connection,"products","store_id",$idStore,"status",200);
            if (count($products) > 0){
                $data = [];
                for ($i=0; $i < count($products); $i++) { 
                    $data[$i] = [
                        "id" => $products[$i]['id'],
                        "nombre" => $products[$i]['name'],
                        "categoria" => $products[$i]['category'],
                        "descripcion" => $products[$i]['description'],
                        "disponible" => $products[$i]['available'],
                        "imagen" => $products[$i]['picture'],
                        "existencias" => $products[$i]['inventory'],
                        "precio" => $products[$i]['price'],
                        "descuento" => $products[$i]['discount']
                    ];
                }
                $array = array('success' => true,'data' => $data);
                $json = json_encode($array);
                print_r($json);
            }else{
                $array = array('success' => false,'mensaje' => "No hay productos para la tienda seleccionada.");
                $json = json_encode($array);
                print_r($json);
            }
        }else{
            $array = array('success' => false,'mensaje' => "Usuario no autorizado para realizar esta acción.");
            $json = json_encode($array);
            print_r($json);
        }
    }else{
        $array = array('success' => false,'mensaje' => "No se recibieron todos los datos para procesar la consulta.");
        $json = json_encode($array);
        print_r($json);
    }
}

if ($_GET['keycode'] == "EXAMEN") {
    if (isset($_POST['phone'])) {
        $phone  = $_POST['phone'];
        $users = getDataFromWhere($connection,"users","phone",$phone);
        if (count($users) > 0){
            $users = getDataFromWhere($connection,"users","status",200);
            if (count($users) > 0){
                $data = [];
                for ($i=0; $i < count($users); $i++) { 
                    $data[$i] = [
                        "id" => $users[$i]['id'],
                        "user" => $users[$i]['user'],
                        "name" => $users[$i]['name'],
                        "mail" => $users[$i]['mail'],
                        "phone" => $users[$i]['phone'],
                        "image" => $users[$i]['img'],
                        "date" => $users[$i]['date_create'],
                        "pass" => $users[$i]['pass']
                    ];
                }
                $array = array('success' => true,'data' => $data);
                $json = json_encode($array);
                print_r($json);
            }else{
                $array = array('success' => false,'mensaje' => "No hay productos para la tienda seleccionada.");
                $json = json_encode($array);
                print_r($json);
            }
        }else{
            $array = array('success' => false,'mensaje' => "Usuario no autorizado para realizar esta acción.");
            $json = json_encode($array);
            print_r($json);
        }
    }else{
        $array = array('success' => false,'mensaje' => "No se recibieron todos los datos para procesar la consulta.");
        $json = json_encode($array);
        print_r($json);
    }
}

?>