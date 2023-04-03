<?php

   namespace App\Controllers;

   class TableController extends Controller  {

      public function index(){
         return $this->view('tableBitacora');
      }

   }

?>