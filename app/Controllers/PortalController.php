<?php

   namespace App\Controllers;


   class PortalController extends Controller  {

      public function index(){
         return $this->view('portal');
      }

   }

?>