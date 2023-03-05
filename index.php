<?php
   require_once 'config/session.php';


   error_reporting(0);

    $session = new  Session();

   $actualsesion = $session->getSessionParam('user');
   if($actualsesion == null || $actualsesion == ''){
      header('location: views/login.php');
      
   }else{
        // header('location: views/usuarios/index.php');
        echo 'entro';
   }

 
?>
