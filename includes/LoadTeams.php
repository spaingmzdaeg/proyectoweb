<?php 
require_once 'Conection.php';

function getTeams(){
  $mysqli = getConn();
  //$query = $this->conn->prepare('SELECT * FROM users WHERE username = :user AND password = :pass');
  $query = 'SELECT * FROM `teams`';
  $result = $mysqli->query($query);
  $listas = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $listas .= "<option value='$row[id_team]'>$row[club]</option>";
  }
  return $listas;
}

echo getTeams();

?>