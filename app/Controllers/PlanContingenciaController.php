<?php

   namespace App\Controllers;

   require_once 'Controller.php';

   class PlanContingenciaController extends Controller  {

      public function index(){
         return $this->view('contigencia');
      }

   }

?>