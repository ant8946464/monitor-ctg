<?php





   namespace App\Controllers;


   require_once 'Controller.php';

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