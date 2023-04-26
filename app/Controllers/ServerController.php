<?php

   namespace App\Controllers;

   require_once dirname( __DIR__ ) . '/Models/Server.php';
   require_once 'Controller.php';
   require_once './classes/errors.php';
   require_once './classes/Session.php';
   require_once './lib/ValidatorFunctions.php';
 

   use Lib\ValidatorFunctions;
   use Classes\Errors;
   use Classes\Success;
   use App\Models\Server;

   class ServerController extends Controller  {


      private $servername ;
      private   $ip ;
      private  $cluster ;
      private   $port ;



      public function index(){
         return $this->view('serverConf');
      }

      

      public function deleteServer(){
         return $this->view('deleteServerlist');
      }


      public function deleteServerBy(){
         return $this->view('deleteServerBy');
      }


      public function loadServer(){
         return $this->view('loadServer');
      }



      public function validServer(){
         $validator = new ValidatorFunctions();
         $success = new Success();
         $server = new Server();

         $ip_preg ='/^((0|[1-9][0-9]?|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(\.|$)){4}$/';
         
        
         $this->servername =  $this->getPost('servername');
         $this->ip =  $this->getPost('ip');
         $this->cluster =  $this->getPost('cluster');
         $this->port = $this->getPost('port');

         $name = $server->findValue("name",$this->servername,'*');

         $ip = $server->findValue("ip",$this->ip,'*');
         $id = $_POST['id']?? null;

   
         if($id != null){
            $id = $_POST['id'];
            if($validator->validateEmptyParameters(array($this->servername,$this->ip,$this->cluster,$this->port))){
               return $this->view('serverConf',$this->createArrayFront(null,'a5bcd7089d83f45e17e989fbc86003ed'));
            }else if(preg_match($ip_preg, $this->ip) == 0 ){
                   return $this->view('serverConf',$this->createArrayFront(null,'x5V1OITn7olzdb+7q2kjhV4Fmy0yRQ3yt'));
            }else{
         
               $server->update('id_ctg',$id,$this->createArrayInsert());
               return $this->view('portal',["success" => $success->get('YEqzEuBE9KJLiR73eeI2q+ynksjJuq4d')]);
            }
           
         }else {
            if($validator->validateEmptyParameters(array($this->servername,$this->ip,$this->cluster,$this->port))){
               return $this->view('serverConf',$this->createArrayFront(null,'a5bcd7089d83f45e17e989fbc86003ed'));
            }else if(!empty($ip)  || !empty( $name)) {
               return $this->view('serverConf',$this->createArrayFront(null,'GTF2LcSrh+8kXQ7T3y44fMTP9VEV3lDbl'));
            }else if(preg_match($ip_preg, $this->ip) == 0 ){
                   return $this->view('serverConf',$this->createArrayFront(null,'x5V1OITn7olzdb+7q2kjhV4Fmy0yRQ3yt'));
            }else{
                  $server->create($this->createArrayInsert());
                  return $this->view('serverConf',["success" => $success->get('qrNetDEjGRg4AFdpch2bn4xnTOm8zhAg')]);
              
            }
            
         }
         }

      

      private function createArrayInsert(){

         $array = [
             "name" => $this->servername ,
             "ip" => $this->ip,
             "cluster" =>  $this->cluster,
             "puerto" =>  $this->port,
             "estatus" =>  1,
         ];

         return $array ;
      }


      private function createArrayFront($msgInfo , $msgError){
         $error = new Errors();
         $success = new Success();
         $array = [
             "error" => $error->get($msgError),
             "success" => $success->get($msgInfo),
             "name" => $this->servername ,
             "ip" => $this->ip,
             "cluster" =>  $this->cluster,
             "port" =>  $this->port,
          
         ];
         return $array ;
      }


   }

?>