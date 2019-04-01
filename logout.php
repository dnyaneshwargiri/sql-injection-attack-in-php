<?php
   session_start();
   /*destroying session data after logout*/
   if(session_destroy()) {
      header("Location: index.php");
   }
?>
