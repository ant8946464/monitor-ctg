<?php

   namespace App\Controllers;

   require_once dirname( __DIR__ ) . '/Models/Prop.php';
 
   require_once 'Controller.php';
  

   use App\Controllers\Controller;
   use App\Models\Prop;


   class ProcessController extends Controller  {

      private $msg;
     
      public function index(){

        $result = $this->validStatus();
        if($result == 1){
         $this->msg='Encendido';
        }else{
         $this->msg='Apagado';
        }

         return $this->view('procesBatch', $this->createArrayInsert());
      }


      public function changeStatus(){

         $status = $_POST['status'];
         $prop = new Prop();
         if($status=='Encendido'){
            $this->msg='Apagado';
            $prop->update('id_prop',1, ["value" => 0]);
         }else{
            $this->msg='Encendido';
            $prop->update('id_prop',1, ["value" => 1]);
         }
           
         return $this->view('procesBatch' ,$this->createArrayInsert());
        
      }


      private function createArrayInsert(){
         $array = [
             "msgInfo" => 'En este modulo se prende y apaga el proceso batch que valida los servidores.',
             "msg" => $this->msg,
         ];
 
         return $array ;
      }


      public function validStatus(){
         $prop = new Prop();
         $result= $prop->findValue("id_prop", 1, '*');
         $items = [];
			foreach ($result as $k => $v) {
					 array_push( $items,$v);
			}
         return $items[1];
      }


      

      public function ejectValidad(){
       

         return $this->view('runServerValidations' );
	
      }
 
   }

?>