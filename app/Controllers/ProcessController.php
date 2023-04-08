<?php

   namespace App\Controllers;

   use App\Controllers\Controller;
   use Classes\Errors;
   use Classes\Success;


   class ProcessController extends Controller  {

      private $msg;
     
      public function index(){
         $this->msg= 'index';
         return $this->view('procesBatch', $this->createArrayInsert(null, null));
      }


      public function changeStatus(){

        $this->msg= 'changeStatus';
         
      
         var_dump("chandeeeeeeeeeeeee   ");

       
            return $this->view('portal');
      
         //return $this->view('procesBatch',$this->createArrayInsert(null, null));
      }



      public function test(){
         $this->msg= 'index';
         return $this->view('test');
      }


      private function createArrayInsert($msgInfo, $msgError){
         $success = new Success();
         $error = new Errors();
         $array = [
   
             "msgInfo" => 'En este modulo se prende y apaga el proceso batch que valida los servidores.',
             "success" => $success->get($msgInfo),
             "error" => $error->get( $msgError),
             "msg" => $this->msg,

             
          
         ];
 
         return $array ;
      }
 
   }

?>