<?php
include_once 'ConectionVUE.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$team = (isset($_POST['team'])) ? $_POST['team'] : '';
$player = (isset($_POST['player'])) ? $_POST['player'] : '';
$stock = (isset($_POST['stock'])) ? $_POST['stock'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO jerseys (team, player, stock) VALUES('$team', '$player', '$stock') ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                
        break;
    case 2:
        $consulta = "UPDATE jerseys SET team='$team', player='$player', stock='$stock' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM jerseys WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;         
    case 4:
        $consulta = "SELECT id, team, player, stock FROM jerseys";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;