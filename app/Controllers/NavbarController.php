<?php

   namespace App\Controllers;

 
   require_once 'Controller.php';
 

   

   class NavbarController extends Controller  {

      public function index(){
         return $this->view('navbar');
      }


    
   }

?>