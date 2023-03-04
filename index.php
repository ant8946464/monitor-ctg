<?php
   error_reporting(0);
   session_start();
   $actualsesion = $_SESSION['correo'];
   if($actualsesion == null || $actualsesion == ''){
      header('location: views/login.php');
     
   }else{
        // header('location: views/usuarios/index.php');
        echo 'entro';
   }

 
?>
