<?php


$errorMSG = "";
$valudPositions = ['Goalkeeper', 'Defender', 'Midfielder', 'Forward'];


/* FIRSTNAME */
if (empty($_POST["firstname"])) {
    $errorMSG = "<li>FIRSTNAME is required</<li>";
}else if(strlen($_POST["username"]) < 10){
    $errorMSG = "<li>FIRSTNAME min 10 charecters</<li>";
}else if(strlen($_POST["username"]) > 20){
    $errorMSG = "<li>FIRSTNAME max 10 charecters</<li>";
}else if(!preg_match("/^[a-zA-Z/'/-\040]+$/",$_POST["firstname"])){
    $errorMSG = "<li>Invalid Characters on firstname</<li>";
}
 else {
    $username = $_POST["firstname"];
}

/* LASTNAME */
if (empty($_POST["lastname"])) {
    $errorMSG = "<li>LASTNAME is required</<li>";
}else if(strlen($_POST["lastname"]) < 10){
    $errorMSG = "<li>LASTNAME min 10 charecters</<li>";
}else if(strlen($_POST["lastname"]) > 20){
    $errorMSG = "<li>LASTNAME max 10 charecters</<li>";
}else if(!preg_match("/^[a-zA-Z/'/-\040]+$/",$_POST["lastname"])){
    $errorMSG = "<li>Invalid Characters on lastname</<li>";
}
 else {
    $username = $_POST["lastname"];
}

/* TEAM */
if( $_POST['team'] == "0" ) {
    $errorMSG = "<li>Select a team</<li>";
  }else{
      $team = $_POST["team"];
  }
  
/* KIT */
if($_POST["kit"] == ""){
    $errorMSG = "<li>Fill a kit field</<li>";
}else if(!is_numeric($_POST["kit"])){
    $errorMSG = "<li>Fill a kit field</<li>";
}else if(strlen($_POST["kit"]) > 2){
    $errorMSG = "<li>Range Permitied 1 - 100</<li>";
}else{
    $kit = $_POST["kit"];
}

/* POSITION */
if (isset($_POST['position']) && in_array($_POST['position'], $valudStates)){
    $position = $_POST['position'];
} else {
    $errorMSG = "<li>Position Invalited</<li>";
}

    

if(empty($errorMSG)){
	$msg = "firstname: ".$firstname.", lastname: ".$lastname.", team: ".$team.", kit:".$kit.", position: ".$position;
	echo json_encode(['code'=>200, 'msg'=>$msg]);
	exit;
}


echo json_encode(['code'=>404, 'msg'=>$errorMSG]);


?>