<?php

   namespace App\Controllers;

   class Controller {


      public function view($route , $data =[]){
     var_dump($route );
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
   }
?>