<?php

   namespace App\Controllers;

   require_once 'Controller.php';


   class TableController extends Controller  {

      public function index(){
         return $this->view('tableBitacora');
      }


      public function  tableBitacoraPagination(){
         return $this->view('tableBitacoraPagination');
      }

   }

?>