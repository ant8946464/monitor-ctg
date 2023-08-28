<?php

   namespace App\Controllers;

   require_once './lib/ValidatorFunctions.php';

   use Lib\ValidatorFunctions;


   class Controller{

     
      public function view($route , $data =[]){
         extract($data);
         $route = str_replace('.','/',$route);
         if(file_exists("views/{$route}.php")){
            ob_start();
            include "views/{$route}.php";
            $conten = ob_get_clean();
            return $conten;
         }else {
            return 'El archivo no exite';
         }  
      }

      function getGet($name){
         $validator = new ValidatorFunctions();
         return  isset($_GET[$name]) ? $validator->clean_text($_GET[$name]): null ; 
      }
 
     function getPost($name){
         $validator = new ValidatorFunctions();
         return isset($_POST[$name]) ? $validator->clean_text($_POST[$name]): null ;
     }
   }
?>