<?php

   namespace App\Controllers;

   require_once 'Controller.php';


   class ReporteController extends Controller  {

      public function index(){
         return $this->view('reporte');
      }


   }

?>