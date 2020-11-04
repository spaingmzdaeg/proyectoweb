<?php  
 //check_session.php  
 session_start();
 if(isset($_SESSION["name"]))  
 {  
      echo '0';     //session not expired       
 }  
 else  
 {  
      echo '1';     //session expired  
      session_unset();
      session_destroy();
     // header("location: ../index.php");
 }
 ?>