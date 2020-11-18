<?php


$errorMSG = "";


/* USERNAME */
if (empty($_POST["username"])) {
    $errorMSG = "<li>USERNAME is required</<li>";
}else if(strlen($_POST["username"]) < 10){
    $errorMSG = "<li>USERNAME min 10 charecters</<li>";
}else if(strlen($_POST["username"]) > 20){
    $errorMSG = "<li>USERNAME max 10 charecters</<li>";
}
 else {
    $username = $_POST["username"];
}


/* EMAIL */
if (empty($_POST["email"])) {
    $errorMSG .= "<li>Email is required</li>";
} else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $errorMSG .= "<li>Invalid email format</li>";
}else {
    $email = $_POST["email"];
}


/* password */
if (empty($_POST["password"])) {
    $errorMSG .= "<li>Password is required</li>";
}else if(strlen($_POST["password"]) < 10){
    $errorMSG = "<li>PASSWORD max 10 charecters</<li>";
}else if(strlen($_POST["password"]) > 20){
    $errorMSG = "<li>PASSWORD max 20 characters</<li>";
}
else {
    $password = $_POST["password"];
}

/* password */
if (empty($_POST["confpassword"])) {
    $errorMSG .= "<li>confPassword is required</li>";
}else if(strlen($_POST["confpassword"]) < 10){
    $errorMSG = "<li>confPASSWORD max 10 characters</<li>";
}else if(strlen($_POST["confpassword"]) > 20){
    $errorMSG = "<li>confPASSWORD max 20 characters</<li>";
}
else {
    $confpassword = $_POST["confpassword"];
}

/* passwords */
if($_POST["password"] != $_POST["confpassword"]){
    $errorMSG .= "<li>diferent passwords</li>";
}

/* checkbox* */
if(!isset($_POST['exampleCheck1'])){
    $errorMSG .= "<li>check terms please</li>";
}

/* captcha* */
if(!isset($_POST['g-recaptcha-response'])){

    $errorMSG .= '<li>Please check the the captcha form.</li>';
}else{
        $captcha=$_POST['g-recaptcha-response'];
    }

    

if(empty($errorMSG)){
	$msg = "username: ".$username.", email: ".$email.", password: ".$password.", confpassword:".$confpassword;
	echo json_encode(['code'=>200, 'msg'=>$msg]);
	exit;
}


echo json_encode(['code'=>404, 'msg'=>$errorMSG]);


?>