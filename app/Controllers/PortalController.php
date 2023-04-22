<?php

   namespace App\Controllers;
   
   require_once 'Controller.php';

   class PortalController extends Controller  {

      public function index(){
         return $this->view('portal');
      }


      public function portalPagination(){
         return $this->view('portalPagination');
      }



      

   }

?>