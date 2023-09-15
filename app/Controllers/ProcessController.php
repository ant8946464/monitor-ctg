<?php

   namespace App\Controllers;

   require_once dirname( __DIR__ ) . '/Models/Prop.php';
 
   require_once 'Controller.php';
   require_once './classes/Session.php';
   require_once './classes/Mail.php';

   use App\Controllers\Controller;
   use App\Models\Prop;
   use Classes\Success;
   use Classes\Mail;
   use Classes\Session;
  

   class ProcessController extends Controller  {

      private $msg;

      private $msgInfo;
     
      public function index(){
       
        $result = $this->validStatus();
        if($result == 1){
         $this->msg='Encendido';
        }else{
         $this->msg='Apagado';
        }
          $this->msgInfo= null;
         return $this->view('procesBatch', $this->createArrayInsert());
      }


      public function changeStatus(){
            $session = new Session();
            $session->getSessionName('user');
            $status = $this->getPost('status');
            $prop = new Prop();
            if($status=='Encendido'){
               $this->msg='Apagado';
               $prop->update('id_prop',1, ["value" => 0]);
            }else{
               $this->msg='Encendido';
               $prop->update('id_prop',1, ["value" => 1]);
            }
            $email = new Mail(constant('GROUP_MAIL'),'Proceso de validación','El usuario '.$session->getSessionName('user').' cambio el estatus del proceso de validacion: '.$this->msg);
            $email->sendMail();
            $success = new Success();
            $this->msgInfo =  $success->get('aQWdRIYrrlJHCaOGmkdDtE4VXRigwkGmT').'Proceso '.$this->msg ;
              
            return $this->view('procesBatch' ,$this->createArrayInsert());
    
      }


      private function createArrayInsert(){
         
         $array = [
             "msgInfo" => 'En este módulo se prende y apaga el proceso batch que válida los servidores.',
             "msg" => $this->msg,
            "success" => $this->msgInfo
         ];
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
