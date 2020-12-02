<?php
$errorMSG = "";
$valudPositions = ['Goalkeeper', 'Defender', 'Midfielder', 'Forward'];


/* FIRSTNAME */
if (empty($_POST["first_name"])) {
    $errorMSG = "<li>FIRSTNAME is required</<li>";
}else if(strlen($_POST["first_name"]) < 5){
    $errorMSG = "<li>FIRSTNAME min 5 charecters</<li>";
}else if(strlen($_POST["first_name"]) > 20){
    $errorMSG = "<li>FIRSTNAME max 20 charecters</<li>";
}else if(!preg_match("/^[a-zA-Z/'/-\040]+$/",$_POST["first_name"])){
    $errorMSG = "<li>Invalid Characters on firstname</<li>";
}
 else {
    $first_name = $_POST["first_name"];
}

/* LASTNAME */
if (empty($_POST["last_name"])) {
    $errorMSG .= "<li>LASTNAME is required</<li>";
}else if(strlen($_POST["last_name"]) < 5){
    $errorMSG .= "<li>LASTNAME min 5 charecters</<li>";
}else if(strlen($_POST["last_name"]) > 20){
    $errorMSG .= "<li>LASTNAME max 20 charecters</<li>";
}else if(!preg_match("/^[a-zA-Z/'/-\040]+$/",$_POST["last_name"])){
    $errorMSG .= "<li>Invalid Characters on lastname</<li>";
}
 else {
    $last_name = $_POST["last_name"];
}

/* TEAM */
if($_POST["id_team"] == "0") {
    $errorMSG .= "<li>Select a team</<li>";
  }else{
      $id_team = $_POST["id_team"];
  }
  
/* KIT */
if($_POST["kit"] == ""){
    $errorMSG .= "<li>Fill a kit field</<li>";
}else if(!is_numeric($_POST["kit"])){
    $errorMSG .= "<li>Fill a kit field</<li>";
}else if(strlen($_POST["kit"]) > 2){
    $errorMSG .= "<li>Range Permitied 1 - 100</<li>";
}else{
    $kit = $_POST["kit"];
}

/* POSITION */
if (isset($_POST['position']) && in_array($_POST['position'], $valudPositions)){
    $position = $_POST['position'];
} else {
    $errorMSG .= "<li>Position Invalited</<li>";
}

    

if(empty($errorMSG)){
	$msg = "first_name: ".$first_name.", last_name: ".$last_name.", id_team: ".$id_team.", kit:".$kit.", position: ".$position;
	echo json_encode(['code'=>200, 'msg'=>$msg]);
	exit;
}


echo json_encode(['code'=>404, 'msg'=>$errorMSG]);


?>