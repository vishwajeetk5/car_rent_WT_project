<?php
   session_start();
   
   if(session_destroy()) {
      header("Location:login.html");
      echo "loged out succesfully!";
   }
?>