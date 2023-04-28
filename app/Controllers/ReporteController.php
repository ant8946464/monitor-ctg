<?php

   namespace App\Controllers;

   require_once 'Controller.php';


   class ReporteController extends Controller  {

      public function index(){
      
         return $this->view('reporteActityties');
      }


      public function reportUser(){
      
         return $this->view('reportUser');
      }

      public function reportEvent(){
      
         return $this->view('reportEvent');
      }

      
   }

?>