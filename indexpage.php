<?php 

include_once 'includes/User.php';
include_once 'includes/UserSession.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
   // echo "Session Exist";
   $user->setUser($userSession->getCurrentUser());
   include_once 'index.php';
}else if(isset($_POST['username']) && isset($_POST['password'])){
   // echo "Login validate";

   $userForm = $_POST['username'];
   $passForm = $_POST['password'];

   if($user->userExists($userForm,$passForm)){
      // echo "User Validated";
      $userSession->setCurrentUser($userForm);
      $user->setUser($userForm);
      include_once 'index.php';
   }else{
       $errorLogin = "Credentials Incorrect";
       include_once "login.php";
   }

}else{
   // echo "Login";
    include_once 'login.php';
}

?>