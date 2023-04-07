<?php

   namespace App\Controllers;

   class UserController extends Controller  {

      public function index(){
         return $this->view('listUsers');
      }


      public function detailUser(){
         return $this->view('detailUser');
      }

      public function deleteUserList(){
         return $this->view('deleteUser');
      }

      
   }

?>