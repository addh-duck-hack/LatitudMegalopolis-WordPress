<?php
  function dbConnection($db_config){
    try{
      $connection = new PDO('mysql:host='.$db_config['host'].';dbname='.$db_config['dbname'],$db_config['user'],$db_config['pass']);
      return $connection;
    }catch(PDOException $e){
      return false;
    }
  }
  function getDataFrom($con,$table){
    $data = $con->prepare("SELECT * FROM $table");
    $data->execute();
    return $data->fetchAll();
  }
  function getDataFromLimit($con,$table,$order,$limit){
    $data = $con->prepare("SELECT * FROM $table ORDER BY $order DESC LIMIT $limit");
    $data->execute();
    return $data->fetchAll();
  }
  function getDataFromWhere($con,$table,$row,$data){
    $res = $con->prepare('SELECT * FROM '.$table.' WHERE '.$row.' = :'.$row);
    $res->execute(array(':'.$row => $data));
    return $res->fetchAll();
  }
  function getDataFromWhereX2($con,$table,$row,$data,$row2,$data2){
    $res = $con->prepare('SELECT * FROM '.$table.' WHERE '.$row.' = :'.$row.' AND '.$row2.' = :'.$row2);
    $res->execute(array(':'.$row => $data, ':'.$row2 => $data2));
    return $res->fetchAll();
  }
  function deleteFromWhere($con,$table,$row,$data){
    $res = $con->prepare('DELETE FROM '.$table.' WHERE '.$row.' = :'.$row);
    $res->execute(array(':'.$row => $data));
  }
  function selectLastFrom($con,$table,$id){
    $data = $con->prepare('SELECT * FROM '.$table.' ORDER BY '.$id.' DESC LIMIT 1');
    $data->execute();
    return $data->fetchAll();
  }
  function selectLastFromWhere($con,$table,$id,$cond,$valor){
    $data = $con->prepare('SELECT * FROM '.$table.' WHERE '.$cond.' = :condicion ORDER BY '.$id.' DESC LIMIT 1');
    $data->execute(array(':condicion' => $valor));
    return $data->fetchAll();
  }
  function selectLastFromWhereX2($con,$table,$id,$cond1,$cond2){
    $data = $con->prepare('SELECT * FROM '.$table.' WHERE tipo_divisa = :tipo AND moneda_divisa = :moneda ORDER BY '.$id.' DESC LIMIT 1');
    $data->execute(array(':tipo' => $cond1,':moneda' => $cond2));
    return $data->fetchAll();
  }

 ?>
